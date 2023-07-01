@extends('layouts.admin')

@section('conteudo')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Projetos</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <!-- Botão na Esquerda -->
            <a href="{{ route('admin.projetos.create') }}"
               class="btn btn-primary">Cadastrar</a>
        </div>
    </div>

    {{-- Mensagem de Feedback --}}
    @include('includes.alerta')

    <div class="conteudo-admin">

        <div class="tabela-registros">
            <h4 class="py-3">Lista de Projetos</h4>
            <div class="table-responsive mt-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"
                                width="50">ID</th>
                            <th scope="col">Título</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Situação</th>
                            <th scope="col"
                                width="100">Ação</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($projetos as $proj)



                            <tr>
                                <th scope="row">{{ $proj->id }}</th>
                                <td>{{ $proj->titulo }}</td>
                                <td>{{ $proj->categoria->nome }}</td>
                                <td>{{ $proj->situacao }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.projetos.edit', $proj->id) }}"
                                    class="btn btn-primary btn-sm me-1"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.projetos.destroy', $proj->id) }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf

                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este Projeto? Este é um processo irreversível!')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Nenhum Projeto Cadastrado</td>
                            </tr>

                        @endforelse


                    </tbody>
                </table>

            </div>

        </div>

    </div>
@endsection
