<?php

return [
    'title'=> 'USPdev / ' . config('app.name'),
    'dashboard_url' => '/',
    'logout_method' => 'POST',
    'logout_url' => '/senhaunica/logout',
    'login_url' => '/senhaunica',
    'menu' => [
        [
            'text' => 'Vagas',
            'url'  => '/processos',
        ],
    ]
];
