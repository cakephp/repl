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
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

if (!function_exists('breakpoint') && (PHP_SAPI === 'cli' || PHP_SAPI === 'phpdbg')) {
    /**
     * Command to return the eval-able code to startup PsySH in interactive debugger
     * Works the same way as eval(\Psy\sh());
     *
     * ```
     * eval(breakpoint());
     * ```
     *
     * @return string
     * @link http://psysh.org/
     */
    function breakpoint(): ?string
    {
        return 'extract(\Psy\Shell::debug(get_defined_vars(), isset($this) ? $this : null));';
    }
}

if (!function_exists('table') && (PHP_SAPI === 'cli' || PHP_SAPI === 'phpdbg')) {
    /**
     * REPL convenience function to load a table
     *
     * Do **NOT** use this function in your app or plugin code,
     * it is meant only for use in the CakePHP interactive console (REPL).
     *
     * @param string $alias The alias name you want to get.
     * @param array $options The options you want to build the table with.
     * @return \Cake\ORM\Table
     */
    function table(string $alias, array $options = []): Table
    {
        return TableRegistry::getTableLocator()->get($alias, $options);
    }
}
