<?php

return [
    'title'=> 'USPdev / ' . config('app.name'),
    'dashboard_url' => '/',
    'logout_method' => 'POST',
    'logout_url' => '/senhaunica/logout',
    'login_url' => '/senhaunica',
    'menu' => [
        [
            'text' => 'Processos',
            'url'  => '/processos',
        ],
        [
            'text' => 'Convocações',
            'url'  => '/convocacoes',
        ],
        [
            'text' => 'Calendário',
            'url'  => '/calendario',
        ],
    ]
];
