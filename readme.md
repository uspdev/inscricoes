# ppgselecao

Sistema de gerenciamento de processos seletivos da Pós-Graduação

## Começando

Siga o guia no site do [uspdev](https://uspdev.github.io/contribua)

Utilizamos a [PSR-2](https://www.php-fig.org/psr/psr-2/) para padrões de projeto. Ajuste seu editor favorito para a especificação.

### Pré-requisitos

php7+, laravel5+, mysql5.7+

### Instalando

```bash
composer install
php artisan vendor:publish --provider="Uspdev\UspTheme\ServiceProvider" --tag=assets --force
php artisan vendor:publish --provider="Uspdev\UspTheme\ServiceProvider" --tag=config
cp .env.example .env
php artisan serve
```

## Desenvolvido com

* [laravel-usp-theme](https://github.com/uspdev/laravel-usp-theme) - Tema do Laravel para projetos USPdev
* [replicado](https://github.com/uspdev/replicado) - Abstração no acesso dos dados replicado USP
* [senhaunica](https://github.com/uspdev/senhaunica-socialite) - Senha única USP



