@extends('layouts.main')

@section('title', 'products')
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
@section('content')
<h1>Tela de Contatos</h1>  
@endsection