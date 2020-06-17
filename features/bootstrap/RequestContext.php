<?php

declare(strict_types=1);

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeFeatureScope;
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
    private $request;
    private $nestedArray;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /** @BeforeFeature */
    public static function setupFeature(BeforeFeatureScope $scope)
    {
        Artisan::call('migrate:refresh');
    }

    /**
     * @Given :method is being sent to :endpoint
     */
    public function IsBeingSentTo(string $method, string $endpoint): void
    {
        $this->request = Request::create($endpoint, $method);
        $this->request->headers->set('accept', 'application/json');
    }

    /**
     * @When request is sent with debug
     */
    public function isSentWithDebug(): void
    {
        $this->response = app()->handle($this->request);
        dd($this->request);
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
    public function responseShouldBeOfType(string $class)
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
     * @Given the table :table contains :id
     */
    public function theTableContains(string $table, int $id): void
    {
        Assert::assertNotNull(DB::table($table)->where('id', $id)->first());
    }

    /**
     * @Given required :class object is surely existing
     */
    public function someWereCreatedIn(string $class)
    {
        factory('App\\'.$class, 1)->create()->each(function ($busline): void {
            $busline->save();
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
}
