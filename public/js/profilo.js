

var body = document.body;
var nomeUtente = document.getElementsByTagName('a')[5].innerHTML.toLowerCase();
var pilota1;
var pilota2;
var scuderia;
var lenght = document.getElementsByClassName("divider").length;
document.getElementById("nomeSquadra").innerHTML = nomeUtente.toUpperCase();

if (nomeUtente == "oliver") {
    body.style.backgroundImage = "url(/img/scuderie/scuderieProfilo/RedBull.jpg";
    pilota1 = "Gasly";
    pilota2 = "Giovinazzi";
    scuderia = "RedBull";
    document.getElementById("pilotino1").setAttribute("src", "/img/piloti/" + pilota1 + ".png");
    document.getElementById("pilotino2").setAttribute("src", "/img/piloti/" + pilota2 + ".png");
    document.getElementById("nomePilota1").innerHTML = pilota1;
    document.getElementById("nomePilota2").innerHTML = pilota2;
    document.getElementById("nomeScuderia").innerHTML = scuderia;
    for (var i = 0; i < lenght; i++) {
        document.getElementsByClassName("divider")[i].style.borderColor = "blue";
    }
}
if (nomeUtente == "ciccio") {
    body.style.backgroundImage = "url(/img/scuderie/scuderieProfilo/Mercedes.png";
    pilota1 = "Raikkonen";
    pilota2 = "Alonso";
    scuderia = "Mercedes";
    document.getElementById("pilotino1").setAttribute("src", "/img/piloti/" + pilota1 + ".png");
    document.getElementById("pilotino2").setAttribute("src", "/img/piloti/" + pilota2 + ".png");
    document.getElementById("nomePilota1").innerHTML = pilota1;
    document.getElementById("nomePilota2").innerHTML = pilota2;
    document.getElementById("nomeScuderia").innerHTML = scuderia;
    for (var i = 0; i < lenght; i++) {
        document.getElementsByClassName("divider")[i].style.borderColor = "rgb(50, 168, 157)";
    }
}
if (nomeUtente == "andrea") {
    body.style.backgroundImage = "url(/img/scuderie/scuderieProfilo/Aston.jpg";
    pilota1 = "Russell";
    pilota2 = "Schumacher";
    scuderia = "Aston Martin";
    document.getElementById("pilotino1").setAttribute("src", "/img/piloti/" + pilota1 + ".png");
    document.getElementById("pilotino2").setAttribute("src", "/img/piloti/" + pilota2 + ".png");
    document.getElementById("nomePilota1").innerHTML = pilota1;
    document.getElementById("nomePilota2").innerHTML = pilota2;
    document.getElementById("nomeScuderia").innerHTML = scuderia;
    for (var i = 0; i < lenght; i++) {
        document.getElementsByClassName("divider")[i].style.borderColor = "rgb(3, 130, 60)";
    }
}
if (nomeUtente == "toto") {
    body.style.backgroundImage = "url(//img/scuderie/scuderieProfilo/Haas.jpg";
    pilota1 = "Verstappen";
    pilota2 = "Stroll";
    scuderia = "Haas";
    document.getElementById("pilotino1").setAttribute("src", "/img/piloti/" + pilota1 + ".png");
    document.getElementById("pilotino2").setAttribute("src", "/img/piloti/" + pilota2 + ".png");
    document.getElementById("nomePilota1").innerHTML = pilota1;
    document.getElementById("nomePilota2").innerHTML = pilota2;
    document.getElementById("nomeScuderia").innerHTML = scuderia;
    for (var i = 0; i < lenght; i++) {
        document.getElementsByClassName("divider")[i].style.borderColor = "white";
    }
}
if (nomeUtente == "dario") {
    body.style.backgroundImage = "url(/img/scuderie/scuderieProfilo/Mclaren.jpg";
    pilota1 = "Tsunoda";
    pilota2 = "Ocon";
    scuderia = "Mclaren";
    document.getElementById("pilotino1").setAttribute("src", "/img/piloti/" + pilota1 + ".png");
    document.getElementById("pilotino2").setAttribute("src", "/img/piloti/" + pilota2 + ".png");
    document.getElementById("nomePilota1").innerHTML = pilota1;
    document.getElementById("nomePilota2").innerHTML = pilota2;
    document.getElementById("nomeScuderia").innerHTML = scuderia;
    for (var i = 0; i < lenght; i++) {
        document.getElementsByClassName("divider")[i].style.borderColor = "orange";
    }
}
if (nomeUtente == "gianpaolo") {
    body.style.backgroundImage = "url(/img/scuderie/scuderieProfilo/Alpine.jpg";
    pilota1 = "Leclerc";
    pilota2 = "Bottas";
    scuderia = "Alpine";
    document.getElementById("pilotino1").setAttribute("src", "/img/piloti/" + pilota1 + ".png");
    document.getElementById("pilotino2").setAttribute("src", "/img/piloti/" + pilota2 + ".png");
    document.getElementById("nomePilota1").innerHTML = pilota1;
    document.getElementById("nomePilota2").innerHTML = pilota2;
    document.getElementById("nomeScuderia").innerHTML = scuderia;
    for (var i = 0; i < lenght; i++) {
        document.getElementsByClassName("divider")[i].style.borderColor = "blue";
    }
}
if (nomeUtente == "spiritoblu") {
    body.style.backgroundImage = "url(/img/scuderie/scuderieProfilo/Ferrari.jpg";
    pilota1 = "Sainz";
    pilota2 = "Vettel";
    scuderia = "Ferrari";
    document.getElementById("pilotino1").setAttribute("src", "/img/piloti/" + pilota1 + ".png");
    document.getElementById("pilotino2").setAttribute("src", "/img/piloti/" + pilota2 + ".png");
    document.getElementById("nomePilota1").innerHTML = pilota1;
    document.getElementById("nomePilota2").innerHTML = pilota2;
    document.getElementById("nomeScuderia").innerHTML = scuderia;
    for (var i = 0; i < lenght; i++) {
        document.getElementsByClassName("divider")[i].style.borderColor = "red";
    }
}
if (nomeUtente == "pinguinosquadracorse") {
    body.style.backgroundImage = "url(/img/scuderie/scuderieProfilo/Williams.jpg";
    pilota1 = "Hamilton";
    pilota2 = "Mazepin";
    scuderia = "Williams";
    document.getElementById("pilotino1").setAttribute("src", "/img/piloti/" + pilota1 + ".png");
    document.getElementById("pilotino2").setAttribute("src", "/img/piloti/" + pilota2 + ".png");
    document.getElementById("nomePilota1").innerHTML = pilota1;
    document.getElementById("nomePilota2").innerHTML = pilota2;
    document.getElementById("nomeScuderia").innerHTML = scuderia;
    for (var i = 0; i < lenght; i++) {
        document.getElementsByClassName("divider")[i].style.borderColor = "white";
    }
}
if (nomeUtente == "ermenegildo") {
    body.style.backgroundImage = "url(/img/scuderie/scuderieProfilo/Alpha.jpg";
    pilota1 = "Ricciardo";
    pilota2 = "Latifi";
    scuderia = "Alpha Tauri";
    document.getElementById("pilotino1").setAttribute("src", "/img/piloti/" + pilota1 + ".png");
    document.getElementById("pilotino2").setAttribute("src", "/img/piloti/" + pilota2 + ".png");
    document.getElementById("nomePilota1").innerHTML = pilota1;
    document.getElementById("nomePilota2").innerHTML = pilota2;
    document.getElementById("nomeScuderia").innerHTML = scuderia;
    for (var i = 0; i < lenght; i++) {
        document.getElementsByClassName("divider")[i].style.borderColor = "rgb(8, 1, 59)";
    }
}
if (nomeUtente == "alessiodom97") {
    body.style.backgroundImage = "url(/img/scuderie/scuderieProfilo/Alfa.jpg";
    pilota1 = "Norris";
    pilota2 = "Perez";
    scuderia = "Alfa Racing";
    document.getElementById("pilotino1").setAttribute("src", "/img/piloti/" + pilota1 + ".png");
    document.getElementById("pilotino2").setAttribute("src", "/img/piloti/" + pilota2 + ".png");
    document.getElementById("nomePilota1").innerHTML = pilota1;
    document.getElementById("nomePilota2").innerHTML = pilota2;
    document.getElementById("nomeScuderia").innerHTML = scuderia;
    for (var i = 0; i < lenght; i++) {
        document.getElementsByClassName("divider")[i].style.borderColor = "rgb(105, 13, 1)";
    }
}



