<?php

return [

    /**
     * --------------------------------------------------------------------------
     * User account settings
     * --------------------------------------------------------------------------
     *
     * Needed for the the issue hook. (Sending bugs to the github repository).
     */
    'user' => [
        'name' => env('GITHUB_CLIENT_NAME', 'GitHub Username'),
        'pass' => env('GITHUB_CLIENT_PASS', 'GitHub password')
    ],

    /**
     * --------------------------------------------------------------------------
     * Repository settings
     * --------------------------------------------------------------------------
     */
    'repo' => [
        'organization' => 'cpsb',
        'name'         => 'spoon-knife'
    ]

];