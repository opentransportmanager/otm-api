Feature: Managing Group data
    In order to manage Group data
    as an API client
    I need to be able to manage Group data via requests

    @api @group @protected @success
    Scenario Outline: Creating Group entity
        Given client is authorized to do an action
        And "POST" is being sent to "/groups"
        And my request data contains "name" equal "<name>"
        When request is sent
        Then response should be of type "\Illuminate\Http\JsonResponse"
        And response code should be equal to 201
        Examples:
            | name          |
            | saturdays     |
            | sundays       |
            | holiday       |
            | winter break  |
            | special event |

    @api @group @public @success
    Scenario Outline: Showing selected Group data
        Given client is authorized to do an action
        And "GET" is being sent to "/groups/<id>"
        And the table "groups" contains "<id>"
        When request is sent
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

    @api @group @protected @success
    Scenario Outline: Updating selected Group data
        Given client is authorized to do an action
        And "PATCH" is being sent to "/groups/<id>"
        And my request data contains "name" equal "<name>"
        When request is sent
        Then response should be of type "\Illuminate\Http\JsonResponse"
        And model "Group" with <id> with field "name" should be equal to "<name>"
        And response code should be equal to 200
        Examples:
            | id | name         |
            | 1  | mondays      |
            | 2  | fridays      |
            | 3  | work days    |
            | 4  | summer break |
            | 5  | some-event   |

    @api @group @public @success
    Scenario: Showing all groups data
        Given "GET" is being sent to "/groups"
        When request is sent
        Then response should be of type "\Illuminate\Http\JsonResponse"
        And response original content should be of type "\Illuminate\Database\Eloquent\Collection"
        And response code should be equal to 200

    @api @group @protected @success
    Scenario Outline: Deleting selected Group data
        Given client is authorized to do an action
        And "DELETE" is being sent to "/groups/<id>"
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

    @api @group @protected @success
    Scenario: Deleting selected Group data when Courses are attached
        Given client is authorized to do an action
        And "DELETE" is being sent to "/groups/6"
        And required 1 "Group" object is already existing
        And required 1 "Busline" object is already existing
        And required 1 "Path" object is already existing
        And required 2 "Course" objects are already existing
        When request is sent
        Then response should be of type "\Illuminate\Http\JsonResponse"
        And table "groups" should be empty
        And table "courses" should be empty
        And response code should be equal to 200
