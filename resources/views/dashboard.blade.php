@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus eventos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-eventos-container">
    @if(count($evento) > 0)
    @else
    <p>Você ainda não tem eventos, <a href="/evento/create">Criar eventos</a></p>
    @endif
</div>

@endsection