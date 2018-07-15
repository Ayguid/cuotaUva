@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Tu Data</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            
            <?php if(Auth::user()->isAdmin == 1){?>
              <div class=”panel-body”>
                <a href="{{url('admin/routes')}}">Acualizar Base de Datos</a>
              </div><?php } ?>


              <form action="{{route('filtraData')}}" method="post">
                {{ csrf_field() }}
                <input type="date" name="fecha" value="fecha">
                <input type="submit" name="" value="Filtra">
              </form>

              @isset($datos)
                <table style="width:100%">
                  <tr>
                    <th>Fecha</th>
                    <th>Valor</th>
                  </tr>

                  @foreach ($datos as $key => $value)
                    <tr>
                      <td>{{$value->fecha}} </td>
                      <td>{{$value->valor}} </td>
                    </tr>
                  @endforeach

                </table>
              @endisset

            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
