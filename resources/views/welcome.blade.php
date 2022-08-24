@extends('layouts.main')

@section('title', 'HDC Evento')

@section('content')
    <div class="box">
        <div class="box_search d-flex align-items-center">
            <div class="container">
                <div class="search my-auto text-center">
                    <div class="d-flex justify-content-center">
                        <div class="search-bar tex-center w-55 gt-title ">
                            <h1>Busque um evento</h1>
                            <form action="{{ url('') }}" method="GET">
                                <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
                            </form>
                        </div>
                    </div>
                  
                </div>
            </div>
          
        </div>

        <div id="carouselExampleControls" class="carousel slide carousel-fade shadow-2-strong" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="..." class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>
    <div class="col-12 text-center">
        <br>
        <div class="p-6 mb-3">
            <h3 class="display-6 mb-2">Eventos da semana</h3>
        </div>
        <p class="subtitle">Veja os Eventos dos próximos dias</p>
        <div class="container">
            <div id="cards-container " class="row">
                @foreach ($eventos as $evento)
                    <div class=" col-md-6 col-lg-3 mb-2 ">
                        <div class= "card mb-2">
                        <img src="{{ url('') }}/img/evento/{{ $evento->image }} "alt="{{ $evento->title }}">
    
    
                        <div class="card-body">
                            <p class="card-date">{{ date('d/m/Y', strtotime($evento->date)) }}</p>
                            <h5 class="card-title">{{ $evento->title }}</h5>
                            <p class="card-participantes">{{ count($evento->users) }} Participantes</p>
                            <a href="{{ route('show', ['id' => $evento->id]) }}" class="btn btn-primary">Saber mais</a>
                        </div>
                    </div>
                    </div>
                @endforeach
                @if (count($eventos) == 0)
                    <p>Não há eventos disponiveis</p>
                @endif
    
            </div>
        </div>
       
    </div>
   
@endsection
