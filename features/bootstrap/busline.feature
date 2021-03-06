Feature: Managing Busline data
    In order to manage Busline data
    as an API client
    I need to be able to manage Busline data via requests

    @api @busline @protected @success
    Scenario Outline: Creating Busline data
        Given client is authorized to do an action
        And "POST" is being sent to "/buslines"
        And my request data contains "number" equal "<number>"
        When request is sent
        Then response should be of type "\Illuminate\Http\JsonResponse"
        And response code should be equal to 201
        Examples:
            | number |
            | 42n    |
            | 53a    |
            | 39q    |
            | 35a    |
            | 84f    |

    @api @busline @public @success
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

    @api @busline @protected @success
    Scenario Outline: Updating selected Busline data
        Given client is authorized to do an action
        And "PATCH" is being sent to "/buslines/<id>"
        And my request data contains "number" equal "<number>"
        When request is sent
        Then response should be of type "\Illuminate\Http\JsonResponse"
        And model "Busline" with <id> with field "number" should be equal to "<number>"
        And response code should be equal to 200
        Examples:
            | id | number |
            | 1  | 52n    |
            | 2  | 63a    |
            | 3  | 49q    |
            | 4  | 45a    |
            | 5  | 94f    |

    @api @busline @public @success
    Scenario: Showing all Busline data
        Given "GET" is being sent to "/buslines"
        When request is sent
        Then response should be of type "\Illuminate\Http\JsonResponse"
        And response original content should be of type "\Illuminate\Database\Eloquent\Collection"
        And response code should be equal to 200

    @api @busline @protected @success
    Scenario Outline: Deleting selected Busline data
        Given client is authorized to do an action
        And "DELETE" is being sent to "/buslines/<id>"
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

    @api @busline @protected @success
    Scenario: Deleting selected Busline data when Paths are attached
        Given client is authorized to do an action
        And "DELETE" is being sent to "/buslines/6"
        And required 1 "Busline" object is already existing
        And required 2 "Path" objects are already existing
        When request is sent
        Then response should be of type "\Illuminate\Http\JsonResponse"
        And table "buslines" should be empty
        And table "paths" should be empty
        And response code should be equal to 200
