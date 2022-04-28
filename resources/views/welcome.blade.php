@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')
    
        <h1>Algum titulo</h1>
        <img src="{{url('')}}/img/banner.jpg" alt ="Banner">
        <head>
            <link rel="shortcut icon" type="imag/png" href="./img/logo.png">       
        </head>
        
        @if(10 > 15)
          <p>A condição é true</p>
        @endif

        <p>{{ $nome }}</p>

        @if ($nome == "Pedro")
        <p>O nome é Pedro</p>        
            @elseif ($nome == "Matheus")
            <p>O nome é {{ $nome }} e ele tem {{$idade}} anos, e trabalha como {{ $profissao }}</p>
        @else
            <p>O nome não é Pedro</p>
        @endif

        @for ($i = 0; $i < count($arr); $i++)
            <p>{{ $arr[$i] }} - {{ $i }}</p>
            @if ($i == 2)
                   <p>0 i é 2</p>
            @endif
        @endfor
        @foreach($nomes as $nome)
               <p>{{ $loop->index }} </p>
               <p>{{ $nome }} </p>
            
        @endforeach

        @php
            $name = "João";
            echo $name;
        @endphp

    </body>
</html>

@endsection 