Feature: Managing Group data
In order to manage Group data
as an API client
I need to be able to manage Group data via requests

Scenario Outline: Creating Group entity
    Given "POST" is being sent to "/groups"
    And my request data contains "name" equal "<name>"
    When request is sent
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response code should be equal to 201
    Examples:
      |     name       |
      |  saturdays     |
      |   sundays      |
      |   holiday      |
      |  winter break  |
      |  special event |

Scenario Outline: Showing selected Group data
    Given "GET" is being sent to "/groups/<id>"
    And the table "groups" contains "<id>"
    When request is sent
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response code should be equal to 200
    Examples:
        | id |
        | 1  |
        | 2  |
        | 3  |
        | 4  |
        | 5  |

Scenario Outline: Updating selected Group data
    Given "PATCH" is being sent to "/groups/<id>"
    And my request data contains "name" equal "<name>"
    When request is sent
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response code should be equal to 200
    Examples:
    | id |     name    |
    | 1  |  mondays    |
    | 2  |  fridays    |
    | 3  |  work days  |
    | 4  | summer break|
    | 5  | some-event  |

Scenario: Showing all groups data
    Given "GET" is being sent to "/groups"
    When request is sent
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response original content should be of type "\Illuminate\Database\Eloquent\Collection"
    And response code should be equal to 200

Scenario Outline: Deleting selected Group data
    Given "DELETE" is being sent to "/groups/<id>"
    And the table "groups" contains <id>
    When request is sent
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response code should be equal to 200
    Examples:
        | id |
        | 1  |
        | 2  |
        | 3  |
        | 4  |
        | 5  |
