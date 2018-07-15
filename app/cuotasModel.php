<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class cuotasModel extends Model
{
  protected $table = 'cuotas_models';

  protected $fillable = ['fecha','valor' ];




  public static function existe($value)
  {
    return cuotasModel::where('fecha', '=', $value)->exists();
  }

  public static function dameTodaLaBase($limit=null)
  {
     return DB::table('cuotas_models')->select('fecha', 'valor')->orderBy('fecha','desc')->limit($limit)->get();
  }


  public static function filtraFecha($pedido)
  {
      $datos=cuotasModel::where('fecha', '=', $pedido)->get();
      return $datos;
  }



}
