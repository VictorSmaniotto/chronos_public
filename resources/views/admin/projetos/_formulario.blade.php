@csrf

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div>
            {{ $error }}
        </div>
    @endforeach

@endif


<div class="col-md-12">
    <label for="titulo" class="form-label">Título</label>
    <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título do Projeto" value="">

</div>
<div class="col-md-12">
    <label for="descricao" class="form-label">Descrição</label>
    <textarea name="descricao" id="descricao" cols="30" rows="10" class="form-control"></textarea>

</div>

<div class="col-md-4">
    <label for="capa" class="form-label">Capa</label>
    <input type="file" name="capa" class="form-control" id="capa">

</div>

<div class="col-md-3">
    <label for="situacao" class="form-label">Situação</label>
    <select class="form-control" id="situacao" name="situacao">
        <option>Selecione a situação</option>
        <option value="1">Iniciado</option>
        <option value="2">Em Andamento</option>
        <option value="3">Concluído</option>

    </select>
</div>

<div class="col-md-3">
    <label for="categoria" class="form-label">Categoria</label>
    <select class="form-control" id="categoria" name="categoria_id">
        <option >Selecione a Categoria</option>

        @foreach ($categoria as $cate)
            <option value="{{ $cate->id }}">{{ $cate->nome }}</option>
        @endforeach

    </select>
</div>

<div class="col-12">
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
