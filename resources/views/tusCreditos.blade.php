@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Tu Data</div>

          <div class="card-body">
            @if(Session::has('alert-success'))
              <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>{!! session('alert-success') !!}</strong></div>
            @endif
            @if(Session::has('alert-danger'))
              <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>{!! session('alert-danger') !!}</strong></div>
            @endif
            @if($errors->any())
              <h4>{{$errors->first()}}</h4>
            @endif


            {{-- Abre form Credito --}}
            <div class="card-body">
              <form id="" class="addProductForm" action="" method="post">
                <a id="agregarCredito" class="" href="#" role="button" ><i class="far fa-money-bill-alt">&nbsp;&nbsp; </i>Agrega un credito</a><br>
              </form>
            </div>



            {{-- Form Credito --}}
            <div class="form-group">
              <form id="form1" style="display:none;" action="" method="post">
                @csrf
                <div class="form-group row">
                  <label for="detalle" class="col-md-4 col-form-label text-md-right">{{ __('Detalle') }}</label>
                  <div class="col-md-6">
                    <input id="detalle" type="text" class="form-control" name="detalle" autofocus required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="cuota_uva" class="col-md-4 col-form-label text-md-right">{{ __('Cuota Mensual En UVA') }}</label>
                  <div class="col-md-6">
                    <input id="cuota_uva" type="text" class="form-control" name="cuota_uva" autofocus required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="fecha_debito_cuota" class="col-md-4 col-form-label text-md-right">{{ __('Fecha debito de Cuota') }}</label>
                  <div class="col-md-6">
                    <input id="fecha_debito_cuota" ty class="form-control" name="fecha_debito_cuota"  autofocus required>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary" >Agregar</button>
              </form>
            </div>
            {{-- Termina form --}}


            @isset($creditos)
              @foreach ($creditos as $key => $value)
                @php
                $dias=$value->filtraFecha($value->fecha_debito_cuota)
                @endphp
                <b>  Detalle :</b>{{$value->detalle}}
                <br>
                <b>Cuota en Uvas :</b>{{$value->cuota_uva}}<br>
                <b> El debito de la cuota es el dia :</b>{{$value->fecha_debito_cuota}}<br>
                <table style="width:100%">
                  <tr>
                    <th>Fecha</th>
                    <th>Valor de UVA</th>
                    <th>Cuota en pesos</th>
                  </tr>
                  @foreach ($dias as $key => $value2)
                    <tr>
                      <td>{{$value2->fecha}} </td>
                      <td>$ {{$value2->valor}} </td>
                      <td>$ {{$value->calculaCuota($value2->valor)}}</td>
                    </tr>
                  @endforeach
                </table>
                {{-- <form id="form2" class="" action="{{ route('creditoBorrar',$value->credito_id) }}" method="post" onsubmit="return confirm('Estas seguro que queres borrarlo?');"> --}}
                <a class="btn mb-2 float-left " type="button" name="button" href='{{route('creditoInfo', $value->credito_id)}}' >Editar</a>
                <form id="form2" class="delete-form" action="{{ route('creditoBorrar',$value->credito_id) }}" method="post" >
                  {{ csrf_field() }}
                  <button class="btn float-right" id="borrarCredito" class="btn mb-4" type="submit" name="button" >Borrar</button>
                </form>
                <div class="clearfix">
                </div>
              @endforeach
            @endisset




            @php
            // $e=App\Credito::find(14);
            // $e->titular;
            // dd($e)
            // dd($c = Auth::user()->dameCreditos(App\Credito_Hipotecario::class)->get())
            @endphp


          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="{{ asset('js/creditos.js') }}"></script>

@endsection
