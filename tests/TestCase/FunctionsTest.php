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
namespace Cake\Repl\Test\TestCase;

use Cake\ORM\Table;
use Cake\TestSuite\TestCase;

require_once PLUGIN_ROOT . '/src/functions.php';

/**
 * REPL functions tests
 */
class FunctionsTest extends TestCase
{
    public function testTable()
    {
        $table = table('Table');
        $this->assertInstanceOf(Table::class, $table);
    }
}
