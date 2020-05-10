var games;
var username;
var url;
var isMobile = false;

var quantGamesCheckados = 0;

$(document).ready(function() {

    (function(a){(jQuery.browser=jQuery.browser||{}).mobile=/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))})(navigator.userAgent||navigator.vendor||window.opera);

    isMobile = jQuery.browser.mobile;
    
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



