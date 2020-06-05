Feature: Show selected entity data
In order to show selected entity data
as an API client
I need to be able to get the entity data via request

Scenario Outline: Showing selected Busline data
    Given the table "buslines" contains "<id>"
    When "GET" is sent to "/buslines/<id>"
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

Scenario Outline: Showing selected Course data
    Given the table "courses" contains "<id>"
    When "GET" is sent to "/courses/<id>"
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response original content should be of type "\App\Course"
    And response code should be equal to 200

    Examples:
        | id |
        | 1  |
        | 2  |
        | 3  |
        | 4  |
        | 5  |

Scenario Outline: Showing selected Group data
    Given the table "groups" contains "<id>"
    When "GET" is sent to "/groups/<id>"
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response original content should be of type "\App\Group"
    And response code should be equal to 200

    Examples:
        | id |
        | 1  |
        | 2  |
        | 3  |
        | 4  |
        | 5  |

Scenario Outline: Showing selected Path data
    Given the table "paths" contains "<id>"
    When "GET" is sent to "/paths/<id>"
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

Scenario Outline: Showing all Station data
    Given the table "stations" contains "<id>"
    When "GET" is sent to "/stations/<id>"
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
