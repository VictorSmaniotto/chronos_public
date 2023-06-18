@csrf

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div>
            {{ $error }}
        </div>
    @endforeach

@endif

<div class="col-md-12">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" class="form-control @error('invalid-feedback') @enderror" name="nome" id="nome"
        placeholder="Insira o Nome da Categoria" value="{{old('nome', $categoria->nome)}}">
    @error('nome')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>


<div class="col-12">
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
