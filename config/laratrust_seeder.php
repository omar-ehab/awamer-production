<?php
/*
 *          Admin
 *          'administrativeArea' => 'c,r,u,d',
            'bank' => 'c,r,u,d',
            'bankAccount' => 'c,r,u,d',
            'contractTerm' => 'c,r,u,d',
            'establishment' => 'c,r,u,d',
            'establishmentType' => 'c,r,u,d',
            'interval' => 'c,r,u,d',
            'sanad' => 'c,r',
            'smsProvider' => 'c,r,u,d',
*/
/*
 * User
 *          'donor' => 'c,r,u,d',
            'bankAccount' => 'c,r,u,d',
            'contract' => 'r',
            'establishment' => 'r',
            'interval' => 'c,r,u,d',
            'sanad' => 'r',
            'operation' => 'c,r'
 */

return [
    'role_structure' => [
        'super_admin' => [
            'admin' => 'c,r,u,d',
            'administrativeArea' => 'c,r,u,d',
            'bank' => 'c,r,u,d',
            'bankAccount' => 'c,r,u,d',
            'contract' => 'c,r,u,d',
            'contractTerm' => 'c,r,u,d',
            'establishment' => 'c,r,u,d',
            'establishmentType' => 'c,r,u,d',
            'smsProvider' => 'c,r,u,d',
            'interval' => 'c,r,u,d',
        ],
        'admin' => [],
        'user' => []
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
