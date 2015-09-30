<?php
namespace App\Entities;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Usuario extends Eloquent implements AuthenticatableContract, CanResetPasswordContract {
    use Authenticatable, CanResetPassword;

    protected $table = 'usuario';
    // protected $fillable = ['name', 'email', 'password'];
    // protected $hidden = ['password', 'remember_token'];
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    public function getAuthPassword(){
        return $this->contrasena;
    }

    public function getRememberToken(){
        return $this->{$this->getRememberTokenName()};
    }

    public function setRememberToken($value){
        $this->{$this->getRememberTokenName()} = $value;
    }

    public function getRememberTokenName(){
        return 'recuerdame_token';
    }

}