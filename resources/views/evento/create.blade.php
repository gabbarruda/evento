@extends('layouts.main')

@section('title', 'Criar Eventos')

@section('content')

<h1>Crie um evento</h1>
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu evento</h1>
    <form action="/events" method="POST">
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento">
    </div>
    <div class="form-group">
        <label for="title">Cidade:</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento">
</div>
<div class="form-group">
    <label for="title">O evento é privado?</label>
<select name="private" id="private" class="form-control"></select>
<option value="0">Não</option>
<option value="1">Sim</option>
</select>
</div>
<div class="form-group">
    <label for="title">Descrição:</label>
    <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?"></textarea>
</div>
<input type="submit" class="btn btm-primary" value="Criar Evento">
    </form>
</div>

@endsection