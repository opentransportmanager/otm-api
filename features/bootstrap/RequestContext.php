<?php

declare(strict_types=1);

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Assert;

class RequestContext implements Context
{
    private JsonResponse $response;
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

    /**
     * @When :method is sent to :endpoint
     */
    public function isSentTo(string $method, string $endpoint): void
    {
        $request = Request::create($endpoint, $method);
        $request->add($this->requestBody);
        $this->response = app()->handle($request);
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
        Assert::assertEquals($this->response->getStatusCode(), $code);
    }

    /**
     * @Given the table :table contains :id
     */
    public function theTableContains(string $table, int $id): void
    {
        Assert::assertNotNull(DB::table($table)->where('id', $id)->first());
    }

     /**
     * @Given the following request data:
     */
    public function theFollowingRequestData(TableNode $table)
    {
        $this->requestTable = $table;
    }
}
