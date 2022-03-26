var ctx = document.getElementById('chart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [
            "Bahrein", "Arabia Saudita", "Australia", "Italia-Imola", "USA-Miami", "Spagna",
            "Monaco", "Azerbaijan", "Canada", "Gran Bretagna", "Austria",
            "Francia", "Ungheria", "Belgio", "Olanda", "Italia-Monza", "Singapore", "Giappone", "USA-Cota",
            "Messico", "Brasile", "Emirati Arabi"
        ],
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});


function addData(chart, data) {
    chart.data.datasets.push({
        label: "Punti",
        backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'],
        borderColor: ['rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'],
        borderWidth: 1,
        data: data
    });
    chart.update();
}

function updateData(chart, data) {
    chart.data.datasets[0].data = data;
    chart.update();
}

var btnChart = document.querySelectorAll('tr td button');

btnChart.forEach(x => {
    x.addEventListener('click', () => {
        var trElement = x.parentElement.parentElement;
        var nameChild = trElement.childNodes[3].innerText.substring(1);
        //imposto il titolo del grafico
        document.getElementById('modalchartTitle').innerHTML = `Andamento punti per gara ${nameChild}`;
        fetch(`./api/pronoAllClassifica/${nameChild}`)
            .then(
                function (response) {
                    if (response.status !== 200) {
                        console.log('Looks like there was a problem. Status Code: ' +
                            response.status);
                        return;
                    }
                    // Examine the text in the response
                    response.json().then(function (data) {
                        setDataChart(data);
                    });
                }
            )
            .catch(function (err) {
                console.log('Fetch Error :-S', err);
            });
    })
})

function setDataChart(chartObjData) {
    var tipoClassifica = document.getElementById('modalTitoloClassifica').innerText.substring(11);
    switch (tipoClassifica) {
        case 'Generale':
            var values = chartObjData.map(function (e) {
                return e.punti;
            });
            if (chart.data.datasets[0]) {
                updateData(chart, values)
            } else {
                addData(chart, values)
            }
            break;
        case 'Pagelle':
            var values = chartObjData.map(function (e) {
                return e.punti_pag;
            });
            if (chart.data.datasets[0]) {
                updateData(chart, values)
            } else {
                addData(chart, values)
            }
            break;
        case 'Pronostici':
            var values = chartObjData.map(function (e) {
                return e.punti_pron;
            });
            if (chart.data.datasets[0]) {
                updateData(chart, values)
            } else {
                addData(chart, values)
            }
            break;
    }
}















