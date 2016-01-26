<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\Cart\CartService;
use Joselfonseca\LaravelTactician\CommandBusInterface;

class ExampleController extends Controller
{
      protected $bus;

      public function __construct(CommandBusInterface $bus){
          $this->bus = $bus;
      }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $comand = $this->bus->dispatch(\Joselfonseca\Mcs\CalculateShirtPrice\CalculateShirtPriceCommand::class, [
          'mts' => 1.5,
          'fabricSku' => 'RET490'
      ], [
          \Joselfonseca\Mcs\CalculateShirtPrice\Middleware\CalculateFabricPrice::class
      ]);
      $this->assertEquals(3750, $command->fabricPrice);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
