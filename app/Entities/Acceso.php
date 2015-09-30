<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Acceso extends Eloquent {
    protected $table = 'acceso';
    protected $primaryKey = 'id_acceso';
    public $timestamps = false;
}