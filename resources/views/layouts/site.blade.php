<!DOCTYPE html>

<html>
  <head>
    <title>Chronos</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('icon/logochronos_icon.ico') }}">
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, user-scalable=no"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
          crossorigin="anonymous" />
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
  </head>
  <body class="is-preload">
    <!-- Wrapper -->
    <div id="wrapper">
      <!-- Main -->
      <div id="main">
        <div class="inner">
          <!-- Header -->
          <header id="header">
            <a href="{{ route('site.index') }}" class="logo"
              ><img src="{{ asset('img/logoChronos.png') }}" alt="Logotipo" width="150"></a
            >
            <ul class="icons">
              <li>

              {{-- <li>
                <a href="#" class="icon brands fa-facebook-f"
                  ><span class="label">Facebook</span></a
                >
              </li>

              <li>
                <a href="#" class="icon brands fa-instagram"
                  ><span class="label">Instagram</span></a
                >
              </li> --}}


              @if (Auth::user())
               <li>
                <a href="{{ route('admin.perfil') }}"><img src="{{ asset(Auth::user()->foto) }}" alt="Foto do usuário" class="img-fluid rounded-circle-custom"></a>
               </li>
              @else
              <li>
                <a href="{{ route('login') }}" class="icon btn"><i class="fa fa-user"></i><span class="ms-1">Entrar</span></a>
              </li>
              @endif


            </ul>
          </header>

          @yield('conteudo')
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/browser.min.js')}}"></script>
    <script src="{{asset('js/breakpoints.min.js')}}"></script>
    <script src="{{asset('js/util.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  </body>
</html>
