<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Joselfonseca\LaravelTactician\CommandBusInterface;
use App\Modules\Example\ExampleCommand;
use App\Modules\Example\ExampleHandler;
use App\Modules\Example\ExampleMiddleware;

class ExampleController extends Controller
{

    protected $bus;
   // protected $middleware = [
       // \App\Services\Cart\Commands\GenerateOrderValidator::class
    //];

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

        $this->bus->addHandler(ExampleCommand::class, ExampleHandler::class);

      $command=  $this->bus->dispatch(
            ExampleCommand::class,
            [
                'var1'=>10,
                'var2'=>20
            ],
            [
                ExampleMiddleware::class
            ]
        );


        dd($command);
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
