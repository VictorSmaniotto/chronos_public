@extends('layouts.site')

@section('conteudo')
 <!-- Content -->
 <section class="container">
    <header class="main">
      <h1>{{ $projeto->titulo }}</h1>
    </header>
    <span class="text-muted mb-1 me-1">
        <i class="fa-regular fa-calendar-days"></i>
        Publicado em {{ $projeto->created_at->format('d/m/Y') }}
    </span>
    <span class="text-muted mb-1 me-1">
        <i class="fa-regular fa-clock"></i>
        Atualizado {{ $data->diffForHumans() }}
    </span>
    <span class="text-muted mb-1">
        <i class="fa-solid fa-bookmark"></i>
        Categoria: {{ $projeto->categoria->nome }}
    </span>
    <span class="text-muted mb-1">
        <i class="fa-solid fa-user"></i>
        Autor: {{ $projeto->autor->nome }}
    </span>
    <span class="image main"
      ><img src="{{ asset($projeto->capa) }}" alt=""
    /></span>

    <p id="descricao-projeto">
      {!! $projeto->descricao !!}
    </p>

  </section>
@endsection
