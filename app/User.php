<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Credito;
use App\Credito_Hipotecario;
use App\Credito_Automotor;


class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','lname', 'email','notifiable', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];




    public function dameCreditos($tipo)
  {
    return  $this->hasManyThrough($tipo,Credito::class);
    // return  $this->hasManyThrough(Credito_Hipotecario::class,Credito::class);
    // return  $this->hasManyThrough(Credito_Automotor::class,Credito::class);
  }


}
