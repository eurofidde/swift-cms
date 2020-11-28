<?php

return [

    /*
    |--------------------------------------------------------------------------
    | User Groups
    |--------------------------------------------------------------------------
    |
    | These are the different levels of authorization an account can have. The
    | Different Groups are as follows:
    |
    */

    'usergroups' => [
        'root' => [
            'id' => '1',
            'name' => 'Root',
        ],
        'admin' => [
            'id' => '2',
            'name' => 'Admin',
        ],
        'moderator' => [
            'id' => '3',
            'name' => 'Moderator',
        ],
        'user' => [
            'id' => '4',
            'name' => 'User',
        ],
    ],
];