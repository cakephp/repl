# Repl plugin for CakePHP

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.txt)
[![Total Downloads](https://img.shields.io/packagist/dt/cakephp/repl.svg?style=flat-square)](https://packagist.org/packages/cakephp/repl)

This is a REPL plugin for CakePHP 4. It provides an interactive command
prompt that lets you interact with and inspect objects in your application.

It also provides several global functions to make debugging and interactive
sessions simpler.

## Installation

You can install this plugin into your CakePHP application using [Composer](http://getcomposer.org).

Run the following command
```sh
composer require --dev cakephp/repl
```

## Configuration

Load the plugin by adding the following statement to `Application::bootstrapCli()`
method in the **src/Application.php** file of your application:

```php
$this->addPlugin('Cake/Repl');
```

## Documentation

Full documentation of the plugin can be found on the [CakePHP Cookbook](https://book.cakephp.org/repl/1/).
