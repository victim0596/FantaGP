var btnClassificaGenerale = document.querySelector('.container_btn button:nth-child(1)');
var btnClassificaPronostici = document.querySelector('.container_btn button:nth-child(3)');
var btnClassificaPagelle = document.querySelector('.container_btn button:nth-child(2)');
var titoloClassifica = document.getElementById('modalTitoloClassifica');

/*
    CHIAMATE API
*/
btnClassificaGenerale.addEventListener('click', () => {
    titoloClassifica.innerHTML = 'Classifica Generale';

    fetch('./api/classifica/Generale')
        .then(
            function (response) {
                if (response.status !== 200) {
                    console.log('Looks like there was a problem. Status Code: ' +
                        response.status);
                    return;
                }
                // Examine the text in the response
                response.json().then(function (data) {
                    setDataClassifica(data);
                });
            }
        )
        .catch(function (err) {
            console.log('Fetch Error :-S', err);
        });
})

btnClassificaPagelle.addEventListener('click', () => {
    titoloClassifica.innerHTML = 'Classifica Pagelle';

    fetch('./api/classifica/Pagelle')
        .then(
            function (response) {
                if (response.status !== 200) {
                    console.log('Looks like there was a problem. Status Code: ' +
                        response.status);
                    return;
                }
                // Examine the text in the response
                response.json().then(function (data) {
                    setDataClassifica(data);
                });
            }
        )
        .catch(function (err) {
            console.log('Fetch Error :-S', err);
        });

})

btnClassificaPronostici.addEventListener('click', () => {
    titoloClassifica.innerHTML = 'Classifica Pronostici';

    fetch('./api/classifica/Pronostici')
        .then(
            function (response) {
                if (response.status !== 200) {
                    console.log('Looks like there was a problem. Status Code: ' +
                        response.status);
                    return;
                }
                // Examine the text in the response
                response.json().then(function (data) {
                    setDataClassifica(data);
                });
            }
        )
        .catch(function (err) {
            console.log('Fetch Error :-S', err);
        });

})

/*
    Set dati in classifica
*/
function setDataClassifica(classificaObj) {
    var i = 0;
    for (const [username, punti] of Object.entries(classificaObj)) {
        var nomeInClassifica = document.querySelectorAll('tbody tr .nameDriver')[i];
        var puntiInClassifica = document.querySelectorAll('tbody tr .ptDriver')[i];
        //imposto il nome
        nomeInClassifica.innerHTML = '<span>I</span>' + username;
        //imposto i punti
        puntiInClassifica.innerHTML = punti;
        i++;
    }
    setClassificaEstetica();
}