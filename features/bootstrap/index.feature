Feature: Show all entity data
In order to show all entity data
as an API client
I need to be able to get all the entity data via request

Scenario: Showing all Busline data
    When "GET" is sent to "/buslines"
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response original content should be of type "\Illuminate\Database\Eloquent\Collection"
    And response code should be equal to 200

Scenario: Showing all Course data
    When "GET" is sent to "/courses"
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response original content should be of type "\Illuminate\Database\Eloquent\Collection"
    And response code should be equal to 200

Scenario: Showing all groups data
    When "GET" is sent to "/groups"
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response original content should be of type "\Illuminate\Database\Eloquent\Collection"
    And response code should be equal to 200

Scenario: Showing all paths data
    When "GET" is sent to "/paths"
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response original content should be of type "\Illuminate\Database\Eloquent\Collection"
    And response code should be equal to 200

Scenario: Showing all Station data
    When "GET" is sent to "/stations"
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response original content should be of type "\Illuminate\Database\Eloquent\Collection"
    And response code should be equal to 200
