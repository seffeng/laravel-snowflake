<?php

return [
    /**
     * DATA CENTER ID
     */
    'datacenterId' => env('SNOWFLAKE_DATACENTER_ID', 1),

    /**
     * WORKER ID
     */
    'workerId' => env('SNOWFLAKE_WORKER_ID', 1),

    /**
     * START TIME
     */
    'startTime' => env('SNOWFLAKE_START_TIME', '2026-01-01 00:00:00'),

];
