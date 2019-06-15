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

    @foreach($eventos as $evento)
    <div id="lista">
        <div class="item">
            Evento: {{$evento->nome_evento}}
        </div>

    </div>

    @endforeach
</body>

</html>