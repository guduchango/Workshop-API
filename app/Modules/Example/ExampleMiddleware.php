<?php
namespace App\Modules\Example;

use League\Tactician\Middleware;

class ExampleMiddleware implements  Middleware{

    /**
     * @param object $command
     * @param callable $next
     *
     * @return mixed
     */
    public function execute($command, callable $next)
    {
        $command->var1 = 900;
        $command->var2 = 200;

        return $next($command);
    }

}