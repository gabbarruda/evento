@extends('layouts.main')

@section('title', 'HDC Evento')

@section('content')
<div class="box">

  <div class="box_search d-flex align-items-center">
      <div class="search my-auto text-center">
          <div class="search-bar tex-center w-100">
            <h1>Busque um evento</h1>
            <form action="{{ url('') }}" method="GET">
                <input type="text" id="search" name="search" class="form-control" placeholder="Procurar..."> 
            </form>
          </div>
      </div>
  </div>

  <!-- Carousel wrapper -->
  <div id="introCarousel" class="carousel slide carousel-fade shadow-2-strong" data-mdb-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
          <li data-mdb-target="#introCarousel" data-mdb-slide-to="0" class="active"></li>
          <li data-mdb-target="#introCarousel" data-mdb-slide-to="1"></li>
          <li data-mdb-target="#introCarousel" data-mdb-slide-to="2"></li>
      </ol>

      <!-- Inner -->
      <div class="carousel-inner">
          <!-- Single item -->
          <div class="carousel-item active">
              <div class="mask"> </div>
          </div>

          <!-- Single item -->
          <div class="carousel-item">
              <div class="mask">
              </div>
          </div>

          <!-- Single item -->
          <div class="carousel-item">
              <div class="mask">
              </div>
          </div>
      </div>
      <!-- Inner -->

      <!-- Controls -->
      <a class="carousel-control-prev" href="#introCarousel" role="button" data-mdb-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
      </a>
      <a class="carousel-control-next" href="#introCarousel" role="button" data-mdb-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Próximo</span>
      </a>
  </div>
  <!-- Carousel wrapper -->
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
