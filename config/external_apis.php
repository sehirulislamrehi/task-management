<?php


return [
    'service_api' => [
        'sync_api' => "http://csm.prangroup.com:8290/callcenterapi/api/CallCenter/SaveData",
        'ticket_status' => "http://csm.prangroup.com:8290/callcenterapi/api/CallCenter/GetComplainStatusByTicketId?businessUnit="
    ],

    'calling_api' => [
        'recording_data' => "http://127.0.0.1:8001/api/v1/recording-data"
    ]
];
