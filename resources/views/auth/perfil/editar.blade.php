   @extends('layouts.admin')

   @section('conteudo')
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar Usuário</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <!-- Botão na Esquerda -->

        </div>
    </div>
    {{-- {{ route('admin.perfil.update', $usuario->id) }} --}}

    <div class="formulario">
        <form action="{{ route('admin.perfil.atualizar')}}"
              class="row g-3"
              method="post"
              enctype="multipart/form-data">
              @csrf
              @method('PUT')
        @include('auth.perfil._formulario', ['disableFields' => Auth::user()->perfil != 'administrador'])
        </form>
    </div>
@endsection
