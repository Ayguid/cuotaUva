<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cuotasModel;

class HomeController extends Controller
{



  public function __construct()
  {
    $this->middleware('auth');
  }



  public function index()
  {
    $datos=cuotasModel::dameTodaLaBase(60);
    return view('home')->with('datos',$datos);
  }



  public function filtra(Request $pedido)
  {
    $datos= cuotasModel::filtraFecha($pedido['fecha']);
    return view('home')->with('datos',$datos);
  }

  public function admin()
  {
      // create curl resource
      $ch = curl_init();
      $params='&'.'order=asc';
      // set url
      curl_setopt($ch, CURLOPT_URL, "https://www.quandl.com/api/v3/datasets/BCRA/MVAR_CVS.json?api_key=nC9UCjEyhYM3BFkvARZS".$params);

      //return the transfer as a string
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

      // $output contains the output string
      $output = curl_exec($ch);

      // close curl resource to free up system resources
      curl_close($ch);
      $arrayDatos = json_decode($output,true);
      $tmpArray=$arrayDatos['dataset']['data'];
      $alert= [];

      foreach ($tmpArray as $value)
      {
        if (is_array($value))
        {
          $datos = new cuotasModel;
          $datos->fecha=$value[0];
          $datos->valor=$value[1];
          $existe =cuotasModel::existe($value[0]);

          if(!$existe)
          {
            $alert[]= 'Dato agregado';
          $datos->save();
          }
          else
          {
            $datos = new cuotasModel;
            $datos->update();
            $alert[]= 'Base de datos al dia';
          }
        }
      }
    return view('admin')->with('alert',$alert);
  }

}
