

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
                <td>${data[i].nome_pilota}</td>
                <td>${data[i].nome_gara}</td>
                <td>${data[i].tipo}</td>
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
                <td>${data[i].nome_gara}</td>
                <td>${data[i].qp1}</td>
                <td>${data[i].qp2}</td>
                <td>${data[i].qp3}</td>
                <td>${data[i].gp1}</td>
                <td>${data[i].gp2}</td>
                <td>${data[i].gp3}</td>
                <td>${data[i].giro_veloce}</td>
                <td>${data[i].n_ritirati}</td>
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
                <td>${data[i].id_p}</td>
                <td>${data[i].nome_gara}</td>
                <td>${data[i].qp1}</td>
                <td>${data[i].qp2}</td>
                <td>${data[i].qp3}</td>
                <td>${data[i].gp1}</td>
                <td>${data[i].gp2}</td>
                <td>${data[i].gp3}</td>
                <td>${data[i].giro_veloce}</td>
                <td>${data[i].n_ritirati}</td>
                <td>${data[i].VSC}</td>
                <td>${data[i].SC}</td>
                <td>${data[i].data}</td>
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
                <th scope="col">Data</th>
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
                <td>${data[i].pilota}</td>
                <td>${data[i].nome_gara}</td>
                <td>${data[i].sito1}</td>
                <td>${data[i].sito2}</td>
                <td>${data[i].sito3}</td>
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




