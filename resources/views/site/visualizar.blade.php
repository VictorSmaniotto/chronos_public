@extends('layouts.site')

@section('conteudo')
 <!-- Content -->
 <section>
    <header class="main">
      <h1>{{ $projeto->titulo }}</h1>
    </header>

    <span class="image main"
      ><img src="{{ $projeto->capa }}" alt=""
    /></span>

    <p>
      {!! $projeto->descricao !!}
    </p>

  </section>
@endsection
