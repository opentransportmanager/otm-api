<?php

declare(strict_types=1);

use App\Services\AuthenticationService;
use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeFeatureScope;
use Behat\Gherkin\Node\TableNode;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use KrzysztofRewak\Larahat\Helpers\DisablingThrottling;
use PHPUnit\Framework\Assert;

class RequestContext implements Context
{
    use DisablingThrottling;

    private JsonResponse $response;
    private Request $request;
    private array $nestedArray;
    private string $token = '';

    /** @BeforeFeature */
    public static function setupFeature(BeforeFeatureScope $scope): void
    {
        Artisan::call('migrate:fresh');
        $bouncerSeeder = new BouncerSeeder();
        $bouncerSeeder->run();
        $userTableSeeder = new UsersTableSeeder();
        $userTableSeeder->run();
    }

    /**
     * Attempts to login as Admin user and saves token from response.
     */
    private function authorizeAsAdmin(): void
    {
        $authService = new AuthenticationService();
        $this->token = $authService->createToken([
            'email' => 'admin@example.com',
            'password' => 'admin',
        ])['token'];
    }

    /**
     * @Given client is authorized to do an action
     */
    public function isAuthorized(): void
    {
        if (!$this->token) {
            $this->authorizeAsAdmin();
        }
    }

    /**
     * @Given :method is being sent to :endpoint
     */
    public function isBeingSentTo(string $method, string $endpoint): void
    {
        $this->request = Request::create($endpoint, $method);
        $this->request->headers->set('accept', 'application/json');
        $this->request->headers->set('Authorization', 'Bearer '.$this->token);
    }

    /**
     * @When request is sent
     */
    public function isSent(): void
    {
        $this->response = app()->handle($this->request);
    }

    /**
     * @Then response original content should be of type :className
     */
    public function originalContentShouldBeOfType(string $class): void
    {
        Assert::assertInstanceOf($class, $this->response->getOriginalContent());
    }

    /**
     * @Then response should be of type :class
     */
    public function responseShouldBeOfType(string $class): void
    {
        Assert::isInstanceOf($class, $this->response);
    }

    /**
     * @Then response code should be equal to :code
     */
    public function codeShouldBe(int $code): void
    {
        Assert::assertEquals($code, $this->response->getStatusCode());
    }

    /**
     * @Then model :model with :id with field :field should be equal to :data
     */
    public function modelIdContains(string $model, int $id, string $field, string $data): void
    {
        $model = config('app.namespace').$model;
        $instance = $model::where('id', $id)->first();
        Assert::assertEquals($data, $instance->$field);
    }

    /**
     * @Then table :table should be empty
     */
    public function tableShouldBeEmpty(string $table): void
    {
        Assert::assertEmpty(DB::table($table)->get());
    }

    /**
     * @Given the table :table contains :id
     */
    public function theTableContains(string $table, int $id): void
    {
        Assert::assertNotNull(DB::table($table)->where('id', $id)->first());
    }

    /**
     * @Given required :amount :class object(s) is/are already existing
     */
    public function requiredObjectsAreAlreadyExisting(int $amount, string $class)
    {
        factory(config('app.namespace').$class, $amount)->create()->each(function ($object): void {
            $object->save();
        });
    }

    /**
     * @Given my request data contains :key equal :value
     */
    public function myRequestDataContainsEqual(string $key, string $value): void
    {
        $this->request[$key] = $value;
    }

    /**
     * @Given my request data contains :key with nested :subkey equal :value
     */
    public function myRequestDataContainsWithNestedEqual(string $key, string $subkey, string $value): void
    {
        $this->nestedArray[$subkey] = $value;
        $this->request[$key] = $this->nestedArray;
    }

    /**
     * @Given my request data contains array:
     */
    public function myRequestDataContainsArray(TableNode $table)
    {
        $this->request['*'] = $table->getColumnsHash()[0];
    }

}
