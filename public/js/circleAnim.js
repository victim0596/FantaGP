var circle = document.querySelectorAll('circle');
var radius = circle[0].r.baseVal.value;
var circumference = radius * 2 * Math.PI;
const inputElem = document.getElementsByClassName("valorePerc");

setTimeout(function(){
    changeProgress();
},3000);


function setProgress(percent, cerchio) {
    const offset = circumference - percent / 100 * circumference;
    cerchio.style.strokeDashoffset = offset;
  }

function changeProgress(){
    for(var i=0; i<inputElem.length; i++){
        circle[i].style.strokeDasharray = `${circumference} ${circumference}`;
        circle[i].style.strokeDashoffset = `${circumference}`;
        const input = inputElem[i].innerHTML.replace('%','');
        setProgress(input, circle[i]);
    }
}

function removeDomElement(){
    if(window.innerWidth<=991){
        /*rimuovo e aggiungo l'accordion*/
        var barraElem = document.getElementsByClassName("barraLaterale")[0];
        document.getElementsByClassName("colUser")[0].removeChild(document.getElementsByClassName("barraLaterale")[0]);
        var accordionBody = document.getElementsByClassName("accordion-body")[0];
        accordionBody.appendChild(barraElem);
        /*modifico il pannello delle statistiche rendendo visibili solo 2 colonne*/
        var contStat = document.getElementsByClassName("contStat")[0];
        contStat.classList.add("row-cols-2");
    }
}

removeDomElement();
