<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Editar Aluguel</title>
<style>
body { font-family: Arial; background:#fff0f6; padding:30px; }

.form-box {
    background:white;
    padding:25px;
    border-radius:10px;
    max-width:500px;
    margin:auto;
}

input, select {
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
<h2>Editar Aluguel</h2>

<form action="{{ route('aluguels.update', $aluguel) }}" method="POST">
@csrf
@method('PUT')

<label>Usuário</label>
<select name="usuario_id">
@foreach($usuarios as $usuario)
<option value="{{ $usuario->id }}" {{ $aluguel->usuario_id==$usuario->id?'selected':'' }}>
{{ $usuario->nome }}
</option>
@endforeach
</select>

<label>Carro</label>
<select name="carro_id">
@foreach($carros as $carro)
<option value="{{ $carro->id }}" {{ $aluguel->carro_id==$carro->id?'selected':'' }}>
{{ $carro->modelo }}
</option>
@endforeach
</select>

<label>Data Início</label>
<input type="date" name="data_inicio" value="{{ $aluguel->data_inicio }}">

<label>Data Final Prevista</label>
<input type="date" name="data_final_prevista" value="{{ $aluguel->data_final_prevista }}">

<label>Data Final Entregue</label>
<input type="date" name="data_final_entregue" value="{{ $aluguel->data_final_entregue }}">

<label>Status</label>
<select name="status">
<option value="aberto" {{ $aluguel->status=='aberto'?'selected':'' }}>Aberto</option>
<option value="finalizado" {{ $aluguel->status=='finalizado'?'selected':'' }}>Finalizado</option>
<option value="cancelado" {{ $aluguel->status=='cancelado'?'selected':'' }}>Cancelado</option>
</select>

<button type="submit">Atualizar</button>
</form>

<br>
<a href="{{ route('aluguels.index') }}">Voltar</a>
</div>

</body>
</html>
