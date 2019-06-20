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
            <h3><b>Relatório de Kits Vendidos no Evento</b>
                <h3>
        </center>
    </div>
    <br><br>
    
    <table id="tabela" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th style="width:20%;">Usuario</th>
                <th style="width:20%;">Nome evento</th>
                <th style="width:20%;">Nome kit</th>
                <th>Tamanho</th>
                <th>Cidade</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kits as $kit)
            <tr>
                <td>{{ $kit->nome_usuario }}</td>
                <td>{{ $kit->nome_evento }}</td>
                <td>{{ $kit->nome_kit }}</td>
                <td>{{ $kit->tamanho }}</td>
                <td>{{ $kit->cidade_usuario  }}</td>
                <td>{{ $kit->valor }}</td>
            </tr>
            @empty
            <tr>
                <td>Sem registro</td>
                <td>Sem registro</td>
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