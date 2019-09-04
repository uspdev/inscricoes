# inscricoes

Sistema de gerenciamento de inscrições

## Começando

Siga o guia no site do [uspdev](https://uspdev.github.io/contribua)

Utilizamos a [PSR-2](https://www.php-fig.org/psr/psr-2/) para padrões de projeto. Ajuste seu editor favorito para a especificação.

### Pré-requisitos

php7+, php-sybase, laravel5+, mysql5.7+

### Instalando

```bash
composer install
cp .env.example .env
```
#### Altere o arquivo .env com as devidas credenciais
#### Configure config/inscricoes.php
```bash
php artisan key:generate
php artisan migrate
php artisan serve
```

## Desenvolvido com

* [laravel-usp-theme](https://github.com/uspdev/laravel-usp-theme) - Tema do Laravel para projetos USPdev
* [replicado](https://github.com/uspdev/replicado) - Abstração no acesso dos dados replicado USP
* [senhaunica](https://github.com/uspdev/senhaunica-socialite) - Senha única USP
* [laravel-activitylog](https://github.com/spatie/laravel-activitylog) - Loga as atividades



