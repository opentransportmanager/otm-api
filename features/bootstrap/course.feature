Feature: Managing Course data
    In order to manage Course data
    as an API client
    I need to be able to manage Course data via requests

    @api @course @protected @success
    Scenario Outline: Creating Course entity
        Given client is authorized to do an action
        And "POST" is being sent to "/courses"
        And my request data contains "path_id" equal "<path_id>"
        And my request data contains "group_id" equal "<group_id>"
        And my request data contains "start_time" equal "<start_time>"
        And required 1 "Busline" object is already existing
        And required 1 "Path" object is already existing
        And required 1 "Group" object is already existing
        When request is sent
        Then response should be of type "\Illuminate\Http\JsonResponse"
        And response code should be equal to 201
        Examples:
            | path_id | group_id | start_time |
            | 1       | 1        | 02:20      |
            | 2       | 2        | 14:30      |
            | 3       | 3        | 13:25      |
            | 4       | 4        | 12:20      |
            | 5       | 5        | 18:47      |

    @api @course @public @success
    Scenario Outline: Showing selected Course data
        Given "GET" is being sent to "/courses/<id>"
        And the table "courses" contains <id>
        When request is sent
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

    @api @course @protected @success
    Scenario Outline: Updating selected Course data
        Given client is authorized to do an action
        And "PATCH" is being sent to "/courses/<id>"
        And my request data contains "start_time" equal "<start_time>"
        When request is sent
        Then response should be of type "\Illuminate\Http\JsonResponse"
        And model "Course" with <id> with field "start_time" should be equal to "<start_time>"
        And response code should be equal to 200
        Examples:
            | id | start_time |
            | 1  | 02:25      |
            | 2  | 14:35      |
            | 3  | 13:30      |
            | 4  | 12:25      |
            | 5  | 18:52      |

    @api @course @public @success
    Scenario: Showing all Course data
        Given "GET" is being sent to "/courses"
        When request is sent
        Then response should be of type "\Illuminate\Http\JsonResponse"
        And response original content should be of type "\Illuminate\Database\Eloquent\Collection"
        And response code should be equal to 200

    @api @course @protected @success
    Scenario Outline: Deleting selected Course data
        Given client is authorized to do an action
        And "DELETE" is being sent to "/courses/<id>"
        And the table "courses" contains <id>
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
