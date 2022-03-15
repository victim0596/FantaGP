

var actualDate = new Date();

var DateRace = {
    "Bahrein": new Date(2022, 02, 20, 13),
    "Arabia Saudita": new Date(2022, 02, 27, 16),
    "Australia": new Date(2022, 03, 10, 4),
    "Italia-Imola": new Date(2022, 03, 24, 12),
    "USA-Miami": new Date(2022, 04, 08, 18, 30),
    "Spagna": new Date(2022, 04, 22, 12),
    "Monaco": new Date(2022, 04, 29, 12),
    "Azerbaijan": new Date(2022, 05, 12, 10),
    "Canada": new Date(2022, 05, 19, 17),
    "Gran Bretagna": new Date(2022, 06, 03, 13),
    "Austria": new Date(2022, 06, 10, 12),
    "Francia": new Date(2022, 06, 24, 12),
    "Ungheria": new Date(2022, 06, 31, 12),
    "Belgio": new Date(2022, 07, 28, 12),
    "Olanda": new Date(2022, 08, 04, 12),
    "Italia-Monza": new Date(2022, 08, 11, 12),
    "Singapore": new Date(2022, 09, 02, 11),
    "Giappone": new Date(2022, 09, 09, 4),
    "USA-Cota": new Date(2022, 09, 23, 18),
    "Messico": new Date(2022, 09, 30, 18),
    "Brasile": new Date(2022, 10, 13, 16),
    "Emirati Arabi": new Date(2022, 10, 20, 11)
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





