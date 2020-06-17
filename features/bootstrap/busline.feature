Feature: Managing Busline data
In order to manage Busline data
as an API client
I need to be able to manage Busline data via requests

Scenario Outline: Creating Busline data
    Given "POST" is being sent to "/buslines"
    And my request data contains "number" equal "<number>"
    When request is sent
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response code should be equal to 201
    Examples:
        | number |
        |   42n  |
        |   53a  |
        |   39q  |
        |   35a  |
        |   84f  |

Scenario Outline: Showing selected Busline data
    Given "GET" is being sent to "/buslines/<id>"
    And the table "buslines" contains <id>
    When request is sent
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response original content should be of type "\App\Busline"
    And response code should be equal to 200
    Examples:
        | id |
        | 1  |
        | 2  |
        | 3  |
        | 4  |
        | 5  |

Scenario Outline: Updating selected Busline data
    Given "PATCH" is being sent to "/buslines/<id>"
    And my request data contains "number" equal "<number>"
    When request is sent
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response code should be equal to 200
    Examples:
    | id | number|
    | 1  |  52n  |
    | 2  |  63a  |
    | 3  |  49q  |
    | 4  |  45a  |
    | 5  |  94f  |

Scenario: Showing all Busline data
    Given "GET" is being sent to "/buslines"
    When request is sent
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response original content should be of type "\Illuminate\Database\Eloquent\Collection"
    And response code should be equal to 200

Scenario Outline: Deleting selected Busline data
    Given "DELETE" is being sent to "/buslines/<id>"
    And the table "buslines" contains <id>
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
