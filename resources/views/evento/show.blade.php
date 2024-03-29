@extends('layouts.main')

@section('title', 'Saber mais')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="row">
                    <div id="image-container" class="col-md-6 col-lg-4 mb-2">
                        <img src="{{ url('img/evento/') }}/{{ $evento->image }}" width="800" height="800"
                            class="img-fluid mb-12" alt="{{ $evento->title }}">
                    </div>
                    <div id="info-container" class="col-md-6 col-lg-8">
                        <h1>{{ $evento->title }}</h1>
                        <p class="evento-city"><i class="bi bi-geo-alt-fill"></i> {{ $evento->city }}</p>
                        <p class="evento-participantes"><i class="bi bi-people-fill"></i> {{ count($evento->users) }}
                            Participantes
                        </p>
                        <p class="evento-owner"><i class="bi bi-star-fill"></i> {{ $eventoOwner['name'] }}</p>
                        @if (!$hasUserJoined)
                            <form action="{{ url('') }}/evento/join/{{ $evento->id }}" method="POST">
                                @csrf
                                <button href="{{ url('') }}/evento/join/{{ $evento->id }}" class="btn btn-primary"
                                    id="evento-submit"
                                    onclick="evento.preventDefault();
                 this.closet('form').submit();">
                                    Confirmar presença!
                                </button>

                            </form>
                        @else
                            <p class="already-joined-msg">Você já está participando deste evento!</p>
                            <form action="{{ url('') }}/evento/leave/{{ $evento->id }}" method="POST">
                                @csrf

                                @method('DELETE')


                                <button type="submit" class="alert alert-warning" id="target"  role="alert">
                                    <i class="fa-solid fa-person-walking-arrow-right"></i>Sair do evento!
                                </button>
                            </form>
                        @endif

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
        </div>
    </div>

@endsection
