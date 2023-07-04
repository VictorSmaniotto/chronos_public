@extends('layouts.siteMobile')

@section('conteudo')
<!-- Banner -->
{{-- <section id="banner">
    <div class="content">
      <header>
        <h1 class="fs-1">
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
  </section> --}}

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
  <section class="section-mobile">
    <header class="major">
      <h2>PROJETOS</h2>
    </header>
    <div class="posts">
      @foreach ($projetos as $pro)
        <article>
            <a href="{{ route('site.mobile.visualizar', $pro->id) }}" class="image"
            ><img src="{{ asset($pro->capa) }}" alt=""
            /></a>
            <h3>{{ $pro->titulo }}</h3>
            <p>
            {!! Str::limit($pro->descricao, 200, '...')!!}
            </p>
            <ul class="actions">
            <li><a href="{{ route('site.mobile.visualizar', $pro->id) }}" class="button">Ver Mais</a></li>
            </ul>
        </article>
      @endforeach

    </div>
  </section>
@endsection
