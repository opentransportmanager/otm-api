Feature:
Delete selected entity data
In order to delete selected entity data
as an API client
I need to be able to delete the entity data via request

Scenario Outline: Deleting selected busline data
    Given the table "buslines" contains "<id>"
    When "DELETE" is sent to "/buslines/<id>"
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response code should be equal to 200

    Examples:
        | id |
        | 1  |
        | 2  |
        | 3  |
        | 4  |
        | 5  |

Scenario Outline: Deleting selected Course data
    Given the table "courses" contains <id>
    When "DELETE" is sent to "/courses/<id>"
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response code should be equal to 200

    Examples:
        | id |
        | 1  |
        | 2  |
        | 3  |
        | 4  |
        | 5  |

Scenario Outline: Deleting selected Group data
    Given the table "groups" contains <id>
    When "DELETE" is sent to "/groups/<id>"
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response code should be equal to 200

    Examples:
        | id |
        | 1  |
        | 2  |
        | 3  |
        | 4  |
        | 5  |

Scenario Outline: Deleting selected Path data
    Given the table "paths" contains <id>
    When "DELETE" is sent to "/paths/<id>"
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response code should be equal to 200

    Examples:
        | id |
        | 1  |
        | 2  |
        | 3  |
        | 4  |
        | 5  |

Scenario Outline: Deleting selected Station data
    Given the table "stations" contains <id>
    When "DELETE" is sent to "/stations/<id>"
    Then response should be of type "\Illuminate\Http\JsonResponse"
    And response code should be equal to 200

    Examples:
        | id |
        | 1  |
        | 2  |
        | 3  |
        | 4  |
        | 5  |
