<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>HDC Evento</title>
        <head>

        <title>@yield('title')</title>
        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet"> 

        <!-- CSS Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

        <!-- CSS da aplicação --> 
        <link rel="stylsheet"href="{{url('')}}/css/styles.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="{{url('')}}/js/scripts.js"></script>

        <link rel="stylesheet" href="{{url('')}}/css/styles.css">
        <script src="{{url('')}}/js/scripts.js"></script>
        <link rel="stylesheet" type="text/css" href="{{url('')}}/plugins/sweetalert2/sweetalert2.min.css">

    </head>
    <body> 
           <!-- BUSCA / ACESSIBILIDADE -->
           <div class="text-center mt-2">
            <!-- ACESSIBILIDADE -->
            <div class="e_area_acessibilidade unselect">
                <a class="aumentar"><div class="e_btn_acessibilidade e_lato_black" title="Aumentar textos do site"><i class="bi bi-zoom-in"></i></div>aumentar</a>
                <a class="diminuir"><div class="e_btn_acessibilidade e_lato_black" title="Diminuir textos do site"><i class="bi bi-zoom-out"></i></div>>diminuir</a>
                <a id="contraste" accesskey="5"><div class="e_btn_acessibilidade" title="Aumentar/diminuir contraste"><span class="fa fa-adjust" aria-hidden="true"></span><span class="e_trans"></div>contraste</a>
                {{-- <a href="/portal/mapa"><div class="e_btn_acessibilidade" title="Ir para o mapa do site"><span class="fa fa-map-marker" aria-hidden="true"></span><span class="e_trans"><i class="bi bi-geo-alt"></i></span></div></a>
                <a href="/portal/acessibilidade" accesskey="6"><div class="e_btn_acessibilidade" title="Ir para a página de acessibilidade"><span class="fa fa-wheelchair" aria-hidden="true"></span><span class="e_trans">acessibilidade</span></div></a> --}}
                <!-- LINKS ACESSIBILIDADE -->

                <meta name="viewport" content="width=device-width, initial-scale=1.0">        
                <meta name="csrf-token" content="{{ csrf_token() }}" />
                <meta name="description" content=" " />
                <meta name="keywords" content="" />
                <meta content="" name="author" />
                <link rel="shortcut icon" href="{{url('')}}/images/favicon.png">
                <link href="{{url('')}}/plugins/bootstrap/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                <link rel="stylesheet" type="text/css" href="{{url('')}}/plugins/sweetalert2/sweetalert2.min.css">
                <link href="{{url('')}}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
                <link href="{{url('')}}/css/contraste.css" id="app-style" rel="stylesheet" type="text/css" />
                @yield('css')
            </div>								
        </div>

    
        
        

        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="{{ url('') }}/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>            </a>
      
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="{{ url('') }}/" class="nav-link">Eventos</a>
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
            <i class="bi bi-wrench-adjustable"></i>
            <span class="sw_texto_info_sistema">Versão do Sistema: <strong>3.2.2 - 02/05/2022</strong></span>
        </div>
        <span class="swfa far fa-clock sw_icone_info_sistema"></span>
        <i class=<span class="sw_texto_info_sistema">Portal atualizado em: <strong>09/05/2022 - 15:53</strong></span>        </footer> 
        <script> src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"</script>
        <div class="info_sistema">



        
               {{-- <footer>
                  
                 <section class="bg-footer pt-5"> 
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="footer-item mt-4 mt-lg-0 me-lg-5 text-center"><img src="{{url('')}}/images/white.png" class="w-75 mt-5 mb-5" alt=""></div>
                            </div>                           
                            <div class="col-md-8">
                                <div class="row  align-items-center h-100 text-white">
                                    <div class="col-md-6 d-flex justify-content-start align-items-center">
                                        <div class="d-flex align-items-center justify-content-center icon_info me-2"><i class="fa-solid fa-location-dot"></i></div>
                                        <div class="e_txt_info"><span class="e_work_r">Av. Professor Carvalho Pinto, 207 <br>1º Andar - Centro - Caieiras</span></div>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-start align-items-center">
                                        <div class="d-flex align-items-center justify-content-center icon_info me-2"><i class="fa-solid fa-comment-dots"></i></div>
                                        <div class="e_txt_info">
                                            <a href="tel:(16)2105-3000"><span class="text-white">(11) 4445-9179</span></a><br>
                                            <a href="mailto:ouvidoria@sertaozinho.sp.gov.br" class="text-white"><span>pat@caieiras.sp.gov.br</span></a>     
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6  d-flex justify-content-start align-items-center">
                                        <div class="d-flex align-items-center justify-content-center icon_info me-2"><i class="fa-solid fa-clock"></i></div>
                                        <div class="e_txt_info">Atendimento de Seg a Sex das 8h às 14h  </div>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-start align-items-center">
                                        <div class="d-flex align-items-center justify-content-center icon_info me-2"><i class="fa-solid fa-comment-dots"></i></div>
                                        <div class="e_txt_info">
                                            <a href="tel:(16)2105-3000"><span class="text-white">(11) 4445-9179</span></a><br>
                                            <a href="mailto:ouvidoria@sertaozinho.sp.gov.br" class="text-white"><span>pat@caieiras.sp.gov.br</span></a>     
                                        </div> --}}
                                    </div>                                    
                                </div>
                            {{-- </div>                           
                        </div>
                    </div>  
             --}}

        @yield('modal')
        
        <!-- JAVASCRIPT -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="{{url('')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{url('')}}/plugins/sweetalert2/sweetalert2.min.js"></script> 
        <script src="{{url('')}}/plugins/bootstrap/js/bs-stepper.min.js"></script>        
        <script src="{{ url('') }}/plugins/jquery.mask.js"></script>
        <script src="{{url('')}}/js/functions.js"></script>
        <script src="{{url('')}}/js/acessibilidade.js"></script>
        @yield('js')
        @yield('jss')
    </body>
</html>