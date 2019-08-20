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
    'sisDesc'       => 'Sistema de gerenciamento de processos seletivos da Pós-Graduação', 
    /**
     * Recomendamos deixar este timezone para que o sistema assuma o horário de Brasília
     * Isso é importante para abertura e fechamento das inscrições nos Processos Seletivos
     * */ 
    'sisTimeZone'   => 'America/Sao_Paulo', 

    /* Replicado */
    'repHost'   => env('REPLICADO_HOST'),
    'repPort'   => env('REPLICADO_PORT='),
    'repDb'     => env('REPLICADO_DATABASE'),
    'repUser'   => env('REPLICADO_USERNAME'),
    'repPass'   => env('REPLICADO_PASSWORD'),
    'repUnd'    => env('REPLICADO_CODUND'),
];
