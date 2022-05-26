@extends('layouts.main')

@section('title', 'HDC Evento')

@section('content')

    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="/" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar..."> 
        </form>
    </div>
    <div id="eventos-contrainer" class="col-md-12">
        <br>
        <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-success bg-success bg-opacity-10 border border-success border-opacity-10 rounded-2"><h2>Eventos da semana</h2></small>
        {{-- <div class="p-3 mb-3"><h2>Eventos da semana <i class="fa-solid fa-angles-down"></i></h2></div> --}}
        {{-- <p class="subtitle">Veja os Eventos dos próximos dias</p> --}}
        <div id="cards-container" class="row">
            @foreach ($eventos as $evento)
                <div class="card col-md-3">
                    {{-- <img src="/img/event.jpg" alt="{{ $evento->title }}"> --}}
                    <img src="{{ url('') }}/img/evento/{{ $evento->image }} "alt="{{ $evento->title }}">


                    <div class="card-body">
                        <p class="card-date">{{ date('d/m/Y', strtotime($evento->date)) }}</p>
                        <h5 class="card-title">{{ $evento->title }}</h5>
                        <p class="card-participantes">{{ count($evento->users) }} Participantes</p>
                        <a href="{{route('show', ['id'=>$evento->id])}}" class="btn btn-primary">Saber mais</a>
                        {{-- <a href="/evento/{{ $evento->id }}" class="btn btn-primary">Saber mais</a> --}}
                    </div>
                </div>
            @endforeach
            @if(count($eventos) == 0)
            <p>Não há eventos disponiveis</p>
            @endif

        </div>
    </div>
    <div id="eventos-contrainer" class="col-md-12">
        <br>
        <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-success bg-success bg-opacity-10 border border-success border-opacity-10 rounded-2"><h2>Eventos da semana</h2></small>

        {{-- <div class="p-3 mb-3"><h2>Lançamentos dos próximos dias  <i class="fa-solid fa-angles-down"></i></h2></div> --}}
        
           <p class="subtitle">Veja os eventos das próximas semanas</p>
           <div id="cards-container" class="row">
               @foreach ($eventos as $evento)
                   <div class="card col-md-3">
                       {{-- <img src="/img/event.jpg" alt="{{ $evento->title }}"> --}}
                       <img src="{{ url('') }}/img/evento/{{ $evento->image }} "alt="{{ $evento->title }}">
   
   
                       <div class="card-body">
                           <p class="card-date">{{ date('d/m/Y', strtotime($evento->date)) }}</p>
                           <h5 class="card-title">{{ $evento->title }}</h5>
                           <p class="card-participantes">{{ count($evento->users) }} Participantes</p>
                           <a href="{{route('show', ['id'=>$evento->id])}}" class="btn btn-primary">Saber mais</a>
                           {{-- <a href="/evento/{{ $evento->id }}" class="btn btn-primary">Saber mais</a> --}}
                       </div>
                   </div>
               @endforeach
               @if(count($eventos) == 0)
               <p>Não há eventos disponiveis</p>
               @endif
   
           </div>
@endsection
