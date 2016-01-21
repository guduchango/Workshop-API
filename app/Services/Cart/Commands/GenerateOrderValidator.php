<?php
namespace App\Services\Cart\Commands;
use App\Services\Cart\Exceptions\CommandValidationException;
use League\Tactician\Middleware;
use Validator;
class GenerateOrderValidator implements Middleware{
    protected $rules = [
        'user_id' => 'required',
        'payment_method' => 'required',
        'plates' => 'required|array'
    ];
    public function execute($command, callable $next)
    {
        $validator = Validator::make((array) $command, $this->rules);
        if ($validator->fails()) {
            throw new CommandValidationException($command, $validator);
        }
        return $next($command);
    }
}
