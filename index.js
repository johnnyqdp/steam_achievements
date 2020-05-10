var games;
var username;
var url;
var isMobile = false;

var quantGamesCheckados = 0;

$(document).ready(function() {

    if (screen.width <= 830) {
        isMobile = true;
    }

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
                                $("#quantJogosTotal").html(games.length);
                                percorrerJogos(games);
                                bootbox.hideAll()

                                if (isMobile) {
                                    setTimeout(function(){
                                        bootbox.dialog({
                                            closeButton: null, 
                                            message: '<b>DICA:</b> Você pode ver todas as conquistas de um jogo clicando nele.',
                                            buttons:{
                                                ok:{
                                                    label: 'Entendi',
                                                    className: 'btn btn-outline-secondary'
                                                },
                                            }
                                        })
                                    }, 4000);
                                }

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
        let html = getHtmlJogo(nomeClasse, data.appid, data.logo, data.name, horas);
        
        $('#box').append(html);
    });

    adicionaNome();
    
    pegarAchievements(games);

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

function pegarAchievements() {
    $("#loading").fadeIn(300);
    games.forEach( function (data, i) {
        let gameId = data.friendlyURL;
        let idHtml = data.appid;
        let link = "scraperAchievements.php?username=" + username + '&gameId=' + gameId + '&isMobile=' + isMobile;  
        let gameName = data.name;      

        $.get(link, null, function (data) {
            try {
                $('#achievementsContainer_' + idHtml).html(data);
                $("#jogoAtual").html(gameName);
                quantGamesCheckados++;
                $("#quantJogosCheckados").html(quantGamesCheckados);
                if (quantGamesCheckados == games.length)
                    $("#loading").fadeOut();
            } catch (e) {
                
            }                            
        });      

    })
    
}

function getHtmlJogo (nomeClasse, appid, logo, name, horas) {
    let displayFlex = "style='display:flex;'";
    let classNegocinhos = "class='negocinhos'";
    let styleLogo = '';
    if (isMobile) {
        nomeClasse += "mobile";
        classNegocinhos = '';
        displayFlex = '';
        styleLogo = 'style="display: flex;justify-content: center;"'
    }

    return `<div class="` + nomeClasse + `" id="game_` + appid + `">
                <div `+ displayFlex + `>
                    <div class="logo" ` + styleLogo + `>
                        <img src="` + logo + `">
                    </div>

                    <div ` + classNegocinhos + `>               
                        <h4 class="texto" style="margin-bottom:-20px">` + name + `</h4>
                        <br>
                        <span class="texto">` + horas + ` horas de jogo</span>
                    </div>
                </div>

                <div class="achievementsContainer" id="achievementsContainer_` + appid + `">
                    <i class="fa fa-spin fa-4x fa-spinner texto" style="margin-right: 40px"></i>
                </div>

            </div>`
}



