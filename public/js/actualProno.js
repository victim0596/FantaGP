var btnModRaceAccordion = document.querySelector('.accordion-body .opzioniLaterali:nth-child(2)');
var btnModQualyAccordion = document.querySelector('.accordion-body  .opzioniLaterali:nth-child(1)');
var btnModRaceLaterale = document.querySelector('.containerOpzioni  .opzioniLaterali:nth-child(2)');
var btnModQualyLaterale = document.querySelector('.containerOpzioni  .opzioniLaterali:nth-child(1)');

btnModRaceAccordion.addEventListener('click', loadRaceProno);
btnModRaceLaterale.addEventListener('click', loadRaceProno);
btnModQualyAccordion.addEventListener('click', loadQualyProno);
btnModQualyLaterale.addEventListener('click', loadQualyProno);

var username = document.querySelector('.navbar-nav .nav-link:nth-child(5)').innerHTML;
var actualRace = document.querySelector("form div.form-group.position-relative:nth-child(2) input ").value;

function loadRaceProno() {
    fetch(`./api/prono/${username}/${actualRace}`)
        .then(
            function (response) {
                if (response.status !== 200) {
                    console.log('Looks like there was a problem. Status Code: ' +
                        response.status);
                    return;
                }
                // Examine the text in the response
                response.json().then(function (data) {
                    setDataRacePronostici(data);
                });
            }
        )
        .catch(function (err) {
            console.log('Fetch Error :-S', err);
        });
}

function loadQualyProno() {
    fetch(`./api/prono/${username}/${actualRace}`)
        .then(
            function (response) {
                if (response.status !== 200) {
                    console.log('Looks like there was a problem. Status Code: ' +
                        response.status);
                    return;
                }
                // Examine the text in the response
                response.json().then(function (data) {
                    setDataQualyPronostici(data);
                });
            }
        )
        .catch(function (err) {
            console.log('Fetch Error :-S', err);
        });
}

function setDataRacePronostici(dataObj) {
    document.getElementsByName('gp1')[0].setAttribute('value', dataObj['GP1'])
    document.getElementsByName('gp2')[0].setAttribute('value', dataObj['GP2'])
    document.getElementsByName('gp3')[0].setAttribute('value', dataObj['GP3'])
    document.getElementsByName('giro_veloce')[0].setAttribute('value', dataObj['GIRO_VELOCE'])
    document.getElementsByName('n_ritirati')[0].setAttribute('value', dataObj['NRITIRATI'])
    document.getElementsByName('vsc')[0].setAttribute('value', dataObj['VSC'] == true ? 'Si' : 'No')
    document.getElementsByName('sc')[0].setAttribute('value', dataObj['SC'] == true ? 'Si' : 'No')
    loadNumeri();
}

function setDataQualyPronostici(dataObj) {
    document.getElementsByName('qp1')[0].setAttribute('value', dataObj['QP1'])
    document.getElementsByName('qp2')[0].setAttribute('value', dataObj['QP2'])
    document.getElementsByName('qp3')[0].setAttribute('value', dataObj['QP3'])
    loadNumeri();
}

function loadNumeri() {
    for (var i = 3; i < 7; i++) {
        var inputPiloti = document.querySelectorAll(`form div.form-group.position-relative:nth-child(${i}) input[list='list_driver']`);
        inputPiloti.forEach(element => {
            var parentNode = element.parentNode;
            var imgNumeroPiloti = parentNode.childNodes[5];
            if (element.value) imgNumeroPiloti.setAttribute("src", `./img/numeriPiloti/${element.value}.png?v=1.0`);
            else imgNumeroPiloti.setAttribute("src", "");
        })
    }

}