if(document.getElementById('txtAlert').innerText == "") document.getElementById('alert').style.visibility="hidden";
else {
    if(document.getElementById('txtAlert').innerText != " I dati sono stati inseriti correttamente"){
        document.getElementById('alert').classList.remove('alert-primary');
        document.getElementById('alert').classList.add('alert-danger');
        document.getElementById('simbolID').setAttribute("xlink:href", "#exclamation-triangle-fill");
        document.getElementById('alert').style.visibility="none";
    }   
}