@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

@if (Auth::user()->role == 'A')
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus eventos</h1>
    </div>

    <div class="col-md-10 offset-md-1 dashboard-eventos-container">
        @if (count($eventos) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th acope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $evento)
                        <tr>
                            <td scropt="row">{{ $loop->index + 1 }}</td>
                            <td><a href="{{ url('') }}/evento/{{ $evento->id }}">{{ $evento->title }}</a></td>
                            <td>{{ count($evento->users) }}</td>
                            <td class="d-flex">
                                <a href="{{ url('') }}/evento/edit/{{ $evento->id }}"
                                    class="btn btn-success edit-btn"><i class="fa-solid fa-file-pen"></i></a>
                                <form action="{{ url('') }}/evento/{{ $evento->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Você ainda não tem eventos, <a
                        href="{{ url('') }}/evento/create">Criar eventos</a></p>

        @endif
    </div>

    @endif
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Eventos que estou participando</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-eventos-container">
        @if (count($eventosAsParticipant) > 0):
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th acope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventosAsParticipant as $evento)
                        <tr>
                            <td scropt="row">{{ $loop->index + 1 }}</td>
                            <td><a href="/evento/{{ $evento->id }}">{{ $evento->title }}</a></td>
                            <td>{{ count($evento->users) }}</td>
                            <td>
                                @if (Auth::user())
                                <form action="{{ url('') }}/evento/leave/{{ $evento->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn">
                                      
                                        <i class="bi bi-trash"></i>Sair do evento
                                    </button>
                                </form>
@endif
                            </td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Você ainda não está participando de nenhum evento, <a href="{{ url('') }}/">veja todos os eventos</a>
        @endif
    </div>
@endsection
</div>
</div>
