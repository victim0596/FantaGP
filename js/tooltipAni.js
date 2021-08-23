var tooltipPtMaxCont = document.getElementsByClassName("contPtMax")[0];
var tooltipPtMinCont = document.getElementsByClassName("contPtMin")[0];

tooltipPtMaxCont.addEventListener("mouseover", function(e){
    var tooltipPtMax = document.getElementsByClassName("tooltipPtMax")[0];
    tooltipPtMax.style.opacity = 1;
    tooltipPtMax.style.left = (e.offsetX).toString()+"px";
});
tooltipPtMinCont.addEventListener("mouseover", function(e){
    var tooltipPtMin = document.getElementsByClassName("tooltipPtMin")[0];
    tooltipPtMin.style.opacity = 1;
    tooltipPtMin.style.left = (e.offsetX).toString()+"px";
});

tooltipPtMaxCont.addEventListener("mouseleave", function(){
    var tooltipPtMax = document.getElementsByClassName("tooltipPtMax")[0];
    tooltipPtMax.style.opacity = 0;
});
tooltipPtMinCont.addEventListener("mouseleave", function(){
    var tooltipPtMin = document.getElementsByClassName("tooltipPtMin")[0];
    tooltipPtMin.style.opacity = 0;
});

