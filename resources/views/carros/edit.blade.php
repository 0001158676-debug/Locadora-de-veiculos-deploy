<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Editar Carro</title>
<style>
body { font-family: Arial; background:#fff0f6; padding:30px; }

.form-box {
    background:white;
    padding:25px;
    border-radius:10px;
    max-width:500px;
    margin:auto;
}

input, select, textarea {
    width:100%;
    padding:8px;
    margin:8px 0;
    border:1px solid #f8bbd0;
    border-radius:6px;
}

button {
    background:#f48fb1;
    color:white;
    padding:8px;
    border:none;
    border-radius:6px;
    width:100%;
    cursor:pointer;
}

button:hover {
    background:#ec407a;
}
</style>
</head>
<body>

<div class="form-box">
<h2>Editar Carro</h2>

<form action="{{ route('carros.update', $carro) }}" method="POST">
@csrf
@method('PUT')

<label>Modelo</label>
<input type="text" name="modelo" value="{{ $carro->modelo }}" required>

<label>Placa</label>
<input type="text" name="placa" value="{{ $carro->placa }}" required>

<label>Marca</label>
<input type="text" name="marca" value="{{ $carro->marca }}" required>

<label>Ano</label>
<input type="number" name="ano" value="{{ $carro->ano }}" required>

<label>Preço Diária</label>
<input type="number" step="0.01" name="preco_diaria" value="{{ $carro->preco_diaria }}" required>

<label>Descrição</label>
<textarea name="descricao">{{ $carro->descricao }}</textarea>

<label>Status</label>
<select name="status">
    <option value="disponivel" {{ $carro->status=='disponivel'?'selected':'' }}>Disponível</option>
    <option value="alugado" {{ $carro->status=='alugado'?'selected':'' }}>Alugado</option>
    <option value="manutencao" {{ $carro->status=='manutencao'?'selected':'' }}>Manutenção</option>
</select>

<button type="submit">Atualizar</button>
</form>

<br>
<a href="{{ route('carros.index') }}">Voltar</a>
</div>

</body>
</html>
