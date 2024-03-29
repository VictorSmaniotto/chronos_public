<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge" />
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
          crossorigin="anonymous" />
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer" />
          {{-- Editor de texto --}}
          <link rel="stylesheet" href="{{ asset('editor/tinymce.min.css') }}">
          <script src="{{ asset('editor/langs/pt_BR.js') }}"></script>

          <script src="{{ asset('editor/tinymce.min.js') }}"></script>

    <title>@yield('titulo') :: Área Administrativa</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('icon/logochronos_icon.ico') }}">

    <style>
        body {
            font-size: .875rem;
        }

        .feather {
            width: 16px;
            height: 16px;
        }


        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }



        .sidebar-sticky {
            height: calc(100vh - 48px);
            overflow-x: hidden;
            overflow-y: auto;

        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #333;
        }

        .sidebar .nav-link .feather {
            margin-right: 4px;
            color: #727272;
        }

        .sidebar .nav-link.active {
            color: #2470dc;
        }

        .sidebar .nav-link:hover .feather,
        .sidebar .nav-link.active .feather {
            color: inherit;
        }

        .sidebar-heading {
            font-size: .75rem;
        }


        .navbar-brand {
            padding-top: .75rem;
            padding-bottom: .75rem;
            background-color: rgba(0, 0, 0, .25);
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
        }

        .navbar .navbar-toggler {
            top: .25rem;
            left: 1rem;
        }

        .navbar .form-control {
            padding: .75rem 1rem;
        }

        .form-control-dark {
            color: #fff;
            background-color: rgba(255, 255, 255, .1);
            border-color: rgba(255, 255, 255, .1);
        }

        .form-control-dark:focus {
            border-color: transparent;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
        }

        .navbar-dark{
            background-color: #0052A1 !important;
        }

        @media (max-width: 767.98px) {

            .sidebar {
                /* top: 5rem; */
            }

            .navbar-brand {
                padding-left: 90px !important;
                /* padding-top: .75rem;
                padding-bottom: .75rem; */
                background-color: rgba(0, 0, 0, .25);
                box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
            }

            .navbar-dark, .navbar-brand{
            background-color: #0052A1 !important;
        }
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="{{route('site.index')}}">
        <img src="{{asset('img/logo-branca.png')}}" class="img-fluid" width="150">
    </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button"
            data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="w-md-100 rounded-0 border-0 text-white px-4 text-end">
        Olá, {{ Auth::user()->nome }}! 😎
    </div>
    
    <div class="d-flex">
        <div class="text-nowrap">
            <a class="nav-link px-3 btn-secondary me-2 text-light" href="{{ route('admin.perfil') }}">Perfil</a>
        </div>
        <div class="text-nowrap logout">
            <a class="nav-link px-3 btn-secondary me-2 text-light" href="{{ route('auth.login.logout') }}">Sair</a>
        </div>
    </div>
</header>


    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu"
                 class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active"
                               href="#">
                                <span data-feather="home"
                                      class="align-text-bottom"></span>
                                Menu
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{ route('admin.projetos.index') }}">
                                <i class="fas fa-box pe-2"></i>
                                Projetos
                            </a>
                        </li>
                        @auth
                            @if(Auth::user()->perfil == 'administrador')
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{ route('admin.categorias.index') }}">
                                <i class="fas fa-tags pe-2"></i>
                                Categorias
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{ route('admin.usuarios.index') }}">
                                <i class="fas fa-users pe-2"></i>
                                Usuários
                            </a>
                        </li>
                        @endif
                        @endauth
                    </ul>


                </div>
            </nav>


            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                @yield('conteudo')


            </main>

        </div>
    </div>
    <footer class="bg-body-secondary p-3 text-end mt-auto">

        Copyright &copy;2023 - Todos os direitos reservados

    </footer>
    <script>
        tinymce.init({
            selector: '#descricao',
            menubar: 'file edit view insert format table tools',
            language: 'pt_BR',
            width: '100%',
            height: '500px',
            plugins: 'code link image table',
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect | responsivefilemanager |  image media | forecolor backcolor  |  code ",
            image_advtab: true ,
            image_class_list: [
            { title: 'Responsive', value: 'img-fluid' }
        ]
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
</body>

</html>
