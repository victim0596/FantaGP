/*script dario*/
var elem_dario;
var values;
var values_pron;
var values_pag;
fetch('http://127.0.0.1:8000/pronoAllClassifica/Dario')
  .then(
    function(response) {
      if (response.status !== 200) {
        console.log('Looks like there was a problem. Status Code: ' +
          response.status);
        return;
      }
      // Examine the text in the response
      response.json().then(function(data) {
        elem_dario = data;
        values = elem_dario.map(function(e) {
          return e.punti;
        });
        values_pron = elem_dario.map(function(e) {
          return e.punti_pron;
        });
        values_pag = elem_dario.map(function(e) {
          return e.punti_pag;
        });
        addData(chart_dario, values);
      });
    }
  )
  .catch(function(err) {
    console.log('Fetch Error :-S', err);
  });




/*script gianpaolo*/
var elem_gianpaolo;
var values1;
var values_pron1;
var values_pag1;

fetch('http://127.0.0.1:8000/api/pronoAllClassifica/gianpaolo')
  .then(
    function(response) {
      if (response.status !== 200) {
        console.log('Looks like there was a problem. Status Code: ' +
          response.status);
        return;
      }
      // Examine the text in the response
      response.json().then(function(data) {
        elem_gianpaolo = data;
        values1 = elem_gianpaolo.map(function(e) {
          return e.punti;
        });
        values_pron1 = elem_gianpaolo.map(function(e) {
          return e.punti_pron;
        });
        values_pag1 = elem_gianpaolo.map(function(e) {
          return e.punti_pag;
        });
        addData(chart_gianpaolo, values1);
      });
    }
  )
  .catch(function(err) {
    console.log('Fetch Error :-S', err);
  });




/*script oliver*/
var elem_oliver;
var values2;
var values_pron2;
var values_pag2;

fetch('http://127.0.0.1:8000/api/pronoAllClassifica/Oliver')
  .then(
    function(response) {
      if (response.status !== 200) {
        console.log('Looks like there was a problem. Status Code: ' +
          response.status);
        return;
      }
      // Examine the text in the response
      response.json().then(function(data) {
        elem_oliver = data;
        values2 = elem_oliver.map(function(e) {
          return e.punti;
        });
        values_pron2 = elem_oliver.map(function(e) {
          return e.punti_pron;
        });
        values_pag2 = elem_oliver.map(function(e) {
          return e.punti_pag;
        });
        addData(chart_oliver, values2);
      });
    }
  )
  .catch(function(err) {
    console.log('Fetch Error :-S', err);
  });




/*script ciccio*/
var elem_ciccio;
var values3;
var values_pron3;
var values_pag3;

fetch('http://127.0.0.1:8000/api/pronoAllClassifica/Ciccio')
  .then(
    function(response) {
      if (response.status !== 200) {
        console.log('Looks like there was a problem. Status Code: ' +
          response.status);
        return;
      }
      // Examine the text in the response
      response.json().then(function(data) {
        elem_ciccio = data;
        values3 = elem_ciccio.map(function(e) {
          return e.punti;
        });
        values_pron3 = elem_ciccio.map(function(e) {
          return e.punti_pron;
        });
        values_pag3 = elem_ciccio.map(function(e) {
          return e.punti_pag;
        });
        addData(chart_ciccio, values3);
      });
    }
  )
  .catch(function(err) {
    console.log('Fetch Error :-S', err);
  });


/*script luca*/
var elem_luca;
var values4;
var values_pron4;
var values_pag4;

fetch('http://127.0.0.1:8000/api/pronoAllClassifica/SpiritoBlu')
  .then(
    function(response) {
      if (response.status !== 200) {
        console.log('Looks like there was a problem. Status Code: ' +
          response.status);
        return;
      }
      // Examine the text in the response
      response.json().then(function(data) {
        elem_luca = data;
        values4 = elem_luca.map(function(e) {
          return e.punti;
        });
        values_pron4 = elem_luca.map(function(e) {
          return e.punti_pron;
        });
        values_pag4 = elem_luca.map(function(e) {
          return e.punti_pag;
        });
        addData(chart_luca, values4);
      });
    }
  )
  .catch(function(err) {
    console.log('Fetch Error :-S', err);
  });

/*script Toto*/
var elem_toto;
var values5;
var values_pron5;
var values_pag5;
fetch('http://127.0.0.1:8000/api/pronoAllClassifica/Toto')
  .then(
    function(response) {
      if (response.status !== 200) {
        console.log('Looks like there was a problem. Status Code: ' +
          response.status);
        return;
      }
      // Examine the text in the response
      response.json().then(function(data) {
        elem_toto = data;
        values5 = elem_toto.map(function(e) {
          return e.punti;
        });
        values_pron5 = elem_toto.map(function(e) {
          return e.punti_pron;
        });
        values_pag5 = elem_toto.map(function(e) {
          return e.punti_pag;
        });
        addData(chart_toto, values5);
      });
    }
  )
  .catch(function(err) {
    console.log('Fetch Error :-S', err);
  });

/*script pino*/
var elem_pino;
var values6;
var values_pron6;
var values_pag6;

fetch('http://127.0.0.1:8000/api/pronoAllClassifica/pinguinosquadracorse')
  .then(
    function(response) {
      if (response.status !== 200) {
        console.log('Looks like there was a problem. Status Code: ' +
          response.status);
        return;
      }
      // Examine the text in the response
      response.json().then(function(data) {
        elem_pino = data;
        values6 = elem_pino.map(function(e) {
          return e.punti;
        });
        values_pron6 = elem_pino.map(function(e) {
          return e.punti_pron;
        });
        values_pag6 = elem_pino.map(function(e) {
          return e.punti_pag;
        });
        addData(chart_pino, values6);
      });
    }
  )
  .catch(function(err) {
    console.log('Fetch Error :-S', err);
  });

/*script andrea*/
var elem_andrea;
var values7;
var values_pron7;
var values_pag7;

fetch('http://127.0.0.1:8000/api/pronoAllClassifica/Andrea')
  .then(
    function(response) {
      if (response.status !== 200) {
        console.log('Looks like there was a problem. Status Code: ' +
          response.status);
        return;
      }
      // Examine the text in the response
      response.json().then(function(data) {
        elem_andrea = data;
        values7 = elem_andrea.map(function(e) {
          return e.punti;
        });
        values_pron7 = elem_andrea.map(function(e) {
          return e.punti_pron;
        });
        values_pag7 = elem_andrea.map(function(e) {
          return e.punti_pag;
        });
        addData(chart_andrea, values7);
      });
    }
  )
  .catch(function(err) {
    console.log('Fetch Error :-S', err);
  });

/*script alessioC*/
var elem_alessioc;
var values8;
var values_pron8;
var values_pag8;

fetch('http://127.0.0.1:8000/api/pronoAllClassifica/Ermenegildo')
  .then(
    function(response) {
      if (response.status !== 200) {
        console.log('Looks like there was a problem. Status Code: ' +
          response.status);
        return;
      }
      // Examine the text in the response
      response.json().then(function(data) {
        elem_alessioc = data;
        values8 = elem_alessioc.map(function(e) {
          return e.punti;
        });
        values_pron8 = elem_alessioc.map(function(e) {
          return e.punti_pron;
        });
        values_pag8 = elem_alessioc.map(function(e) {
          return e.punti_pag;
        });
        addData(chart_alessioc, values8);
      });
    }
  )
  .catch(function(err) {
    console.log('Fetch Error :-S', err);
  });

/*script alessioD*/
var elem_alessiod;
var values9;
var values_pron9;
var values_pag9;

fetch('http://127.0.0.1:8000/api/pronoAllClassifica/alessiodom97')
  .then(
    function(response) {
      if (response.status !== 200) {
        console.log('Looks like there was a problem. Status Code: ' +
          response.status);
        return;
      }
      // Examine the text in the response
      response.json().then(function(data) {
        elem_alessiod = data;
        values9 = elem_alessiod.map(function(e) {
          return e.punti;
        });
        values_pron9 = elem_alessiod.map(function(e) {
          return e.punti_pron;
        });
        values_pag9 = elem_alessiod.map(function(e) {
          return e.punti_pag;
        });
        addData(chart_alessiod, values9);
      });
    }
  )
  .catch(function(err) {
    console.log('Fetch Error :-S', err);
  });


function update_class_gen() {
  updateData(chart_dario, values);
  updateData(chart_gianpaolo, values1);
  updateData(chart_oliver, values2);
  updateData(chart_ciccio, values3);
  updateData(chart_luca, values4);
  updateData(chart_toto, values5);
  updateData(chart_pino, values6);
  updateData(chart_andrea, values7);
  updateData(chart_alessioc, values8);
  updateData(chart_alessiod, values9);
}

function update_class_pron() {
  updateData(chart_dario, values_pron);
  updateData(chart_gianpaolo, values_pron1);
  updateData(chart_oliver, values_pron2);
  updateData(chart_ciccio, values_pron3);
  updateData(chart_luca, values_pron4);
  updateData(chart_toto, values_pron5);
  updateData(chart_pino, values_pron6);
  updateData(chart_andrea, values_pron7);
  updateData(chart_alessioc, values_pron8);
  updateData(chart_alessiod, values_pron9);
}

function update_class_pag() {
  updateData(chart_dario, values_pag);
  updateData(chart_gianpaolo, values_pag1);
  updateData(chart_oliver, values_pag2);
  updateData(chart_ciccio, values_pag3);
  updateData(chart_luca, values_pag4);
  updateData(chart_toto, values_pag5);
  updateData(chart_pino, values_pag6);
  updateData(chart_andrea, values_pag7);
  updateData(chart_alessioc, values_pag8);
  updateData(chart_alessiod, values_pag9);
}

document.getElementById("class_pron").addEventListener("click", update_class_pron);
document.getElementById("class_pag").addEventListener("click", update_class_pag);
document.getElementById("class_gen").addEventListener("click", update_class_gen);