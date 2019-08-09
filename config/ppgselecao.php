<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Arquivo padrão de configuração
    |--------------------------------------------------------------------------
    |
    | Configurações iniciais documendadas abaixo
    */

    /* Sistema */
    'sisDesc'   => 'Sistema de gerenciamento de processos seletivos da Pós-Graduação', 

    /* Replicado */
    'repHost'   => env('REPLICADO_HOST'),
    'repPort'   => env('REPLICADO_PORT='),
    'repDb'     => env('REPLICADO_DATABASE'),
    'repUser'   => env('REPLICADO_USERNAME'),
    'repPass'   => env('REPLICADO_PASSWORD'),
    'repUnd'    => env('REPLICADO_CODUND'),
];
