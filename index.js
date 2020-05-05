var musicaLigada = true;

var username = "";
var tenises = 0;
var a = 0;
var b = 0;
var c = 0;
var d = 0;
var e = 0;

var variacaoTenis = 1;

$(document).ready(function() {

    bootbox.dialog({
        message: $("#textoModalLogin").html(),
        closeButton: false,
        title: "Bem-vindo ao Freire Clicker!",
        headerCloseButton: null, 
        backdrop: "static",
        keyboard: false,
        buttons:{
            ok:{
                label: 'Prosseguir',
                className: 'btn btn-outline-danger',
                callback: function(){
                    if (!username){
                        return false;
                    } else {
                        $.get("https://freire-clicker-api.herokuapp.com/index.php?nome="+username, null, (data)=>{
                            if (data){
                                tenises = parseInt(data.pontos);
                                $("#quantTenis").html(data.pontos);
                                a = parseInt(data.a);
                                b = parseInt(data.b);
                                c = parseInt(data.c);
                                d = parseInt(data.d);
                                e = parseInt(data.e);
                            }
                            $("#ost")[0].loop = true;
                            $("#ost")[0].volume = 0.04;
                            $("#ost")[0].play();
                            document.addEventListener('keydown', e => {
                                if (e.repeat) return;
                                if (e.key == " ") farmar();
                            })
                            save();
                        },"json");
                    }
                }
            },
        }
    })
});

$("#musicaSwitch").click(()=> {
    let classe = musicaLigada ? 'fa fa-volume-off fa-2x' : 'fa fa-volume-up fa-2x';
    $("#ost")[0].volume = musicaLigada ? 0 : 0.04;
    musicaLigada = !musicaLigada;
    $("#musicaSwitch")[0].className = classe;
});

function changeName (name) {
    username = name;
}

function farmar () {  
    tenises += variacaoTenis;
    $("#quantTenis").html(tenises);
}

function comprar () {
    bootbox.dialog({
        message:$("#textoModalMercado").html(),
    })
}

function save () {
    setTimeout(()=> {
        $.post("https://freire-clicker-api.herokuapp.com", 
            {
                "nome": username, 
                "pontos": tenises,
                "a":a,
                "b":b,
                "c":c,
                "d":d,
                "e":e                
            }
        , ()=>{
            toastr.info("Seus tênises foram salvos no servidor com sucesso!", "Jogo salvo automaticamente");
            save();
        },"json");
    }, 20000);
}

function verRanking(){
    let htmlRank = `    
    <div style="height:500px;overflow-y: auto">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center" scope="col">Posição</th>
                    <th class="text-center" scope="col">Jogador</th>
                    <th class="text-center" scope="col" style="width:25%">Quantidade de Tênises</th>
                </tr>
            </thead>
            <tbody>`;

    $.get("https://freire-clicker-api.herokuapp.com", null, (data) => {

        Object.keys(data).forEach((value, i) => {
            let posicao = i+1;
            htmlRank+='<tr>';
            htmlRank+='<td class="text-center">'+ posicao +'º</td>';
            htmlRank+='<td class="text-center">'+ value +'</td>';
            htmlRank+='<td class="text-center">'+ data[value].pontos +'</td>';
            htmlRank+="</tr>";
        });
        htmlRank+=`</tbody></table></div>`;
        bootbox.dialog({
            message: htmlRank,
            title: "Ranking",
        })
    },"json")
}