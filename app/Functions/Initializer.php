<?php
namespace App\Functions;

use DB;

class Initializer {

    public function init($function){
        $query = DB::select("select $function as function");
        return $query[0]->function;
    }

}