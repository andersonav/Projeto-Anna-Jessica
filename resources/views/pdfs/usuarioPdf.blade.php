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
            <h3><b>Relatório de Usuarios</b>
                <h3>
        </center>
    </div>
    <br><br>
    
    <table id="tabela" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th style="width:20%;">Nome</th>
                <th>Email</th>
                <th style="width:30%">Telefone</th>
                <th>Cidade</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($usuarios as $usuario)
            <tr>
                <td>{{$usuario->nome_usuario}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->telefone_usuario}}</td>
                <td>{{$usuario->cidade_usuario}}</td>
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