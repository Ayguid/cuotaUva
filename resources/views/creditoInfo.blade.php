@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Tu Data </div>

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

            @isset($credito)
              {{-- {{$credito}} --}}

              {{-- {{App\Credito_Hipotecario::creditoData(47)}} --}}

              {{-- Form Credito --}}
              <div class="form-group">
                <form  action="{{route('creditoUpdate', $credito->credito_id)}}" method="post">
                  @csrf
                  <div class="form-group row">
                    <label for="detalle" class="col-md-4 col-form-label text-md-right">{{ __('Detalle') }}</label>
                    <div class="col-md-6">
                      <input id="detalle" type="text" class="form-control" name="detalle" value="{{$credito->detalle}}" autofocus required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="cuota_uva" class="col-md-4 col-form-label text-md-right">{{ __('Cuota Mensual En UVA') }}</label>
                    <div class="col-md-6">
                      <input id="cuota_uva" type="text" class="form-control" name="cuota_uva" value="{{$credito->cuota_uva}}"  autofocus required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="fecha_debito_cuota" class="col-md-4 col-form-label text-md-right">{{ __('Fecha debito de Cuota') }}</label>
                    <div class="col-md-6">
                      <input id="fecha_debito_cuota" ty class="form-control" name="fecha_debito_cuota" value="{{$credito->fecha_debito_cuota}}"  autofocus required>
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary" >Actualizar</button>
                </form>
              </div>
            @endisset
          </div>
        </div>
      </div>
    </div>
  </div>


<a class="btn btn-block" href="{{route('tusCreditos')}}">Volve a tus creditos</a>
@endsection
