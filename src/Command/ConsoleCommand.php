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
namespace Cake\Repl\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Cake\Log\Log;
use Psy\Shell;

/**
 * Simple console wrapper around Psy\Shell.
 */
class ConsoleCommand extends Command
{
    /**
     * Start the Command and interactive console.
     *
     * @param \Cake\Console\Arguments $args The command arguments.
     * @param \Cake\Console\ConsoleIo $io The console io
     * @return int|null|void The exit code or null for success
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $io->out('You can exit with <info>`CTRL-C`</info> or <info>`exit`</info>');
        $io->out('');

        Log::drop('debug');
        Log::drop('error');
        $io->setLoggers(false);
        restore_error_handler();
        restore_exception_handler();

        $psy = new Shell();
        $psy->run();
    }

    /**
     * Display help for this console.
     *
     * @param \Cake\Console\ConsoleOptionParser $parser The parser to update
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    {
        $parser->setDescription(
            'This shell provides a REPL that you can use to interact with ' .
            'your application in a command line designed to run PHP code. ' .
            'You can use it to run adhoc queries with your models, or ' .
            'explore the features of CakePHP and your application.'
        );

        return $parser;
    }
}
