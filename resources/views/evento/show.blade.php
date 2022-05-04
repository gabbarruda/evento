@extends('layouts.main')

@section('title', '$evento->title')

@section('content')

<div class="col-md-10 offset-md-1">
<div class="row">
    <div id="image-container" class="col=md-6">
        <img src="{{url('')}}/img/event.jpg/"width="500" height= "400"{{ $evento->image }}class="img-fluid" alt="{{ $evento->title }}">
    </div>
        <div id="info-container" class="col-md-6">
        <h1>{{ $evento->title }}</h1>
        <p class="evento-city"><i class="bi bi-geo-alt-fill"></i> {{ $evento->city }}</p>
        <p class="evento-participantes"><i class="bi bi-people-fill"></i> X Participantes</p>
        <p class="evento-owner"><i class="bi bi-star-fill"></i> Dono do Evento</p>
        <a href="#" class="btn btn-primary" id="evento-submit">Confirmar presença</a>
</div>
<div class="col-md-12" id="description-container">
    <h3>Sobre o evento: </h3>
    <p class="evento-description">{{ $evento->description }}</p>
</div>

</div>
</div>
@endsection
