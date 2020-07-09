Feature: Managing Subscription data
    In order to manage Subscription data
    as an API client
    I need to be able to manage Subscription data via request

    @api @subscription @busline @user @protected @success
    Scenario Outline: Subscribe Busline data
        Given client is authorized to do an action
        And required 5 Busline objects are already existing
        And "POST" is being sent to "/buslines/subscribe"
        And my request data contains "busline_id" equal "<id>"
        When request is sent
        Then response should be of type "Illuminate\Http\JsonResponse"
        And response code should be equal to 201
        Examples:
            | id |
            | 1  |
            | 2  |
            | 3  |
            | 4  |
            | 5  |

    @api @subscription @busline @user @protected @success
    Scenario: Showing all Users Subscriptions data
        Given client is authorized to do an action
        And "GET" is being sent to "/buslines/user/subscriptions"
        When request is sent
        Then response should be of type "\Illuminate\Http\JsonResponse"
        And response code should be equal to 200


    @api @subscription @busline @user @protected @success
    Scenario Outline: Unsubscribe Busline data
        Given client is authorized to do an action
        And "DELETE" is being sent to "/buslines/unsubscribe"
        And my request data contains "busline_id" equal "<id>"
        When request is sent
        Then response should be of type "Illuminate\Http\JsonResponse"
        And response code should be equal to 201
        Examples:
            | id |
            | 1  |
            | 2  |
            | 3  |
            | 4  |
            | 5  |
