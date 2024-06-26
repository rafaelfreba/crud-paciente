<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PDF</title>
</head>

<body>

    <h1>Detalhes do Paciente:</h1>
    <h3>{{ $data->name }}</h3>
    <ul>
        <li>ID: {{ $data->id }}</li>
        <li>FOTO:
            <br />
            <img src="data:image/jpg;base64,{{ isset($data->foto) ? getFoto($data->foto) : getFoto() }}"
                @style('width: 200px; height: 200px; border: 1px solid black; border-radius: 50%') />
        </li>
        <li>CPF: {{ $data->cpf }}</li>
        <li>CNS: {{ $data->cns }}</li>
        <li>NOME: {{ $data->name }}</li>
        <li>DN: {{ $data->birth }}</li>
        <li>E-MAIL:{{ $data->email }}</li>
        <li>TELEFONE: {{ $data->phone }}</li>
        <li>MUNICÍPIO: {{ $data->county->name }}/{{ $data->county->fu }}</li>
    </ul>

</body>



</html>
