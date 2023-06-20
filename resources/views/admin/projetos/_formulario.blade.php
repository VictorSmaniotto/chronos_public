@csrf

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div>
            {{ $error }}
        </div>
    @endforeach

@endif

<div class="col-md-12">
    @if ($projeto->capa)
        <img src="{{ $projeto->capa }}" alt="Capa do Projeto" class="img-fluid capa" style="max-height: 300px">
    @endif
</div>

<div class="col-md-12">
    <label for="titulo" class="form-label">Título</label>
    <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título do Projeto" value="{{ old('titulo', $projeto->titulo) }}">

</div>
<div class="col-md-12">
    <label for="descricao" class="form-label">Descrição</label>
    <textarea name="descricao" id="descricao" cols="30" rows="10" class="form-control">{{ old('descricao', $projeto->descricao) }}</textarea>

</div>


<div class="col-md-4">
    <label for="capa" class="form-label">Capa</label>
    <input type="file" name="capa" class="form-control" id="capa">

</div>


<div class="col-md-3">
    <label for="situacao" class="form-label">Situação</label>
    <select class="form-control" id="situacao" name="situacao">
        <option value="1" {{ (old('situacao', $projeto->situacao) == 'Iniciado') ? 'selected' : '' }}>Iniciado</option>
        <option value="2" {{ (old('situacao', $projeto->situacao) == 'Em andamento') ? 'selected' : '' }}>Em Andamento</option>
        <option value="3" {{ (old('situacao', $projeto->situacao) == 'Concluído') ? 'selected' : '' }}>Concluído</option>
    </select>
</div>

<div class="col-md-3">
    <label for="categoria" class="form-label">Categoria</label>
    <select class="form-control" id="categoria" name="categoria_id">
        <option >Selecione a Categoria</option>

        @foreach ($categoria as $categoria)
            <option value="{{ $categoria->id }}" {{ (isset($projeto) && $projeto->categoria_id == $categoria->id) || old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nome }}
            </option>
        @endforeach
    </select>
</div>

<div class="col-12 mb-3">
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="{{ route('admin.projetos.index') }}" class="btn btn-danger">Cancelar</a>
</div>

