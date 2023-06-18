@extends('layouts.admin')

@section('conteudo')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Categorias</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <!-- Botão na Esquerda -->
        <a href="{{ route('admin.categorias.create') }}"
           class="btn btn-primary">Cadastrar</a>
    </div>
</div>
@include('includes.alerta')
<div class="conteudo-admin">

    <div class="tabela-registros">
        <h4 class="py-3">Lista de Categorias</h4>
        <div class="table-responsive mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"
                            width="50">ID</th>
                        <th scope="col">Título</th>
                        <th scope="col"
                            width="100">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $cat)
                    <tr>
                        <th scope="row">{{ $cat->id }}</th>
                        <td>{{ $cat->nome }}</td>
                        <td>
                            <a href="{{ route('admin.categorias.edit', $cat->id) }}"
                               class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.categorias.destroy', $cat->id) }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf

                                <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este registro?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="paginacao mt-5">

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link"
                               href="#"
                               aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link"
                               href="#">1</a></li>
                        <li class="page-item"><a class="page-link"
                               href="#">2</a></li>
                        <li class="page-item"><a class="page-link"
                               href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link"
                               href="#"
                               aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>


        </div>

    </div>

</div>
@endsection
