@extends('layouts.auth')
@section('conteudo')
    <div class="boxConteudo">
        <h2>Cadastrar</h2>
        <form action="">
            <div class="col-md-12 p-2">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Insira o Nome"
                    value="">

            </div>
            <div class="col-md-12 p-2">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Insira a E-mail"
                    value="">

            </div>
            <div class="col-md-12 p-2">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="">

            </div>


            <div class="col-12 p-2">
                <button type="submit" class="btn btn-warning text-light">Salvar</button>
            </div>

        </form>
    </div>
@endsection
