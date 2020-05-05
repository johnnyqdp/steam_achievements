<!doctype html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" sizes="16x16 32x32 64x64" href="favicon.ico">
	<link rel="icon" type="image/png" sizes="196x196" href="favicon-192.png">
	<link rel="icon" type="image/png" sizes="160x160" href="favicon-160.png">
	<link rel="icon" type="image/png" sizes="96x96" href="favicon-96.png">
	<link rel="icon" type="image/png" sizes="64x64" href="favicon-64.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon-32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon-16.png">
	<link rel="apple-touch-icon" href="favicon-57.png">
	<link rel="apple-touch-icon" sizes="114x114" href="favicon-114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="favicon-72.png">
	<link rel="apple-touch-icon" sizes="144x144" href="favicon-144.png">
	<link rel="apple-touch-icon" sizes="60x60" href="favicon-60.png">
	<link rel="apple-touch-icon" sizes="120x120" href="favicon-120.png">
	<link rel="apple-touch-icon" sizes="76x76" href="favicon-76.png">
	<link rel="apple-touch-icon" sizes="152x152" href="favicon-152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="favicon-180.png">
	<meta name="msapplication-TileColor" content="#FFFFFF">
	<meta name="msapplication-TileImage" content="favicon-144.png">
    <meta name="msapplication-config" content="browserconfig.xml">

    <link rel="stylesheet" type="text/css" href="./index.css"></link>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Freire Clicker</title>
</head>

<body>
    <i class="fa fa-volume-up fa-2x" id="musicaSwitch" style="margin-left:10px; margin-top:10px"></i>

    <audio controls id="ost" volume=0.1 style="display:none">
        <source src="ost.ogg" type="audio/ogg">
    </audio>
     
    <div class="content">
        <div class="box">
            <div class="buyButton">
                <button type="button" class="btn btn-success" onclick="comprar()"><i class="fa fa-shopping-cart fa-3x" aria-hidden="true"></i></button>
            </div>
            <div class="topMenu">
                <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" style="margin-right:15px" title="Ranking" onclick="verRanking()"><i class="fa fa-list-ol fa-lg" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-secondary" title="Jogar Multiplayer" data-toggle="tooltip" data-placement="top"><i class="fa fa-globe fa-lg" aria-hidden="true" ></i></button>
            </div>
            
            <div class="center">
                <img src="imagens/freire.png"></img>
                <div style="font-size:30px; margin-top:10px; margin-bottom:10px">Você tem <span id="quantTenis">0</span> tenises</div>
                <div id="farmButton" class="center" title="Você também pode farmar apertando espaço." onclick="farmar()">FARMAR</div>
            </div>
        </div>
    </div>

    <div id="textoModalLogin" style="display:none">
        <label for="nickname">Por favor, insira o seu nome:</label>
        <input type="text" class="form-control" id="nicknameFormInput" aria-describedby="nickname" placeholder="XxAmoTenisxX" maxlength="15" onchange="changeName(this.value)">
        <small class="form-text text-muted">Este nome será exibido no ranking.</small>
    </div>

    <div id="textoModalMercado" style="display:none">
        <br><br><br><br><br><br><br><br><br><br><br><br><br>asdasdassd
    </div>    

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="bibliotecasJavascript/bootbox.min.js"></script>

</body>

</html>
<link type="text/css" href="./toastr.css" rel="stylesheet"></link>
<script src="toastr.js"></script>
<script type="text/javascript" src="index.js"></script>