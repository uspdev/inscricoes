<?php

return [
    'title'=> 'USPdev / ' . config('app.name'),
    'dashboard_url' => '/',
    'logout_method' => 'GET',
    'logout_url' => 'logout',
    'login_url' => 'login',
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
