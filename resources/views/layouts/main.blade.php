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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

        <!-- CSS da aplicação --> 
        <link rel="stylsheet"href="{{url('')}}/css/styles.css">
        <script src="{{url('')}}/js/scripts.js"></script>

        <link rel="stylesheet" href="{{url('')}}/css/styles.css">
        <script src="{{url('')}}/js/scripts.js"></script>
    </head>
    <body> 
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img src="{{url('')}}/img/logo.png"width="100" height="100" alt ="HDC Eventos">
            </a>
      
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="/" class="nav-link">Eventos</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route ('create')}}" class="nav-link">Criar Eventos</a>
                </li>
                @auth    
                <li class="nav-item">
                    <a href="{{ url ('')}}/login" class="nav-link">Meus eventos</a>
                </li>
                <form action="{{ url ('')}}/logout" method="POST">
                    @csrf
                    <a href="/logout"
                     class="nav-link" 
                     onclick="event.preventDefault();
                     this.closet('form').submit();">
                     Sair
                    </a>
                </form>
                @endauth
                @guest
            <li class="nav-item">
                <a href="{{ url ('')}}/login" class="nav-link">Entrar</a>
            </li>
            <li class="nav-item">
                <a href="{{ url ('')}}/register" class="nav-link">Cadastrar</a>
            </li>   
                @endguest
            </ul>
        </div>
    </nav>
          </header>
          <main> 
              <div class="container-fluid">
              <div class="row">
                  @if(session('msg'))
                  <p class="msg">{{ session('msg') }}</p>
                  @endif
                  @yield('content')
            </div>
              </div>
          </main>
       <footer>
        <div class="sw_info_sistema">
            <i class="bi bi-wrench-adjustable"></i><span class="swfa fas fa-wrench sw_icone_info_sistema"></span>
            <span class="sw_texto_info_sistema">Versão do Sistema: <strong>3.2.2 - 02/05/2022</strong></span>
        </div>
        <span class="swfa far fa-clock sw_icone_info_sistema"></span>
        <i class="bi bi-stopwatch"></i><span class="sw_texto_info_sistema">Portal atualizado em: <strong>09/05/2022 - 15:53</strong></span>        </footer> 
        <script> src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"</script>
    </body>
</html>