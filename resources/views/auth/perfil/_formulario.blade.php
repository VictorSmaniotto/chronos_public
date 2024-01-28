@csrf

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div>
            {{ $error }}
        </div>
    @endforeach

@endif

<div class="col-md-12">
    @if ($usuario->foto)
        <img src="{{ asset($usuario->foto) }}" alt="Foto de Perfil" class="img-fluid rounded" style="max-height: 300px">
    @endif
</div>

<div class="col-md-12">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome completo" value="{{ old('nome', $usuario->nome) }}">

</div>
<div class="col-md-12">
    <label for="email" class="form-label">E-mail</label>
    <input type="text" name="email" class="form-control" id="email" placeholder="Insira o E-mail"
        value="{{ old('email', $usuario->email  ) }}" {{isset($disableFields) && $disableFields ? 'disabled readonly' : ''}}>

</div>
<div class="col-md-12">
    <label for="senha" class="form-label">Senha</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="********">

</div>

<div class="col-md-4">
    <label for="foto" class="form-label">Foto</label>
    <input type="file" name="foto" class="form-control" id="foto">

</div>

<div class="col-md-3">
    <label for="perfil" class="form-label">Perfil</label>
    <select class="form-control" id="perfil" name="perfil" {{isset($disableFields) && $disableFields ? 'disabled readonly' : ''}}>
        <option value="cliente" {{ (old('perfil', $usuario->perfil) == 'cliente') ? 'selected' : '' }}>Cliente</option>
        <option value="administrador" {{ (old('perfil', $usuario->perfil) == 'administrador') ? 'selected' : '' }}>Administrador</option>
    </select>
</div>

<div class="col-12">
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="{{ route('site.index') }}" class="btn btn-danger">Cancelar</a>
</div>
