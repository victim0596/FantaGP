var driverArray = [
    "Hamilton", "Bottas", "Verstappen", "Perez", "Sainz", "Leclerc", "Ricciardo", "Norris", "Alonso", "Ocon",
    "Zhou", "Magnussen", "Gasly", "Tsunoda", "Russell", "Latifi", "Albon", "Schumacher", "Vettel", "Stroll"
];

var pronoQualy = {
    qp1: "",
    qp2: "",
    qp3: ""
}

var pronoRace = {
    gp1: "",
    gp2: "",
    gp3: "",
    fastLap: "",
}

var qp1Form = document.getElementsByName("qp1")[0];
var qp2Form = document.getElementsByName("qp2")[0];
var qp3Form = document.getElementsByName("qp3")[0];
var gp1Form = document.getElementsByName("gp1")[0];
var gp2Form = document.getElementsByName("gp2")[0];
var gp3Form = document.getElementsByName("gp3")[0];
var fastLapForm = document.getElementsByName("giro_veloce")[0];
var btnQualy = document.getElementsByName("invia_quali")[0];
var btnRace = document.getElementsByName("invia_race")[0];

var urlPage = window.location.href;


btnQualy.disabled = true;
btnRace.disabled = true;


/* FORM QUALIFICA */
qp1Form.addEventListener('input', function () {
    pronoQualy.qp1 = qp1Form.value;
    checkDriverQualy();
});
qp2Form.addEventListener('input', function () {
    pronoQualy.qp2 = qp2Form.value;
    checkDriverQualy();
});
qp3Form.addEventListener('input', function () {
    pronoQualy.qp3 = qp3Form.value;
    checkDriverQualy();
});


/* FORM GARA */
gp1Form.addEventListener('input', function () {
    pronoRace.gp1 = gp1Form.value;
    checkDriverRace();
});
gp2Form.addEventListener('input', function () {
    pronoRace.gp2 = gp2Form.value;
    checkDriverRace();
});
gp3Form.addEventListener('input', function () {
    pronoRace.gp3 = gp3Form.value;
    checkDriverRace();
});

fastLapForm.addEventListener('input', function () {
    pronoRace.fastLap = fastLapForm.value;
    checkDriverRace();
});


//ricordati di cambiare i link
function checkDriverQualy() {
    if (pronoQualy.qp1 == pronoQualy.qp2 || pronoQualy.qp1 == pronoQualy.qp3 || pronoQualy.qp2 == pronoQualy.qp3) {
    }
    else {
        if (driverArray.indexOf(pronoQualy.qp1) >= 0 && driverArray.indexOf(pronoQualy.qp2) >= 0 && driverArray.indexOf(pronoQualy.qp3) >= 0) {
            btnQualy.disabled = false;
        }
        else {
            btnQualy.disabled = true;
        }
    }
}


//ricordati di cambiare i link
function checkDriverRace() {
    if (pronoRace.gp1 == pronoRace.gp2 || pronoRace.gp1 == pronoRace.gp3 || pronoRace.gp2 == pronoRace.gp3) {
    }
    else {
        //controllo se i piloti del form gara sono esistenti
        if (driverArray.indexOf(pronoRace.gp1) >= 0 && driverArray.indexOf(pronoRace.gp2) >= 0 && driverArray.indexOf(pronoRace.gp3) >= 0 && driverArray.indexOf(pronoRace.fastLap) >= 0) {
            btnRace.disabled = false;
        }
        else {
            btnRace.disabled = true;
        }
    }
}