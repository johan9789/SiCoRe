<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Permiso extends Eloquent {
    protected $table = 'permiso';
    protected $primaryKey = 'id_permiso';
    public $timestamps = false;
}