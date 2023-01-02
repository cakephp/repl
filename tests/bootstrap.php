<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.1.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Repl\ReplPlugin;

/**
 * Test suite bootstrap.
 *
 * This function is used to find the location of CakePHP whether CakePHP
 * has been installed as a dependency of the plugin, or the plugin is itself
 * installed as a dependency of an application.
 */
$findRoot = function ($root) {
    do {
        $lastRoot = $root;
        $root = dirname($root);
        if (is_dir($root . '/vendor/cakephp/cakephp')) {
            return $root;
        }
    } while ($root !== $lastRoot);
    throw new Exception('Cannot find the root of the application, unable to run tests');
};
$root = $findRoot(__FILE__);
unset($findRoot);
chdir($root);

define('ROOT', $root);
define('APP', ROOT . '/tests/TestApp/');
define('TMP', sys_get_temp_dir() . '/');
define('CONFIG', ROOT . '/tests/TestApp/config/');
define('CACHE', TMP . 'cache' . DS);
define('CORE_PATH', ROOT . '/vendor/cakephp/cakephp/');
define('CAKE', CORE_PATH . 'src/');

require ROOT . '/vendor/autoload.php';
require CORE_PATH . 'config/bootstrap.php';

define('PLUGIN_ROOT', $root . DS);
define('PLUGIN_TESTS', $root . DS . 'tests' . DS);

Configure::write('App', [
    'base' => '',
    'namespace' => 'TestApp',
    'encoding' => 'UTF-8',
]);

Plugin::getCollection()->add(new ReplPlugin());

if (!getenv('DB_URL')) {
    putenv('DB_URL=sqlite:///:memory:');
}

ConnectionManager::setConfig('test', ['url' => getenv('DB_URL')]);
