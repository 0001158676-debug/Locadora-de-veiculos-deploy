<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Novo Carro</title>
<style>
body { font-family: Arial; background:#fff0f6; padding:30px; }
.form-box { background:white; padding:25px; border-radius:10px; max-width:500px; margin:auto; }
input, select, textarea { width:100%; padding:8px; margin:8px 0; border:1px solid #f8bbd0; border-radius:6px; }
button { background:#f48fb1; color:white; padding:8px; border:none; border-radius:6px; width:100%; }
</style>
</head>
<body>

<div class="form-box">
<h2>Novo Carro</h2>

<form action="{{ route('carros.store') }}" method="POST">
@csrf

<label>Modelo</label>
<input type="text" name="modelo" required>

<label>Placa</label>
<input type="text" name="placa" required>

<label>Marca</label>
<input type="text" name="marca" required>

<label>Ano</label>
<input type="number" name="ano" required>

<label>Preço Diária</label>
<input type="number" step="0.01" name="preco_diaria" required>

<label>Descrição</label>
<textarea name="descricao"></textarea>

<label>Status</label>
<select name="status">
<option value="disponivel">Disponível</option>
<option value="manutencao">Manutenção</option>
</select>

<button type="submit">Salvar</button>
</form>

<br>
<a href="{{ route('carros.index') }}">Voltar</a>
</div>

</body>
</html>
