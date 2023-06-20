@extends('layouts.auth')

@section('conteudo')
    <form action="{{ route('auth.login.autenticar') }}" method="post">
        @csrf
        <div class="text-center">
            <img class="mb-4 img-fluid" src="{{ asset('img/logoChronos.png') }}" alt="" width="250">
            <h1 class="h3 mb-3 fw-normal">Acesse sua conta</h1>
        </div>

        @if ($errors->any())
            <ul class="alert alert-danger p-2 list-unstyled">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        @endif

        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
            <label for="floatingInput">E-mail</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Senha</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me" name="remember"> Lembrar-me
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>

    </form>
    <div class="col-md-12 mx-auto p-1 mt-3 text-center text-muted">
        <span>Não tem uma conta? Solicite seu acesso <a href="{{ route('auth.registro') }}">Clicando Aqui!</a></span>
    </div>
@endsection
