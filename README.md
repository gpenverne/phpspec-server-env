## phpspec-server-env

Replace variables in $_SERVER during running PhpSpec.

## Usage

Add it to your `composer.json` file to install with [Composer](http://getcomposer.org):

``` bash
composer require tei1988/phpspec-server-env
```

Enable it in your `phpspec.yml` file:

``` yaml
extensions:
    - PhpSpec\Extension\ServerEnvExtension
server_env:
  A_KEY_YOU_WANT_TO_REPLACE: A_VALUE_YOU_WANT_TO_REPLACE
```
