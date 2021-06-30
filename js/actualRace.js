

var actualDate = new Date();

var DateRace = {
    "Bahrein": Date.parse('2021-03-28 14:00:00'),
    "Italia-Imola": Date.parse('2021-04-18 12:00:00'),
    "Portogallo": Date.parse('2021-05-02 13:00:00'),
    "Spagna": Date.parse('2021-05-09 12:00:00'),
    "Monaco": Date.parse('2021-05-23 12:00:00'),
    "Azerbaigian": Date.parse('2021-06-06 11:00:00'),
    "Francia": Date.parse('2021-06-20 12:00:00'),
    "Austria": Date.parse('2021-06-27 12:00:00'),
    "Austria-2": Date.parse('2021-07-04 12:00:00'),
    "Gran Bretagna": Date.parse('2021-07-18 13:00:00'),
    "Ungheria": Date.parse('2021-08-01 12:00:00'),
    "Belgio": Date.parse('2021-08-29 12:00:00'),
    "Olanda": Date.parse('2021-09-05 12:00:00'),
    "Italia-Monza": Date.parse('2021-09-12 12:00:00'),
    "Russia": Date.parse('2021-09-26 11:00:00'),
    "Singapore": Date.parse('2021-10-03 11:00:00'),
    "Giappone": Date.parse('2021-10-10 04:00:00'),
    "USA": Date.parse('2021-10-24 18:00:00'),
    "Messico": Date.parse('2021-10-31 17:00:00'),
    "Brasile": Date.parse('2021-11-07 15:00:00'),
    "Australia": Date.parse('2021-11-21 04:00:00'),
    "Arabia Saudita": Date.parse('2021-12-05 14:00:00'),
    "Emirati Arabi": Date.parse('2021-12-12 11:00:00')
}

var raceData = document.getElementsByClassName("raceValue")[0];

function changeRace(){
    for (var key in DateRace) {
        if(actualDate < DateRace[key]){
            raceData.setAttribute("value", key);
            break;
        }
    }
}

changeRace();





