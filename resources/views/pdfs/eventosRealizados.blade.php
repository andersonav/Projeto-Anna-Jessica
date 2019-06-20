<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Anna Jéssica</title>
    <link href="css/pdf.css" rel="stylesheet">
     <link href="img/favicon.png" rel="icon">
</head>

<body>
    <center>
        <img src="img/pdf/logoteste.png">
    </center>

    <div id="header">
        <center>
            <h3><b>Relatório de Eventos já Realizados</b>
                <h3>
        </center>
    </div>
    <br><br>
    
    <table id="tabela" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nome Evento</th>
                <th>Data</th>
                <th>Horario</th>
                <th>Endereço</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($eventos as $evento)
            <tr>
                <td>{{ $evento->nome_evento }}</td>
                <td>{{ date("d/m/Y", strtotime($evento->data)) }}</td>
                <td>{{ $evento->hora_inicio }}</td>
                <td>{{ $evento->endereco }}</td>
            </tr>
            @empty
            <tr>
                <td>Sem registro</td>
                <td>Sem registro</td>
                <td>Sem registro</td>
                <td>Sem registro</td>
            </tr>
            @endforelse

        </tbody>
    </table>
</body>

</html>