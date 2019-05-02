<?php

return
[

    '' =>
    [
        'controller' => 'user',
        'action' => 'view'
    ],

//    '' =>
//    [
//        'controller' => 'main',
//        'action' => 'index'
//    ],


    'view' =>
    [
        'controller' => 'user',
        'action' => 'view'
    ],

    'account/login' =>
    [
        'controller' => 'user',
        'action' => 'login'
    ],

    'account/register' =>
    [
        'controller' => 'user',
        'action' => 'register'
    ],

    'account/add' =>
    [
        'controller' => 'user',
        'action' => 'registerUser'
    ]
];