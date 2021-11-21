

var actualDate = new Date();

var DateRace = {
    "Bahrein": new Date(2021, 02, 28, 14),
    "Italia-Imola": new Date(2021, 03, 18, 12),
    "Portogallo": new Date(2021, 04, 02, 13),
    "Spagna": new Date(2021, 04, 09 ,12),
    "Monaco": new Date(2021, 04, 23 ,12),
    "Azerbaigian": new Date(2021, 05, 06, 11),
    "Francia": new Date(2021, 05, 20 ,12),
    "Austria": new Date(2021, 05, 27 ,12),
    "Austria-2": new Date(2021, 06, 04, 12),
    "Gran Bretagna": new Date(2021, 06, 18, 13),
    "Ungheria": new Date(2021, 07, 01 ,12),
    "Belgio": new Date(2021, 07, 29 ,12),
    "Olanda": new Date(2021, 08, 05 ,12),
    "Italia-Monza": new Date(2021, 08, 12, 12),
    "Russia": new Date(2021, 08, 26 ,11),
    "Turchia": new Date(2021, 09, 10, 12),
    "USA": new Date(2021, 09, 24 ,18),
    "Messico": new Date(2021, 10, 07 ,17),
    "Brasile": new Date(2021, 10, 14 ,15),
    "Qatar": new Date(2021, 10, 21 ,12),
    "Arabia Saudita": new Date(2021, 11, 05 ,14),
    "Emirati Arabi": new Date(2021, 11, 12 ,11)
}

var raceData = document.getElementsByClassName("raceValue")[0];

function changeRace() {
    for (var key in DateRace) {
        if (actualDate < DateRace[key]) {
            raceData.setAttribute("value", key);
            break;
        }
    }
}

changeRace();





