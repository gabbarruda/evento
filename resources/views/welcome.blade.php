@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar..." </form>
    </div>
    <div id="events-contrainer" class="col-md-12" <h2>Próximos Eventos</h2>
        <p class="subtitle">Veja os Eventos dos próximos dias</p>
        <div id="cards-container" class="row">
            @foreach ($eventos as $evento)
                <div class="card col-md-3"
                 <img src="/img/event.jpg" alt="{{ $evento->title }}">
                 <img src="{{url('')}}/img/event.jpg"alt="{{ $evento->title }}">

                    
                    <div class="card-body">
                        <p class="card-date">02/05/2022</p>
                        <h5 class="card-title">{{ $evento->title }}</h5>
                        <p class="card-participantes">X Participantes</p>
                        <a href="#" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
