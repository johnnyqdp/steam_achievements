<?php 
header("Access-Control-Allow-Origin: *");
?>

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

    <link rel="stylesheet" type="text/css" href="./loading-bar.css"/>
    
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Steam Achievements</title>
</head>

<body>     
    <div class="content" id="content">
        <span id="loading" style="margin-bottom: 2px; color: #868686; font-family: monospace; font-size: 10px; float:right; align-self: flex-start; display: none;">
            <i class="fa fa-spin fa-spinner" style="margin-right:10px"></i>(<span id="quantJogosCheckados">0</span>/<span id="quantJogosTotal">0</span>) <span id="jogoAtual">...</span>
        </span>

        <h2 style="margin-bottom:20px; text-align:center" class="texto">Estatísticas de <span id="nomeUsuario"><i class="fa fa-spin fa-spinner texto"></i></span></h2>
       
        <div class="box" id="box">
        
            <div class="joguinho" id="game_304240">
                <div style="display: flex">
                    <div class="logo">
                    </div>

                    <div class="negocinhos">               
                        <h4 class="texto" style="margin-bottom:-20px"></h4>
                        <br>
                        <span class="texto"></span>
                    </div>
                </div>

            </div>
            <div class="joguinho" id="game_304240">
                <div style="display: flex">
                    <div class="logo">
                    </div>

                    <div class="negocinhos">               
                        <h4 class="texto" style="margin-bottom:-20px"></h4>
                        <br>
                        <span class="texto"></span>
                    </div>
                </div>

            </div>
            <div class="joguinho" id="game_304240">
                <div style="display: flex">
                    <div class="logo">
                    </div>

                    <div class="negocinhos">               
                        <h4 class="texto" style="margin-bottom:-20px"></h4>
                        <br>
                        <span class="texto"></span>
                    </div>
                </div>

            </div>
            <div class="joguinho" id="game_304240">
                <div style="display: flex">
                    <div class="logo">
                    </div>

                    <div class="negocinhos">               
                        <h4 class="texto" style="margin-bottom:-20px"></h4>
                        <br>
                        <span class="texto"></span>
                    </div>
                </div>

            </div>
            <div class="joguinho" id="game_304240">
                <div style="display: flex">
                    <div class="logo">
                    </div>

                    <div class="negocinhos">               
                        <h4 class="texto" style="margin-bottom:-20px"></h4>
                        <br>
                        <span class="texto"></span>
                    </div>
                </div>

            </div>
            <div class="joguinho" id="game_304240">
                <div style="display: flex">
                    <div class="logo">
                    </div>

                    <div class="negocinhos">               
                        <h4 class="texto" style="margin-bottom:-20px"></h4>
                        <br>
                        <span class="texto"></span>
                    </div>
                </div>

            </div>
            <div class="joguinho" id="game_304240">
                <div style="display: flex">
                    <div class="logo">
                    </div>

                    <div class="negocinhos">               
                        <h4 class="texto" style="margin-bottom:-20px"></h4>
                        <br>
                        <span class="texto"></span>
                    </div>
                </div>

            </div>
            <div class="joguinho" id="game_304240">
                <div style="display: flex">
                    <div class="logo">
                    </div>

                    <div class="negocinhos">               
                        <h4 class="texto" style="margin-bottom:-20px"></h4>
                        <br>
                        <span class="texto"></span>
                    </div>
                </div>

            </div>

        </div>   
        <span style="margin-top:20px; text-align:center" class="texto">Criado por <a style="color:#68b0fd" target="_blank" href="https://www.facebook.com/johnnyqdp">Johnny Quest</a><br><span style="font-size: 10px;">Se tiver bugado me avisa lá no facebook ;)</span></span>   
    </div>
    

    <div id="textoModalLogin" style="display:none">
        <label for="nickname">Nick do usuário steam:</label>
        <input type="text" class="form-control" id="nicknameFormInput" aria-describedby="nickname" placeholder="JoaozinhoGameplays" maxlength="50" onchange="changeName(this.value)">
        <small class="form-text text-muted">Este deve ser o nick que aparece na url da steam ao abrir o perfil. Por exemplo: steamcommunity.com/id/<b>coffeepills</b></small>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="./loading-bar.js"></script>
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