<?php
namespace App\Services\Cart;
use App\Services\Cart\Commands\GenerateOrder;
use App\Services\Cart\Commands\GenerateOrderHandler;

class CartService {
    private $bus;
    private $middleware = [
        \App\Services\Cart\Commands\GenerateOrderValidator::class
    ];
    public function __construct()
    {
        $this->bus = app('Joselfonseca\LaravelTactician\CommandBusInterface');
    }
    public function generateOrder(array $data = [])
    {
        $this->bus->addHandler(GenerateOrder::class, GenerateOrderHandler::class);
        return $this->bus->dispatch(GenerateOrder::class, $data, $this->middleware);
    }
}
