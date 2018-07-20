<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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


  public static function dameBasePorDia($dia=null)
  {
     return DB::table('cuotas_models')->whereDay('fecha', '=', date($dia))->orderBy('fecha','desc')->paginate(13);
  }


  public static function filtroPorRango($dia=null, $inicio=null, $fin=null)
  {
      // $inicio= Carbon::now()->subMonth()->toDateString();
      // $fin= Carbon::now()->addMonth()->toDateString();
      // $dia=null;
      // $datos=cuotasModel::select('fecha', 'valor')->whereDay('fecha','=',$dia)->whereBetween('fecha', [$inicio, $fin])->orderBy('fecha', 'desc')->get();
      // return $datos;

        $datos=cuotasModel::select('fecha', 'valor');
        if ($dia){
          $datos->whereDay('fecha','=',$dia);
        }
        if ($inicio && $fin){
          $datos->whereBetween('fecha', [$inicio, $fin]);
        }
        $resultado= $datos->orderBy('fecha', 'desc')->paginate(10);
        return $resultado;

  }





  // public static function filtraFecha($fecha)
  // {
  //     $day1= Carbon::now()->subMonth()->toDateString();
  //     $day2= Carbon::now()->addMonth()->toDateString();
  //     $datos=cuotasModel::select('fecha', 'valor')->whereDay('fecha','=',$fecha)->whereBetween('fecha', [$day1, $day2])->orderBy('fecha', 'desc')->get();
  //     return $datos;
  // }




}
