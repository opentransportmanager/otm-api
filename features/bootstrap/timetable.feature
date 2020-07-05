Feature: Showing timetables
    In order to show timetable on selected station
    as an API client
    I need to be able to access necessary data via requests

    @api @timetable @public @success
    Scenario: Attaching Stations to Paths
        Given client is authorized to do an action
        And "POST" is being sent to "/paths/1/stations"
        And required 1 "Busline" object is already existing
        And required 5 "Station" objects are already existing
        And required 1 "Path" object is already existing
        And my request data contains array:
            | id | travel_time |
            | 1  | 10          |
            | 2  | 15          |
            | 3  | 20          |
            | 4  | 25          |
            | 5  | 30          |
        When request is sent
        Then response should be of type "Illuminate\Http\JsonResponse"
        And response code should be equal to 201

    @api @timetable @public @success
    Scenario: Showing timetable
        Given "GET" is being sent to "/stations/1/paths/1"
        When request is sent
        Then response should be of type "Illuminate\Http\JsonResponse"
        And response code should be equal to 200

    @api @timetable @public @success
    Scenario: Deattaching Stations from Paths
        Given client is authorized to do an action
        And "DELETE" is being sent to "/paths/1/stations"
        And my request data contains array:
            | id |
            | 1  |
            | 2  |
            | 3  |
        When request is sent
        Then response should be of type "Illuminate\Http\JsonResponse"
        And response code should be equal to 200

    @api @timetable @protected @success
    Scenario Outline: Deleting selected Station data when Path is still attached
        Given client is authorized to do an action
        And "DELETE" is being sent to "/stations/<id>"
        When request is sent
        Then response should be of type "\Illuminate\Http\JsonResponse"
        And response code should be equal to 200
        Examples:
            | id |
            | 4  |
            | 5  |
