<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Novo Aluguel</title>
<style>
body { font-family: Arial; background:#fff0f6; padding:30px; }
.form-box { background:white; padding:25px; border-radius:10px; max-width:500px; margin:auto; }
input, select { width:100%; padding:8px; margin:8px 0; border:1px solid #f8bbd0; border-radius:6px; }
button { background:#f48fb1; color:white; padding:8px; border:none; border-radius:6px; width:100%; }
</style>
</head>
<body>

<div class="form-box">
<h2>Novo Aluguel</h2>

<form action="{{ route('aluguels.store') }}" method="POST">
@csrf

<label>Usuário</label>
<select name="usuario_id">
@foreach($usuarios as $usuario)
<option value="{{ $usuario->id }}">{{ $usuario->nome }}</option>
@endforeach
</select>

<label>Carro</label>
<select name="carro_id">
@foreach($carros as $carro)
<option value="{{ $carro->id }}">{{ $carro->modelo }}</option>
@endforeach
</select>

<label>Data Início</label>
<input type="date" name="data_inicio">

<label>Data Final Prevista</label>
<input type="date" name="data_final_prevista">

<button type="submit">Salvar</button>
</form>

<br>
<a href="{{ route('aluguels.index') }}">Voltar</a>
</div>

</body>
</html>
