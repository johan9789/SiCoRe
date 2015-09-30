<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Rol extends Eloquent {
    protected $table = 'rol';
    protected $primaryKey = 'id_rol';
    public $timestamps = false;
}