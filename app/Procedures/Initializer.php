<?php
namespace App\Procedures;

class Initializer {

    public function init($procedure){
        $query = \DB::select("call {$procedure}");
        return $query[0];
    }

}