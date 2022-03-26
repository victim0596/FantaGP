function setClassificaEstetica() {
    var allTdName = document.querySelectorAll("tr .nameDriver");

    var allImgScuderia = document.querySelectorAll("td .logoScuderia");

    var spanTd = document.querySelectorAll("tr .nameDriver span");

    var objDriver = {
        alessiodom97: "alfa",
        Oliver: "redbull",
        SpiritoBlu: "Ferrari",
        Toto: "haas",
        Ciccio: "mercedes",
        Andrea: "aston",
        Dario: "mclaren",
        pinguinoSquadracorse: "williams",
        Ermenegildo: "tauri",
        gianpaolo: "Alpine"
    }

    var objColor = {
        alessiodom97: "rgb(105, 13, 1)",
        Oliver: "blue",
        SpiritoBlu: "red",
        Toto: "white",
        Ciccio: "rgb(50, 168, 157)",
        Andrea: "rgb(3, 130, 60)",
        Dario: "orange",
        pinguinoSquadracorse: "white",
        Ermenegildo: "rgb(8, 1, 59)",
        gianpaolo: "rgba(0, 119, 255, 0.836"
    }


    for (var i = 0; i < allTdName.length; i++) {
        var element = allTdName[i].innerText.replace(/\s+/, "").substring(1)
        allImgScuderia[i].src = `img/scuderie/scuderieClassifica/${objDriver[element]}.png`;
        spanTd[i].style.borderRightColor = `${objColor[element]}`;
    }
}





