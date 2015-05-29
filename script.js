function verificaCampos() {
    if (document.getElementById("user").value == "" || document.getElementById("user").value == null) {
        alert("Preencha todos os Campos !");
    } else if (document.getElementById("passUser").value == "" || document.getElementById("passUser").value == null) {
        alert("Preencha todos os Campos !");
    }
}

function confirmarEdicaoUsuario() {
    r = confirm("Você tem certeza ?");
    if (r == true) {
        location.href = "trataEditNU.php";
    }
}

function mostraCadastro() {
    loadPageDoc("index.php", "listar");
}

function realizaAcaoCad(id) {
    loadPageDoc("EditarCadastro.php?codigo=" + id + "", "listar");
}

function realizaAcaoUsu(id) {
    loadPageDoc("EditarCadastroNU.php?codigo=" + id + "", "listar");
}
function validaRota(id) {
    r = confirm("Você tem certeza ?");
    if (r == true) {
        location.href = "trataDadosExcluir.php?codigo=" + id + "";
    }
}
function confirmar() {
    r = confirm("Você tem certeza ?");
    if (r == true) {
        location.href = "trataEdit.php";
    }
}


function confirmarBack() {
    r = confirm("Você tem certeza ?");
    if (r == true) {
        loadPageDoc("index.php", "listar");
    }
}

function validaRotaNU(id) {
    r = confirm("Você tem certeza ?");
    if (r == true) {
        location.href = "trataDadosExcluirNU.php?codigo=" + id + "";
    }
}

function loadPageDoc(doc, div) {
    var xmlhttp;

    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById(div).innerHTML = "<img src='ajax-loader.gif'/>";
        }
    }

    xmlhttp.open("GET", doc, true);
    xmlhttp.send();
}