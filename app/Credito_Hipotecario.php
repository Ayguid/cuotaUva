<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\cuotasModel;
use App\Credito;

class Credito_Hipotecario extends Credito
{
  protected $table = 'creditos_hipotecarios';
//
  protected $fillable = [
'id','credito_id','detalle','cuota_uva','fecha_debito_cuota'];










public static function filtraFecha($fecha)
{
    $day1= Carbon::now()->subMonth()->toDateString();
    $day2= Carbon::now()->addMonth()->toDateString();
    $datos=cuotasModel::select('fecha', 'valor')->whereDay('fecha','=',$fecha)->whereBetween('fecha', [$day1, $day2])->orderBy('fecha', 'desc')->get();
    return $datos;
}




public function calculaCuota($fechas)
{
  return ($this->cuota_uva)*($fechas);
}



public static function creditoData($id)
{
  return Credito_Hipotecario::where('credito_id','=',$id)->first();
}




}
