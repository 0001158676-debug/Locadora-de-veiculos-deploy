<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Usuários</title>
    <style>
        body { font-family: Arial; background:#fff0f6; padding:30px; }
        h1 { color:#ad1457; }
        table { width:100%; border-collapse:collapse; background:white; }
        th { background:#f8bbd0; padding:10px; }
        td { padding:10px; text-align:center; }
        tr:nth-child(even){ background:#fce4ec; }
        a, button {
            background:#f48fb1;
            padding:7px 12px;
            border:none;
            border-radius:6px;
            text-decoration:none;
            color:white;
            cursor:pointer;
        }
    </style>
</head>
<body>

<h1>Usuários</h1>

<a href="{{ route('usuarios.create') }}">Novo Usuário</a>

<br><br>

<table>
<tr>
    <th>Nome</th>
    <th>Email</th>
    <th>Status</th>
    <th>Ações</th>
</tr>

@foreach($usuarios as $usuario)
<tr>
    <td>{{ $usuario->nome }}</td>
    <td>{{ $usuario->email }}</td>
    <td>{{ $usuario->status }}</td>
    <td>
        <a href="{{ route('usuarios.edit', $usuario) }}">Editar</a>

        <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Excluir</button>
        </form>
    </td>
</tr>
@endforeach
</table>

<br>
<a href="{{ route('carros.index') }}">Ir para Carros</a>

</body>
</html>
