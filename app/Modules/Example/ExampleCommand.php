<?php
namespace App\Modules\Example;

class ExampleCommand{

    public $var1;

    public $var2;

    public function __construct($var1=0, $var2=0)
    {
        $this->var1 = $var1;
        $this->var2 = $var2;
    }


}