<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'Admin' => [
            'all' => 'c,r,u,d',
        ],

        'college' => [
            'examdep' => 'c,r,u,d',
            'dean' => 'r',
            'rigistrar' => 'c,r,u,d',
            
        ],
        'instructor' => [
            'hod' => 'c,r,u,d',
            'dec' => 'c,r,u,d',
            'prof' => 'r'
        ],
        'student' => [
            'subjects' => 'c,u,d',
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
