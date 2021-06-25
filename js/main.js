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



 setInterval(function(){
      date_future = new Date(new Date().getFullYear(),4,8); //date da modificare ad ogni gara, NB: i mesi vanno messi attuale-1, é la data per le qualifiche
      date_now = new Date();
      date_future_race= new Date(new Date().getFullYear(),4,9,12); //date da modificare ad ogni gara, NB: i mesi vanno messi attuale-1, é la data per le gare formato(day/month/hour)
      //calcolo tempo per le qualifiche
      dsecondi = Math.floor((date_future - (date_now))/1000);
      dminuti = Math.floor(dsecondi/60);
      dore = Math.floor(dminuti/60);
      dgiorni = Math.floor(dore/24);    
      dore = dore-(dgiorni*24);
      dminuti = dminuti-(dgiorni*24*60)-(dore*60);
      dsecondi = dsecondi-(dgiorni*24*60*60)-(dore*60*60)-(dminuti*60);
      //calcolo tempo per la gara
      rsecondi = Math.floor((date_future_race - (date_now))/1000);
      rminuti = Math.floor(rsecondi/60);
      rore = Math.floor(rminuti/60);
      rgiorni = Math.floor(rore/24);    
      rore = rore-(rgiorni*24);
      rminuti = rminuti-(rgiorni*24*60)-(rore*60);
      rsecondi = rsecondi-(rgiorni*24*60*60)-(rore*60*60)-(rminuti*60);
      //assegnamento dei valori al counter
      secondi.textContent = dsecondi;
      secondig.textContent= rsecondi;
      minuti.textContent = dminuti;
      minutig.textContent=rminuti;
      ore.textContent = dore;
      oreg.textContent=rore;
      giorni.textContent = dgiorni;
      giornig.textContent=rgiorni;
      if(giorni.textContent<0){
        secondi.textContent = 0;
        minuti.textContent = 0;
        ore.textContent = 0;
        giorni.textContent = 0;
      }
      if(giornig.textContent<0){
        secondig.textContent = 0;
        minutig.textContent = 0;
        oreg.textContent = 0;
        giornig.textContent = 0;
      }   
  },1000);

  

