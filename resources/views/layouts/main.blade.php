<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>HDC Evento</title>

    <head>
        <link rel="shortcut icon" href="{{ url('') }}/img/hdclogo.jpg">
        <title>@yield('title')</title>
        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- CSS Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="{{ url('') }}/css/styles.css">
        <!-- LINKS ACESSIBILIDADE -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- JavaScript Bundle with Popper -->
        <link href="{{ url('') }}/css/contraste.css" id="app-style" rel="stylesheet" type="text/css"
         />

    </head>

<body class="sm:w-1/2 mb-10 px-7display-6 ">

    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom fixed-top header">
        <a href="{{ url('') }}/" class="d-flex align-items-center mb-3 mb-md-0  text-white ">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img"
                viewBox="0 0 24 24">
                <title>Product</title>
                <circle cx="12" cy="12" r="10" />
                <path
                    d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94" />
            </svg></a>
        <ul class="nav nav-pills col-xl-6 col-sm-12-row">
            <li class="nav-item">
                <a href="{{ url('') }}/" class="nav-link">Eventos</a>
            </li>

            @auth

                @if (Auth::user()->role == 'A')
                    <li class="nav-item">
                        <a href="{{ route('create') }}" class="nav-link">Criar Eventos</a>
                    </li>
                @endif
            @endauth
            @auth
                <li class="nav-item">
                    <a href="{{ url('') }}/login" class="nav-link">Meus eventos</a>
                </li>

                <form action="{{ url('') }}/logout" method="POST">
                    @csrf
                    <button class="nav-link"
                        onclick="eventos.preventDefault();
                     this.closet('form').submit();">
                        Sair
                    </button>
                </form>
                </li>
            @endauth
            @guest

                <li class="nav-item">
                    <a href="{{ url('') }}/login" class="nav-link">Entrar</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('') }}/register" class="nav-link">Cadastrar</a>
                </li>
            @endguest
        </ul>



        
        </div>
        </nav>
        <!-- BUSCA / ACESSIBILIDADE -->
        <div class="text-center mt-2">
            <!-- ACESSIBILIDADE -->
            <div class="e_area_acessibilidade unselect">
                <a class="aumentar">
                    <div class="e_btn_acessibilidade e_lato_black" title="Aumentar textos do site"><i
                            class="bi bi-zoom-in"></i></div>aumentar
                </a>
                <a class="diminuir">
                    <div class="e_btn_acessibilidade e_lato_black" title="Diminuir textos do site"><i
                            class="bi bi-zoom-out"></i></div>>diminuir
                </a>
                <a id="contraste" accesskey="5">
                    <div class="e_btn_acessibilidade" title="Aumentar/diminuir contraste"><span class="fa fa-adjust"
                            aria-hidden="true"></span><span class="e_trans"></div>contraste
                </a>

                @yield('css')
            </div>
        </div>
    </header>
    <main>

        @if (session('msg'))
            <p class="msg">{{ session('msg') }}</p>
        @endif
        @yield('content')

    </main>
    <footer>
        <div class="sw_info_sistema">
            <i class="bi bi-wrench-adjustable"></i>
            <span class="sw_texto_info_sistema">Versão do Sistema: <strong>3.2.2 </strong></span>
        </div>
        <span class="swfa far fa-clock sw_icone_info_sistema"></span>
        <i class="#"></i><span class="sw_texto_info_sistema">Portal atualizado em: <strong>09/05/2022 -
                15:53</strong>
        </span>

    </footer>
    <script>
        src = "https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"
    </script>
        @yield('modal')
        <!-- JAVASCRIPT -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
        </script>
        <script src="{{ url('') }}/js/acessibilidade.js"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        @yield('js')
        @yield('jss')
        <div vw class="enabled">
            <div vw-access-button class="active"></div>
            <div vw-plugin-wrapper>
                <div class="vw-plugin-top-wrapper"></div>
            </div>
        </div>
        <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
        <script>
            new window.VLibras.Widget('https://vlibras.gov.br/app');
        </script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>$(document).ready(function() {
        console.log("ready!");
    
        $("#target").click(function() {
            Swal.fire({
           
                icon: 'success',
                title: 'Concluído com sucesso!',
                showConfirmButton: false,
                timer: 1500
            })
        });
    });</script>
</body>

</html>
