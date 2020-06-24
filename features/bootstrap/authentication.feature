Feature: Authenticating via API
    In order to authenticate
    as an API client
    I need to be able to register and login into system

    Scenario: Registering new user
        Given "POST" is being sent to "/register"
        And my request data contains "name" equal "test"
        And my request data contains "email" equal "test@example.com"
        And my request data contains "password" equal "password123"
        When request is sent
        Then response should be of type "Illuminate\Http\JsonResponse"
        And response code should be equal to 201

    Scenario: Logging in
        Given "POST" is being sent to "/login"
        And my request data contains "email" equal "test@example.com"
        And my request data contains "password" equal "password123"
        When request is sent
        Then response should be of type "Illuminate\Http\JsonResponse"
        And response code should be equal to 200



