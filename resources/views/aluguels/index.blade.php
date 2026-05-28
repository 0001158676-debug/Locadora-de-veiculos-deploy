<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Aluguéis</title>
<style>
body { font-family: Arial; background:#fff0f6; padding:30px; }
h1 { color:#ad1457; }

table {
    width:100%;
    border-collapse:collapse;
    background:white;
    border-radius:10px;
    overflow:hidden;
}

th {
    background:#f8bbd0;
    padding:10px;
    color:#880e4f;
}

td {
    padding:10px;
    text-align:center;
}

tr:nth-child(even){
    background:#fce4ec;
}

a, button {
    background:#f48fb1;
    padding:7px 12px;
    border:none;
    border-radius:6px;
    text-decoration:none;
    color:white;
    cursor:pointer;
}

a:hover, button:hover {
    background:#ec407a;
}
</style>
</head>
<body>

<h1>Aluguéis</h1>

<a href="{{ route('aluguels.create') }}">Novo Aluguel</a>

<br><br>

<table>
<tr>
    <th>Usuário</th>
    <th>Carro</th>
    <th>Início</th>
    <th>Final Prevista</th>
    <th>Final Entregue</th>
    <th>Status</th>
    <th>Ações</th>
</tr>

@foreach($aluguels as $aluguel)
<tr>
    <td>{{ $aluguel->usuario->nome }}</td>
    <td>{{ $aluguel->carro->modelo }}</td>
    <td>{{ $aluguel->data_inicio }}</td>
    <td>{{ $aluguel->data_final_prevista }}</td>
    <td>{{ $aluguel->data_final_entregue ?? '-' }}</td>
    <td>{{ $aluguel->status }}</td>
    <td>
        <a href="{{ route('aluguels.edit', $aluguel) }}">Editar</a>

        <form action="{{ route('aluguels.destroy', $aluguel) }}" method="POST" style="display:inline;">
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
