<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Credito;
use App\cuotasModel;
use App\Credito_Hipotecario;
use App\Credito_Automotor;
use Illuminate\Http\Request;




class CreditosController extends Controller
{


  //muestra data del credito
  public function llevameAlCredito($id)
  {
    $credito=Credito_Hipotecario::creditoData($id);
    return view ('creditoInfo')->with('credito', $credito);
  }







  //muestra tus creditos
  public function tusCreditos()
  {
    $creditos = Auth::user()->dameCreditos(Credito_Hipotecario::class)->get();
    return view('tusCreditos')->with('creditos',$creditos);
  }





  //valida el request
  public function validarRequest($request)
  {
    return $validator = Validator::make($request->all(), [
      'detalle' => 'required|string|max:255',
      'cuota_uva' => 'required|numeric',
      'fecha_debito_cuota' => 'required|numeric|max:31',
    ]);
  }



//devuelve un array para los inputs que vienen en el objeto request
  public function getInputs($request){
    return $input = [
      'detalle' => $request->input("detalle"),
      'cuota_uva' => $request->input("cuota_uva"),
      'fecha_debito_cuota' => $request->input("fecha_debito_cuota"),
    ];

  }



  //guarda el credito
  public function store(Request $request)
  {
    $user = Auth::user();
    $save = false;

    if ($this->validarRequest($request)->fails())
    {
      $save = false;
    }

    else if (!$this->validarRequest($request)->fails())
    {
      $credito = new Credito();
      $subCredito = new Credito_Hipotecario($this->getInputs($request));
      $credito->user_id = $user->id;
      $save = $credito->save();
      // $save = $credito->titular->save();
      $credito->hipotecarios()->save($subCredito);
    }
    if ($save)
    {
      $request->session()->flash('alert-success', 'Agregado con exito!');
      return redirect('tusCreditos');
    }
    else
    {
      $request->session()->flash('alert-danger', 'Oops hubo un problema!');
      return redirect('tusCreditos')->withErrors($this->validarRequest( $request));
    }
  }







  //actualiza el credito
  public function update(Request $request, $id)
  {
    $user = Auth::user();
    $credito=Credito::find($id);
    $subCredito=Credito_Hipotecario::where('credito_id',$credito->id)->first();


    if ($this->validarRequest($request)->fails())
    {
      $save = false;
      $save2 = false;
    }


    else if (!$this->validarRequest($request)->fails())
    {
      $save=$credito->update();
      $save2 = $subCredito->update($this->getInputs($request));
    }
    if ($save && $save2)
    {
      $request->session()->flash('alert-success', 'Actualizado!');
      return redirect('tusCreditos');
    }
    else
    {
      $request->session()->flash('alert-danger', 'Oops hubo un problema, ohhh!');
      return redirect('tusCreditos')->withErrors($this->validarRequest( $request));
    }

  }





  //Borra el credito
  public function borrar(Request $request, $id)
  {
    $user = Auth::user();
    $credito=Credito::find($id);
    $subCredito=Credito_Hipotecario::where('credito_id',$credito->id)->first();
    $credito->delete();
    $subCredito->delete();
    $request->session()->flash('alert-success', 'Borrado!');
    return redirect('tusCreditos');
  }


}
