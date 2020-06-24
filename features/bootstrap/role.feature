Feature: Managing Role data
    In order to manage Role data
    as an API client
    I need to be able to manage Role data via request

    Scenario Outline: Creating Role data
        Given client is authorized to do an action
        And "POST" is being sent to "/roles"
        And my request data contains "name" equal "<name>"
        When request is sent
        Then response should be of type "Illuminate\Http\JsonResponse"
        And response code should be equal to 201
        Examples:
            | name  |
            | aaaaa |
            | bbbbb |
            | ccccc |
            | ddddd |
            | eeeee |

    Scenario Outline: Showing selected Role data
        Given "GET" is being sent to "/roles/<id>"
        And the table "roles" contains <id>
        When request is sent
        Then response should be of type "\Illuminate\Http\JsonResponse"
        And response original content should be of type "\App\Role"
        And response code should be equal to 200
        Examples:
            | id |
            | 1  |
            | 2  |
            | 3  |
            | 4  |
            | 5  |

    Scenario: Showing all Role data
        Given "GET" is being sent to "/roles"
        When request is sent
        Then response should be of type "\Illuminate\Http\JsonResponse"
        And response original content should be of type "\Illuminate\Database\Eloquent\Collection"
        And response code should be equal to 200

    Scenario Outline: Assign Role to User
        Given client is authorized to do an action
        Given "GET" is being sent to "/roles/assign/<id>"
        And my request data contains "name" equal "<name>"
        When request is sent
        Then response should be of type "Illuminate\Http\JsonResponse"
        And response code should be equal to 201
        Examples:
            | id | name  |
            | 1  | aaaaa |
            | 2  | bbbbb |
            | 3  | ccccc |
            | 4  | ddddd |

    Scenario Outline: Retract Role from User
        Given client is authorized to do an action
        Given "DELETE" is being sent to "/roles/retract/<id>"
        And my request data contains "name" equal "<name>"
        When request is sent
        Then response should be of type "Illuminate\Http\JsonResponse"
        And response code should be equal to 201
        Examples:
            | id | name  |
            | 1  | aaaaa |
            | 2  | bbbbb |
            | 3  | ccccc |
            | 4  | ddddd |
