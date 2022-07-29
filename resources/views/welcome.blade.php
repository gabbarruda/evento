@extends('layouts.main')

@section('title', 'HDC Evento')

@section('content')
<div class="box-search">
    <div id="search-container" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ url('') }}/img/teatro.jpg"  class="d-block w-100" alt=""> 
        </div>
        <div class="carousel-item">
          <img src="{{ url('') }}/img/codig.jpg"  class="d-block w-100" alt="">
        </div>
        <div class="carousel-item">
          <img src="{{ url('') }}/img/teatro.jpg" class="d-block w-100" alt="">
        </div>
        <div class="search"><h1>Busque um evento</h1>
          <form action="{{ url('') }}" method="GET">
              <input type="text" id="search" name="search" class="form-control" placeholder="Procurar..."> 
          </form></div>
      </div>
      {{-- {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button> 
      {{-- <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button> 
    </div> --}}
  
</div>

    


    <div id="eventos-contrainer" class="col-md-12">
        <br>
       <div class="p-3 mb-3"><h2>Eventos da semana</h2></div>
      <p class="subtitle">Veja os Eventos dos próximos dias</p> 
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
        {{-- <div class="p-3 mb-3"><h2>Lançamentos das próximas semanas </h2></div>
           <p class="subtitle">Veja os eventos das próximas semanas</p> --}}
          <div id="cards-container" class="row">
               @foreach ($eventos as $evento) 
                   {{-- <div class="card col-md-3">
                       <img src="{{ url('') }}/img/evento/{{ $evento->image }} "alt="{{ $evento->title }}">
   
   
                       <div class="card-body">
                           <p class="card-date">{{ date('d/m/Y', strtotime($evento->date)) }}</p>
                           <h5 class="card-title">{{ $evento->title }}</h5>
                           <p class="card-participantes">{{ count($evento->users) }} Participantes</p>
                           <a href="{{route('show', ['id'=>$evento->id])}}" class="btn btn-primary">Saber mais</a>
                       </div>
                   </div> --}}
               @endforeach
               @if(count($eventos) == 0)
               <p>Não há eventos disponiveis</p>
               @endif
   
           </div>
@endsection
