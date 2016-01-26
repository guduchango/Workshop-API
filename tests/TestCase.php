<?php

use Joselfonseca\FonckToolbox\ServicesFactory;
use Joselfonseca\Mcs\CalculateShirtPrice\Repositories\FabricArrayRepository;
use Joselfonseca\Mcs\CalculateShirtPrice\Repositories\ButtonsArrayRepository;
use Joselfonseca\Mcs\CalculateShirtPrice\Repositories\FabricRepositoryInterface;
use Joselfonseca\Mcs\CalculateShirtPrice\Repositories\ButtonsRepositoryInterface;
use Joselfonseca\Mcs\CalculateShirtPrice\Repositories\ManufactureRepositoryInterface;
use Joselfonseca\Mcs\CalculateShirtPrice\Repositories\ManufactureCostArrayRepository;

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }
}
