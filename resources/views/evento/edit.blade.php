@extends('layouts.main')

@section('title', 'Editando: ' . $evento->title)

@section('content')

<h1>Crie um evento</h1>
<div id="evento-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{ $evento->title }} </h1>
    <form action="{{url('')}}/evento/update/{{ $evento->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="image">Imagem do Evento:</label>
            <input type="file" id="image" name="image" class="from-control-file">
            <img src="{{url('')}}/img/evento/{{ $evento->image }}" alt="{{ $evento->title }}" class="img-preview">
    </div>
    <div class="form-group">
        <label for="title">Evento:</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento" value="{{ $evento->title }}">
</div>
<div class="form-group">
    <label for="date">Data do Evento:</label> 
    <input type="date" class="form-control" id="date" name="date" value="{{ $evento->date->format('Y-m-d') }}">
</div>
    <div class="form-group">
        <label for="title">Cidade:</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento" value="{{ $evento->city  }}">
</div>
<div class="form-group">
    <label for="title">O evento é privado?</label>
<select name="private" id="private" class="form-control" > 
<option value="0">Não</option>
<option value="1" {{ $evento->private == 1 ? "selected='selected'" : "" }}>Sim</option>
</select>
</div>
<div class="form-group">
    <label for="title">Descrição:</label>
    <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?">{{ $evento->description }}</textarea>
</div>
<div class="form-group">
    <label for="title">Adicione itens de infraestrutura:</label>
    <div class="form-group">
        <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
    </div>
    <div class="form-group">
        <input type="checkbox" name="items[]" value="Palco"> Palco
    </div>
    <div class="form-group">
        <input type="checkbox" name="items[]" value="Cervejas grátis"> Cerveja grátis
    </div>
    <div class="form-group">
        <input type="checkbox" name="items[]" value="Open food"> Open food
    </div>
    <div class="form-group">
        <input type="checkbox" name="items[]" value="Brindes"> Brindes
    </div>
</div>
    <input type="submit" class="btn btn-primary" value="Editar Evento">
</form>
    </div>
    

@endsection
