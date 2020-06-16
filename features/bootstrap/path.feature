Feature: Managing Path data
In order to manage Path data
as an API client
I need to be able to manage Path data via requests

Scenario Outline: Creating Path entity
    Given "POST" is being sent to "/paths"
    And my request data contains "busline_id" equal "<busline_id>"
    And required "Busline" object is surely existing
    When request is sent
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response code should be equal to 201
    Examples:
      | busline_id |
      |     1      |
      |     2      |
      |     3      |
      |     4      |
      |     5      |

Scenario Outline: Showing selected Path data
    Given "GET" is being sent to "/paths/<id>"
    And the table "paths" contains "<id>"
    When request is sent
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response original content should be of type "\App\Path"
    And response code should be equal to 200
    Examples:
        | id |
        | 1  |
        | 2  |
        | 3  |
        | 4  |
        | 5  |

Scenario Outline: Updating selected Path data
    Given "PATCH" is being sent to "/paths/<id>"
    And my request data contains "busline_id" equal <busline_id>
    And required "Busline" object is surely existing
    When request is sent
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response code should be equal to 200
    Examples:
    | id | busline_id|
    | 1  |    6      |
    | 2  |    7      |
    | 3  |    8      |
    | 4  |    9      |
    | 5  |    10     |

Scenario: Showing all paths data
    Given "GET" is being sent to "/paths"
    When request is sent
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response original content should be of type "\Illuminate\Database\Eloquent\Collection"
    And response code should be equal to 200

Scenario Outline: Deleting selected Path data
    Given "DELETE" is being sent to "/paths/<id>"
    And the table "paths" contains "<id>"
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
