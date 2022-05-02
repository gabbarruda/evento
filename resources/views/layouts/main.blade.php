<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet"> 

        <!-- CSS Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- CSS da aplicação --> 
        <link rel="stylsheet"href="{{url('')}}/css/styles.css">
        <script src="{{url('')}}/js/scripts.js"></script>

        <link rel="stylesheet" href="{{url('')}}/css/styles.css">
        <script src="{{url('')}}/js/scripts.js"></script>
    </head>
    <body> 
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img src="{{url('')}}/img/logo.png"width="100" height="100" alt ="HDC Events">
            </a>
      
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="/" class="nav-link">Eventos</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('');}}/evento/create" class="nav-link">Criar Eventos</a>
                </li>
                <li class="nav-item">
                    <a href="/" class="nav-link">Entrar</a>
                </li>
                <li class="nav-item">
                    <a href="/" class="nav-link">Cadastrar</a>
                </li>
            </ul>
          </header>
      
        @yield('content')
        <footer>
            <p>HDC Events &copy; 2022</p>

        </footer>

    </body>
</html>
