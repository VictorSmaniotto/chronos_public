<!DOCTYPE html>

<html>
  <head>
    <title>Chronos</title>
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
            <a href="index.html" class="logo"
              ><img src="{{ asset('img/logoChronos.png') }}" alt="" width="170"></a
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

              <li>
                <a href="{{ route('login') }}" class="btn btn-outline-primary button">Entrar</a>
              </li>

            </ul>
          </header>

          <!-- Banner -->
          <section id="banner">
            <div class="content">
              <header>
                <h1>
                  Bem vindo(a) ao Chronos
                </h1>
                <p>Acompanhe os projetos desenvolvidos por sua comunidade</p>
              </header>
              <p>
                O Chronos é uma plataforma online desenvolvida para facilitar a gestão e publicação de projetos de alunos de escolas. Com o objetivo de promover a colaboração e compartilhamento de conhecimento, o site permite que os alunos criem e publiquem seus projetos, apresentando-os de forma organizada e acessível para outros estudantes, professores e a comunidade escolar.
              </p>
              <p>
                Através do "Chronos", os usuários podem cadastrar-se, criar grupos, elaborar projetos e compartilhar informações importantes, como título, descrição, objetivo, categoria e membros do grupo. Além disso, o site oferece um mural de ajuda, onde os usuários podem interagir, tirar dúvidas, participar de pesquisas e trocar ideias.
              </p>
              <ul class="actions">
                <li><a href="#" class="button big">Leia Mais</a></li>
              </ul>
            </div>
            <span class="image object">
              <img src="{{ asset('img/exports/projetos.jpg') }}" alt="" />
            </span>
          </section>

          <!-- Section
          <section>
            <header class="major">
              <h2>Erat lacinia</h2>
            </header>
            <div class="features">
              <article>
                <span class="icon fa-gem"></span>
                <div class="content">
                  <h3>Portitor ullamcorper</h3>
                  <p>
                    Aenean ornare velit lacus, ac varius enim lorem ullamcorper
                    dolore. Proin aliquam facilisis ante interdum. Sed nulla
                    amet lorem feugiat tempus aliquam.
                  </p>
                </div>
              </article>
              <article>
                <span class="icon solid fa-paper-plane"></span>
                <div class="content">
                  <h3>Sapien veroeros</h3>
                  <p>
                    Aenean ornare velit lacus, ac varius enim lorem ullamcorper
                    dolore. Proin aliquam facilisis ante interdum. Sed nulla
                    amet lorem feugiat tempus aliquam.
                  </p>
                </div>
              </article>
              <article>
                <span class="icon solid fa-rocket"></span>
                <div class="content">
                  <h3>Quam lorem ipsum</h3>
                  <p>
                    Aenean ornare velit lacus, ac varius enim lorem ullamcorper
                    dolore. Proin aliquam facilisis ante interdum. Sed nulla
                    amet lorem feugiat tempus aliquam.
                  </p>
                </div>
              </article>
              <article>
                <span class="icon solid fa-signal"></span>
                <div class="content">
                  <h3>Sed magna finibus</h3>
                  <p>
                    Aenean ornare velit lacus, ac varius enim lorem ullamcorper
                    dolore. Proin aliquam facilisis ante interdum. Sed nulla
                    amet lorem feugiat tempus aliquam.
                  </p>
                </div>
              </article>
            </div>
          </section> -->

          <!-- Section -->
          <section>
            <header class="major">
              <h2>PROJETOS</h2>
            </header>
            <div class="posts">
              @foreach ($projetos as $pro)
                <article>
                    <a href="{{ route('site.visualizar', $pro->id) }}" class="image"
                    ><img src="{{ asset($pro->capa) }}" alt=""
                    /></a>
                    <h3>{{ $pro->titulo }}</h3>
                    <p>
                    {!! Str::limit($pro->descricao, 200, '...')!!}
                    </p>
                    <ul class="actions">
                    <li><a href="{{ route('site.visualizar', $pro->id) }}" class="button">Ver Mais</a></li>
                    </ul>
                </article>
              @endforeach

            </div>
          </section>
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
