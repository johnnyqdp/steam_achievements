var games;
var username;

$(document).ready(function() {

    bootbox.dialog({
        message: $("#textoModalLogin").html(),
        closeButton: false,
        title: "Bem-vindo ao SteamAchievements!",
        headerCloseButton: null, 
        backdrop: "static",
        keyboard: false,
        buttons:{
            ok:{
                label: 'Prosseguir',
                className: 'btn btn-outline-primary botaoProsseguir',
                callback: function () {
                    if (username) {
                        adicionarIconeLoading();                
                        $.get("scraper.php?username=" + username, null, function (data) {
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
                }
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
    games.forEach(function (data, i) {
        let html = `<div class="joguinho" id="game_` + data.appid + `">
                        <div style="display: flex">
                            <div class="logo">
                                <img src="` + data.logo + `">
                            </div>

                            <div class="negocinhos">               
                                <h4 class="texto" style="margin-bottom:-20px">` + data.name + `</h4>
                                <br>
                                <span class="texto">` + data.hours_forever + ` horas de jogo</span>
                            </div>
                        </div>

                        <div class="achievementsContainer">
                            <i class="fa fa-spin fa-4x fa-spinner texto" style="margin-right: 40px"></i>
                        </div>

                    </div>`
        $('#box').append(html);
    });
}
