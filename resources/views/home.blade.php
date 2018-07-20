@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Tu Data</div>

          <div  class="card-body ">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif


            <?php if(Auth::user()->isAdmin == 1){?>
              <div class=”panel-body”>
                <a id="update" href="{{url('admin/routes')}}">Acualizar Base de Datos</a>
              </div><?php } ?>

              <a class="btn btn-block" href="{{route('tusCreditos')}}">Tus creditos</a>
              <a class="btn btn-block" href="{{route('valoresHistoricos')}}">Valores historicos</a>

              {{-- {{App\cuotasModel::filtroPorRango()}} --}}

            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/apiUva.js') }}">

    </script>
  @endsection
