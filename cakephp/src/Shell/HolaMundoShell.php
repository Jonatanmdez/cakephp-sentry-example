<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Core\Exception\Exception;


/**
 * GenerateExcepction shell command.
 */

Class RandomException extends Exception
{

    public function __construct($message = '', ?int $code = null, ?\Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }


}

class HolaMundoShell extends Shell
{

    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int|null Success or error code.
     */
    public function main()
    {


        if(random_int(1,2)==1){
            throw new RandomException("Failed");
        }

        $this->out('Hola mundo');


    }
}
