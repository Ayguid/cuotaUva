@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-heading btn-primary">Corriendo porcesos</div>
@isset($alert)
  @foreach ($alert as $value)
<h3>{{$value}}</h3>
  @endforeach

@endisset
</div>
</div>
</div>
@endsection
