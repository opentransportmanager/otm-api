Feature: Managing Station data
In order to manage Station data
as an API client
I need to be able to manage Station data via requests

Scenario Outline: Creating Station entity
    Given "POST" is being sent to "/stations"
    And my request data contains "name" equal "<name>"
    And my request data contains "position" with nested "lat" equal "<lat>"
    And my request data contains "position" with nested "lng" equal "<lng>"
    When request is sent
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response code should be equal to 201
    Examples:
      |   name    |   lat   |   lng   |
      |  station1 |  30.22  |  43.33  |
      |  station2 |  45.55  |  60.66  |
      |  station3 |  50.23  |  60.35  |
      |  station4 |  20.78  |  70.34  |
      |  station5 |  65.09  |  40.56  |

Scenario Outline: Showing selected Station data
    Given "GET" is being sent to "/stations/<id>"
    And the table "stations" contains "<id>"
    When request is sent
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response original content should be of type "\App\Station"
    And response code should be equal to 200
    Examples:
        | id |
        | 1  |
        | 2  |
        | 3  |
        | 4  |
        | 5  |

Scenario Outline: Updating selected Station data
    Given "PATCH" is being sent to "/stations/<id>"
    And my request data contains "name" equal "<name>"
    And my request data contains "position" with nested "lat" equal "<lat>"
    And my request data contains "position" with nested "lng" equal "<lng>"
    When request is sent
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response code should be equal to 200
Examples:
        | id | name     | lat   | lng  |
        | 1  | station11| 30.2  | 43.35|
        | 2  | station22| 45.56 | 56.65|
        | 3  | station33| 50.22 | 70.34|
        | 4  | station44| 62.43 | 40.54|
        | 5  | station55| 23.45 | 34.22|

Scenario: Showing all Station data
    Given "GET" is being sent to "/stations"
    When request is sent
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response original content should be of type "\Illuminate\Database\Eloquent\Collection"
    And response code should be equal to 200

Scenario Outline: Deleting selected Station data
    Given "DELETE" is being sent to "/stations/<id>"
    And the table "stations" contains <id>
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
