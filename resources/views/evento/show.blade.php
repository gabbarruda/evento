@extends('layouts.main')

@section('title', 'Saber mais')

@section('content')

<div class="col-md-10 offset-md-1">
<div class="row">
    <div id="image-container" class="col-md-6">
        <img src="{{url('img/evento/')}}/{{ $evento->image }}" width="500" height= "400" class="img-fluid" alt="{{ $evento->title }}">
    </div>
        <div id="info-container" class="col-md-6">
        <h1>{{ $evento->title }}</h1>
        <p class="evento-city"><i class="bi bi-geo-alt-fill"></i> {{ $evento->city }}</p>
        <p class="evento-participantes"><i class="bi bi-people-fill"></i> X Participantes</p>
        <p class="evento-owner"><i class="bi bi-star-fill"></i> {{ $eventoOwner['name'] }}</p>
        <a href="#" class="btn btn-primary" id="evento-submit">Confirmar presença</a>
        <h3>O evento conta com:</h3>
        <ul id="items-list">
        @foreach ($evento->items as $item)
        <li><i class="bi bi-play-circle"></i><span>{{ $item }}</span></li>

            
        @endforeach
</div>
<div class="col-md-12" id="description-container">
    <h3>Sobre o evento: </h3>
    <p class="evento-description">{{ $evento->description }}</p>
</div>

</div>
</div>
@endsection
