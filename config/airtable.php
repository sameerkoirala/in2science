<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Airtable Key
    |--------------------------------------------------------------------------
    |
    | This value can be found in your Airtable account page:
    | https://airtable.com/account
    |
    */
    'key' => env('AIRTABLE_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Airtable Base
    |--------------------------------------------------------------------------
    |
    | This value can be found once you click on your Base on the API page:
    | https://airtable.com/api
    | https://airtable.com/[BASE_ID]/api/docs#curl/introduction
    |
    */
    'base' => env('AIRTABLE_BASE'),

    /*
    |--------------------------------------------------------------------------
    | Default Airtable Table
    |--------------------------------------------------------------------------
    |
    | This value can be found on the API docs page:
    | https://airtable.com/[BASE_ID]/api/docs#curl/table:tasks
    | The value will be hilighted at the beginning of each table section.
    | Example:
    | Each record in the `Tasks` contains the following fields
    |
    */
    'default' => 'default',

    'tables' => [

        'default' => [
            'name' => env('AIRTABLE_TABLE'),
        ],

        'mentorDetail' => [
            'name' => 'Mentor_Detail',
        ],

        'mentorAvailability' => [
            'name' => 'Mentor_Availability',
        ],

        'schoolInfo' => [
            'name' => 'School_Info',
        ],

        'schoolTimeTable' => [
            'name' => 'School_Timetable',
        ],

        'specialSchoolTimeTable' => [
            'name' => 'School_SpecialTimeTable',
        ],

        'schoolDetail' => [
            'name' => 'School_Detail',
        ],

        'schoolRequirement' => [
            'name' => 'School_Requirement',
        ],

        'outputTable' => [
            'name' => 'Output_Table',
        ],
        'schoolRequirementReason' => [
            'name' => 'School_Requirement_Reason',
        ],
        'output' => [
            'name' => 'Output_Table',
        ],
    ],

    'log_http' => env('AIRTABLE_LOG_HTTP', false),
    'log_http_format' => env('AIRTABLE_LOG_HTTP_FORMAT', '{request} >>> {res_body}'),
];
