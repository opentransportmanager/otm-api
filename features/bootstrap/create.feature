Feature:
Create entity
In order to create entity
as an API client
I need to be able to create the entity via request

Scenario: Creating busline entity
    Given the following request data:
        | number |
        |   42n  |
        |   53a  |
        |   39q  |
        |   35a  |
        |   84f  |
    When "POST" is sent to "/buslines"
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response code should be equal to 200

Scenario: Creating Course entity
    Given the following request data:
        | path_id | group_id | start_time |
        |   1     |     1    |  02:20     |
        |   2     |     2    |  14:30     |
        |   3     |     3    |  13:25     |
        |   4     |     4    |  12:20     |
        |   5     |     5    |  18:47     |
    When "POST" is sent to "/courses"
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response code should be equal to 200

Scenario: Creating Group entity
    When "POST" is sent to "/groups"
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response code should be equal to 200

Scenario: Creating Path entity
    When "POST" is sent to "/paths"
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response code should be equal to 200

Scenario: Creating Station entity
    When "POST" is sent to "/stations"
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response code should be equal to 200
