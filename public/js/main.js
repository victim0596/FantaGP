//timer

//secondi
var secondi = document.getElementById('secondi');
var secondig = document.getElementById('secondig');
//minuti
var minuti = document.getElementById('minuti');
var minutig = document.getElementById('minutig');

//ore
var ore = document.getElementById('ore');
var oreg = document.getElementById('oreg');

//giorni
var giorni = document.getElementById('giorni');
var giornig = document.getElementById('giornig');

var date_future_race;
var date_future;

var DateRace = {
  "Bahrein": new Date(2021, 02, 28, 14),
  "Italia-Imola": new Date(2021, 03, 18, 12),
  "Portogallo": new Date(2021, 04, 02, 13),
  "Spagna": new Date(2021, 04, 09, 12),
  "Monaco": new Date(2021, 04, 23, 12),
  "Azerbaigian": new Date(2021, 05, 06, 11),
  "Francia": new Date(2021, 05, 20, 12),
  "Austria": new Date(2021, 05, 27, 12),
  "Austria-2": new Date(2021, 06, 04, 12),
  "Gran Bretagna": new Date(2021, 06, 18, 13),
  "Ungheria": new Date(2021, 07, 01, 12),
  "Belgio": new Date(2021, 07, 29, 12),
  "Olanda": new Date(2021, 08, 05, 12),
  "Italia-Monza": new Date(2021, 08, 12, 12),
  "Russia": new Date(2021, 08, 26, 11),
  "Turchia": new Date(2021, 09, 10, 12),
  "USA": new Date(2021, 09, 24, 18),
  "Messico": new Date(2021, 10, 07, 17),
  "Brasile": new Date(2021, 10, 14, 15),
  "Qatar": new Date(2021, 10, 21, 12),
  "Arabia Saudita": new Date(2021, 11, 05, 14),
  "Emirati Arabi": new Date(2021, 11, 12, 11)
}

function changeRace() {
  var actualDate = new Date();
  for (var key in DateRace) {
    if (actualDate < DateRace[key]) {
      date_future_race = DateRace[key];  //data gara
      date_future = new Date(date_future_race.getTime());
      date_future.setDate(date_future.getDate() - 1);
      date_future.setHours(date_future.getHours() - DateRace[key].getHours());
      break;
    }
  }
}

changeRace();

setInterval(function () {
  date_now = new Date();
  //calcolo tempo per le qualifiche
  dsecondi = Math.floor((date_future - (date_now)) / 1000);
  dminuti = Math.floor(dsecondi / 60);
  dore = Math.floor(dminuti / 60);
  dgiorni = Math.floor(dore / 24);
  dore = dore - (dgiorni * 24);
  dminuti = dminuti - (dgiorni * 24 * 60) - (dore * 60);
  dsecondi = dsecondi - (dgiorni * 24 * 60 * 60) - (dore * 60 * 60) - (dminuti * 60);
  //calcolo tempo per la gara
  rsecondi = Math.floor((date_future_race - (date_now)) / 1000);
  rminuti = Math.floor(rsecondi / 60);
  rore = Math.floor(rminuti / 60);
  rgiorni = Math.floor(rore / 24);
  rore = rore - (rgiorni * 24);
  rminuti = rminuti - (rgiorni * 24 * 60) - (rore * 60);
  rsecondi = rsecondi - (rgiorni * 24 * 60 * 60) - (rore * 60 * 60) - (rminuti * 60);
  //assegnamento dei valori al counter
  secondi.textContent = dsecondi;
  secondig.textContent = rsecondi;
  minuti.textContent = dminuti;
  minutig.textContent = rminuti;
  ore.textContent = dore;
  oreg.textContent = rore;
  giorni.textContent = dgiorni;
  giornig.textContent = rgiorni;
  if (giorni.textContent < 0) {
    secondi.textContent = 0;
    minuti.textContent = 0;
    ore.textContent = 0;
    giorni.textContent = 0;
  }
  if (giornig.textContent < 0) {
    secondig.textContent = 0;
    minutig.textContent = 0;
    oreg.textContent = 0;
    giornig.textContent = 0;
  }
}, 1000);



