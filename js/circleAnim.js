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
