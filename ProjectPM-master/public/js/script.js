$(document).ready(function() {
    $("a[data-confirm]").click(function(ev) {
        var href = $(this).attr("href");
        if (!$("#confirm-delete").length) {
            $("body").append(
                '<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header bg-primary"><h5 class="modal-title" id="exampleModalLabel">Atenção!</h5><button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Deseja realmente prosseguir com a ação ?</div><div class="modal-footer"><a id="dataComfirmOK" class="btn btn-success"  onclick="sucesso()" >Sim</a><button  class="btn btn-danger" data-dismiss="modal">Não</button></div></div></div></div>'
            );
        }
        $("#dataComfirmOK").attr("href", href);
        $("#confirm-delete").modal({ shown: true });
        return false;
    });
});

$(document).ready(function() {
    $("a[data-edit]").click(function(ev) {
        var href = $(this).attr("href");
        if (!$("#confirm-delete").length) {
            $("body").append(
                '<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header bg-primary"><h5 class="modal-title" id="exampleModalLabel">Atenção!</h5><button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Deseja realmente prosseguir com a ação ?</div><div class="modal-footer"><a id="dataComfirmOK" class="btn btn-success" >Sim</a><button  class="btn btn-danger" data-dismiss="modal">Não</button></div></div></div></div>'
            );
        }
        $("#dataComfirmOK").attr("href", href);
        $("#confirm-delete").modal({ shown: true });
        return false;
    });
});

function confirma() {
    var pupup = document.getElementById("popupcx");
    var sim = document.getElementById("popupbtnsim");
    sim.disabled = false;
    pupup.style.display = "block";
}

function confirmar(a) {
    if (a == "Ok") {
        confirma();
    } else if (a == "Não") {
    } else if (a == "Refazer") {
        return alert(a);
    }
}

function nao() {
    location.href = "";
}

function sim() {
    return true;
}

function confirmarPermuta() {
    alert("Permuta confirmada, Aguardar liberação da SPO e do CMD de pelotão");
}

function sucesso() {
    alert("Registro efetivado!");
}

function Radiosim() {
    var guarnicao = document.getElementById("Radioguarnicao");
    var setor = document.getElementById("SetorTela2");
    guarnicao.style.display = "block";
    setor.style.display = "block";
}

function Radionao() {
    var guarnicao = document.getElementById("Radioguarnicao");
    var setor = document.getElementById("SetorTela2");
    guarnicao.style.display = "none";
    setor.style.display = "none";
}

var verificar = document.getElementById("sim");

if (verificar.checked) {
    Radiosim();
} else {
    Radionao();
}


// function sizeImage(event) {

//     var imagem = document.getElementById("sizeImage");

//     imagem.style.position = 'absolute';
//     imagem.style.top = '-80px';
//     imagem.style.right = '10px';
//     imagem.style.width = "800px";
//     imagem.style.height = "1200px";
// }

// function redefinir(){
//     var imagem = document.getElementById("sizeImage");
//     imagem.style.width = "100px";
//     imagem.style.height = "100px";
// }
