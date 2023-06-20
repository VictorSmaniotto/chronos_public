@extends('layouts.admin')
@section('conteudo')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Cadastrar Usuário</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <!-- Botão na Esquerda -->

    </div>
</div>

<div class="formulario">
    <form class="row g-3"
          method="post"
          action="{{ route('admin.usuarios.store') }}">
          @include('admin.usuarios._formulario')
    </form>
</div>
@endsection
