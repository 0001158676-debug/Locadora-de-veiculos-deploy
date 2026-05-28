<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Carros</title>
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

<h1>Carros</h1>

<a href="{{ route('carros.create') }}">Novo Carro</a>

<br><br>

<table>
<tr>
    <th>Modelo</th>
    <th>Placa</th>
    <th>Marca</th>
    <th>Ano</th>
    <th>Diária</th>
    <th>Status</th>
    <th>Ações</th>
</tr>

@foreach($carros as $carro)
<tr>
    <td>{{ $carro->modelo }}</td>
    <td>{{ $carro->placa }}</td>
    <td>{{ $carro->marca }}</td>
    <td>{{ $carro->ano }}</td>
    <td>R$ {{ number_format($carro->preco_diaria,2,',','.') }}</td>
    <td>{{ $carro->status }}</td>
    <td>
        <a href="{{ route('carros.edit', $carro) }}">Editar</a>

        <form action="{{ route('carros.destroy', $carro) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Excluir</button>
        </form>
    </td>
</tr>
@endforeach
</table>

<br>
<a href="{{ route('aluguels.index') }}">Ir para Aluguéis</a>

</body>
</html>
