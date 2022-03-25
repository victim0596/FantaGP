

function loadPagelle(nomeGara, tipoCheck) {

    fetch(`./api/checkPagelle/${nomeGara}`)
        .then(
            function (response) {
                if (response.status !== 200) {
                    console.log('Looks like there was a problem. Status Code: ' +
                        response.status);
                    return;
                }
                // Examine the text in the response
                response.json().then(function (data) {
                    modifyInnerText(tipoCheck, data);
                });
            }
        )
        .catch(function (err) {
            console.log('Fetch Error :-S', err);
        });
}

function loadRitirati(nomeGara, tipoCheck) {

    fetch(`./api/checkRitirati/${nomeGara}`)
        .then(
            function (response) {
                if (response.status !== 200) {
                    console.log('Looks like there was a problem. Status Code: ' +
                        response.status);
                    return;
                }
                // Examine the text in the response
                response.json().then(function (data) {
                    modifyInnerText(tipoCheck, data);
                });
            }
        )
        .catch(function (err) {
            console.log('Fetch Error :-S', err);
        });
}

function loadPronostici(nomeGara, tipoCheck) {

    fetch(`./api/checkPronostici/${nomeGara}`)
        .then(
            function (response) {
                if (response.status !== 200) {
                    console.log('Looks like there was a problem. Status Code: ' +
                        response.status);
                    return;
                }
                // Examine the text in the response
                response.json().then(function (data) {
                    modifyInnerText(tipoCheck, data);
                });
            }
        )
        .catch(function (err) {
            console.log('Fetch Error :-S', err);
        });
}

function loadRisultati(nomeGara, tipoCheck) {

    fetch(`./api/checkRisultati/${nomeGara}`)
        .then(
            function (response) {
                if (response.status !== 200) {
                    console.log('Looks like there was a problem. Status Code: ' +
                        response.status);
                    return;
                }
                // Examine the text in the response
                response.json().then(function (data) {
                    modifyInnerText(tipoCheck, data);
                });
            }
        )
        .catch(function (err) {
            console.log('Fetch Error :-S', err);
        });
}

function modifyInnerText(tipoCheck, data) {
    var htmlElement = document.getElementById('tableResult');
    var rowGenerated = "";
    switch (tipoCheck) {
        case 'Ritirati': {
            for (var i = 0; i < data.length; i++) {
                rowGenerated = rowGenerated + `<tr>
                <td>${data[i].NOME}</td>
                <td>${data[i].DENOMINAZIONE}</td>
                <td>${data[i].TIPO}</td>
              </tr>`;
            }
            htmlElement.innerHTML = `<table class="table table-dark table-striped">
            <thead>
              <tr>
                <th scope="col">Pilota</th>
                <th scope="col">Nome Gara</th>
                <th scope="col">Sessione Ritiro</th>
              </tr>
            </thead>
            <tbody>${rowGenerated}
            </tbody>
            </table>`;
            break;
        }
        case 'Risultato': {
            for (var i = 0; i < data.length; i++) {
                rowGenerated = rowGenerated + `<tr>
                <td>${data[i].DENOMINAZIONE}</td>
                <td>${data[i].QP1}</td>
                <td>${data[i].QP2}</td>
                <td>${data[i].QP3}</td>
                <td>${data[i].GP1}</td>
                <td>${data[i].GP2}</td>
                <td>${data[i].GP3}</td>
                <td>${data[i].GIRO_VELOCE}</td>
                <td>${data[i].NRITIRATI}</td>
                <td>${data[i].VSC}</td>
                <td>${data[i].SC}</td>
               </tr>`;
            }
            htmlElement.innerHTML = `<table class="table table-dark table-striped">
            <thead>
              <tr>
              <th scope="col">Nome Gara</th>
              <th scope="col">QP1</th>
              <th scope="col">QP2</th>
              <th scope="col">QP3</th>
              <th scope="col">GP1</th>
              <th scope="col">GP2</th>
              <th scope="col">GP3</th>
              <th scope="col">Giro veloce</th>
              <th scope="col">Ritirati</th>
              <th scope="col">VSC</th>
              <th scope="col">SC</th>
              </tr>
            </thead>
            <tbody>${rowGenerated}
            </tbody>
            </table>`;
            break;
        }
        case 'Pronostici': {
            for (var i = 0; i < data.length; i++) {
                rowGenerated = rowGenerated + `<tr>
                <td>${data[i].USERNAME}</td>
                <td>${data[i].DENOMINAZIONE}</td>
                <td>${data[i].QP1}</td>
                <td>${data[i].QP2}</td>
                <td>${data[i].QP3}</td>
                <td>${data[i].GP1}</td>
                <td>${data[i].GP2}</td>
                <td>${data[i].GP3}</td>
                <td>${data[i].GIRO_VELOCE}</td>
                <td>${data[i].NRITIRATI}</td>
                <td>${data[i].VSC}</td>
                <td>${data[i].SC}</td>
                <td>${data[i].dataGara}</td>
                <td>${data[i].dataQualifica}</td>
              </tr>`;
            }
            htmlElement.innerHTML = `<table class="table table-dark table-striped">
            <thead>
              <tr>
                <th scope="col">Pilota</th>
                <th scope="col">Nome Gara</th>
                <th scope="col">QP1</th>
                <th scope="col">QP2</th>
                <th scope="col">QP3</th>
                <th scope="col">GP1</th>
                <th scope="col">GP2</th>
                <th scope="col">GP3</th>
                <th scope="col">Giro veloce</th>
                <th scope="col">Ritirati</th>
                <th scope="col">VSC</th>
                <th scope="col">SC</th>
                <th scope="col">Timestamp Gara</th>
                <th scope="col">Timestamp Qualifica</th>
              </tr>
            </thead>
            <tbody>${rowGenerated}
            </tbody>
            </table>`;
            break;
        }
        case 'Pagelle': {
            for (var i = 0; i < data.length; i++) {
                rowGenerated = rowGenerated + `<tr>
                <td>${data[i].NOME}</td>
                <td>${data[i].DENOMINAZIONE}</td>
                <td>${data[i].SITO1}</td>
                <td>${data[i].SITO2}</td>
                <td>${data[i].SITO3}</td>
              </tr>`;
            }
            htmlElement.innerHTML = `<table class="table table-dark table-striped">
            <thead>
              <tr>
                <th scope="col">Pilota</th>
                <th scope="col">Nome Gara</th>
                <th scope="col">Sito 1</th>
                <th scope="col">Sito 2</th>
                <th scope="col">Sito 3</th>
              </tr>
            </thead>
            <tbody>${rowGenerated}
            </tbody>
            </table>`;
            break;
        }
    }
}

function loadData() {
    var nomeGara = document.getElementById('nomeGara').value;
    var tipoCheck = document.getElementById('tipoCheck').value;
    switch (tipoCheck) {
        case 'Ritirati': {
            loadRitirati(nomeGara, tipoCheck);
            break;
        }
        case 'Risultato': {
            loadRisultati(nomeGara, tipoCheck);
            break;
        }
        case 'Pronostici': {
            loadPronostici(nomeGara, tipoCheck);
            break;
        }
        case 'Pagelle': {
            loadPagelle(nomeGara, tipoCheck);
            break;
        }
    }
}

var btnCloseControllo = document.getElementById('btnCloseControllo');

//when click on the close button of the controlla dati, i clean his content
btnCloseControllo.addEventListener('click', ()=>{
    document.getElementById('tableResult').innerHTML = "";
})




