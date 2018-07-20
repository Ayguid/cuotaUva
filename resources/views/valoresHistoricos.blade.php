@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Valores Historicos</div>

          <div  class="card-body ">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif


            <form class="" action="{{url('valoresHistoricos/filtrados')}}" method="get">
              {{-- {{ csrf_field() }} --}}
              Inicio
              <input class="form-control" type="date" name="inicio" value="inicio">
              Fin
              <input class="form-control"  type="date" name="fin" value="fin">
              Dia
              <input class="form-control"   type="number" name="dia" value="dia" min='1' max="28">
              <input class="form-control " type="submit" name="submit" value="submit">
            </form>

            @isset($data)
              <table>
                <tr>
                  <th>Fecha:</th>
                  <th>Valor:</th>
                </tr>
                @foreach ($data as $key => $value)
                  <tr>
                    <td>{{$value->fecha}}</td>
                    <td>{{$value->valor}}</td>


                  </tr>
                @endforeach
              </table>

       {{ $data->appends(Illuminate\Support\Facades\Input::except('page'))->links() }}
              {{-- {{$data->links()}} --}}
            @endisset
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="{{ asset('js/apiUva.js') }}">

  </script>
@endsection
