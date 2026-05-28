<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Editar Usuário</title>
<style>
body { font-family: Arial; background:#fff0f6; padding:30px; }
.form-box { background:white; padding:25px; border-radius:10px; max-width:500px; margin:auto; }
input, select { width:100%; padding:8px; margin:8px 0; border:1px solid #f8bbd0; border-radius:6px; }
button { background:#f48fb1; color:white; padding:8px; border:none; border-radius:6px; width:100%; }
</style>
</head>
<body>

<div class="form-box">
<h2>Editar Usuário</h2>

<form action="{{ route('usuarios.update', $usuario) }}" method="POST">
@csrf
@method('PUT')

<label>Nome</label>
<input type="text" name="nome" value="{{ $usuario->nome }}" required>

<label>Email</label>
<input type="email" name="email" value="{{ $usuario->email }}" required>

<label>Status</label>
<select name="status">
    <option value="ativo" {{ $usuario->status=='ativo'?'selected':'' }}>Ativo</option>
    <option value="inativo" {{ $usuario->status=='inativo'?'selected':'' }}>Inativo</option>
</select>

<button type="submit">Atualizar</button>
</form>

<br>
<a href="{{ route('usuarios.index') }}">Voltar</a>
</div>

</body>
</html>
