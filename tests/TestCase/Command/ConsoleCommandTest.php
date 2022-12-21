<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link http://cakephp.org CakePHP(tm) Project
 * @since 2.0.0
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Authorization\Test\TestCase\Command;

use Cake\Command\Command;
use Cake\Console\TestSuite\ConsoleIntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * ConsoleCommand test class
 */
class ConsoleCommandTest extends TestCase
{
    use ConsoleIntegrationTestTrait;

    public function testHelp()
    {
        $this->exec('console --help');
        $this->assertExitCode(Command::CODE_SUCCESS);
        $this->assertOutputContains('command provides a REPL');
    }
}
