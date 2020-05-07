var games;
var username;
var url;

$(document).ready(function() {

    setTimeout(function(){
        document.addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
              $('.botaoProsseguir').click();
            }
        });
    }, 2000);
    

    bootbox.dialog({
        message: $("#textoModalLogin").html(),
        closeButton: false,
        title: "Bem-vindo ao SteamAchievements!",
        headerCloseButton: null, 
        backdrop: "static",
        //keyboard: false,
        buttons:{
            ok:{
                label: 'Prosseguir',
                className: 'btn btn-outline-primary botaoProsseguir',
                callback: function() {
                    if (username) {
                        adicionarIconeLoading(); 
                        url = "scraper.php?username=" + username;
                        $.get(url, null, function (data) {
                            try {
                                games = JSON.parse(data);
                                percorrerJogos(games);
                                bootbox.hideAll()
                                return true;
                            } catch (e) {
                                mensagemErro();
                                removerIconeLoading();
                            }                            
                        }).fail(function () {
                            mensagemErro();
                            removerIconeLoading();
                        });
                        return false;
                    } else {
                        return false;
                    }
                },
            },
        }
    })
});

function mensagemErro() {
    toastr.error("Ocorreu um erro inesperado. Verifique se o nick inserido está correto. Se o nick estiver correto, me avisa pra eu corrigir o bug!", "Erro");
}

function adicionarIconeLoading () {
    removerIconeLoading();
    $(".botaoProsseguir").append('<i style="margin-left:10px" class="fa fa-spin fa-spinner"></i>');
}

function removerIconeLoading () {
    $(".botaoProsseguir").find('.fa-spin').remove();
}

function changeName (name) {
    username = name;
}

function percorrerJogos (games) {
    $('#box').html('');
    if (games.length == 0) {
        $('#box').html('<span style="display:flex;align-items:center;justify-content:center;text-align:center" class="texto">Não encontrei nenhum jogo... <br>A url que tentei acessar foi: https://steamcommunity.com/id/' + username + '/games/?tab=all <br>Provavelmente o perfil deste jogador está privado! :(</span>');
    }
    games.forEach(function (data, i) {
        let horas = "0";
        if (data.hours_forever) {
            horas = data.hours_forever;
        }
        let nomeClasse = "joguinho";
        if ((i % 2) == 1) {
            nomeClasse += "2";
        }
        let html = `<div class="` + nomeClasse + `" id="game_` + data.appid + `">
                        <div style="display: flex">
                            <div class="logo">
                                <img src="` + data.logo + `">
                            </div>

                            <div class="negocinhos">               
                                <h4 class="texto" style="margin-bottom:-20px">` + data.name + `</h4>
                                <br>
                                <span class="texto">` + horas + ` horas de jogo</span>
                            </div>
                        </div>

                        <div class="achievementsContainer">
                            <i class="fa fa-spin fa-4x fa-spinner texto" style="margin-right: 40px"></i>
                        </div>

                    </div>`
        $('#box').append(html);
    });
    adicionaNome();    
}

function adicionaNome() {
    let a = "scraperNome.php?username=" + username;
    $.get(a, null, function (data) {
        try {
            $("#nomeUsuario").html(data);
        } catch (e) {
            
        }                            
    });
}
