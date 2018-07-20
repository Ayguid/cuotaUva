<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Credito_Hipotecario;
use App\User;

class Credito extends Model
{
  protected $table = 'creditos';


  protected $fillable = [
    'id','user_id', 'subCredito_id', 'notificable',];




    public function hipotecarios()
    {
      return  $this->hasMany(Credito_Hipotecario::class);
    }



    public function titular()
    {
      return $this->belongsTo(User::class,'user_id');
    }










  }
