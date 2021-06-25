<?php

include 'connection.php';

//creo degli array per memorizzare i punti delle gare
$pt_race_dario=array();
$pt_race_gianpaolo=array();
$pt_race_oliver=array();
$pt_race_alessioc=array();
$pt_race_alessiod=array();
$pt_race_pino=array();
$pt_race_andrea=array();
$pt_race_toto=array();
$pt_race_luca=array();
$pt_race_ciccio=array();



//query per i punti di dario
$sql_chart="SELECT punti,punti_pag,punti_pron FROM pronostici WHERE id_p='Dario'";
$result_chart=$conn->query($sql_chart);
$index = 0;
while($row = $result_chart->fetch_assoc()){ // loop to store the data in an associative array.
  $pt_race_dario[$index] = $row;
	$index++;
}
//query per i punti di gianpaolo
$sql_chart="SELECT punti,punti_pag,punti_pron FROM pronostici WHERE id_p='gianpaolo'";
$result_chart=$conn->query($sql_chart);
$index = 0;
while($row = $result_chart->fetch_assoc()){ // loop to store the data in an associative array.
	$pt_race_gianpaolo[$index] = $row;
	$index++;
}

//query per i punti di Oliver
$sql_chart="SELECT punti,punti_pag,punti_pron FROM pronostici WHERE id_p='Oliver'";
$result_chart=$conn->query($sql_chart);
$index = 0;
while($row = $result_chart->fetch_assoc()){ // loop to store the data in an associative array.
	$pt_race_oliver[$index] = $row;
	$index++;
}

//query per i punti di Ermenegildo
$sql_chart="SELECT punti,punti_pag,punti_pron FROM pronostici WHERE id_p='Ermenegildo'";
$result_chart=$conn->query($sql_chart);
$index = 0;
while($row = $result_chart->fetch_assoc()){ // loop to store the data in an associative array.
	$pt_race_alessioc[$index] = $row;
	$index++;
}

//query per i punti di alessiodom97
$sql_chart="SELECT punti,punti_pag,punti_pron FROM pronostici WHERE id_p='alessiodom97'";
$result_chart=$conn->query($sql_chart);
$index = 0;
while($row = $result_chart->fetch_assoc()){ // loop to store the data in an associative array.
	$pt_race_alessiod[$index] = $row;
	$index++;
}

//query per i punti di SpiritoBlu
$sql_chart="SELECT punti,punti_pag,punti_pron FROM pronostici WHERE id_p='SpiritoBlu'";
$result_chart=$conn->query($sql_chart);
$index = 0;
while($row = $result_chart->fetch_assoc()){ // loop to store the data in an associative array.
	$pt_race_luca[$index] = $row;
	$index++;
}

//query per i punti di pinguinoSquadracorse
$sql_chart="SELECT punti,punti_pag,punti_pron FROM pronostici WHERE id_p='pinguinoSquadracorse'";
$result_chart=$conn->query($sql_chart);
$index = 0;
while($row = $result_chart->fetch_assoc()){ // loop to store the data in an associative array.
	$pt_race_pino[$index] = $row;
	$index++;
}

//query per i punti di Andrea
$sql_chart="SELECT punti,punti_pag,punti_pron FROM pronostici WHERE id_p='Andrea'";
$result_chart=$conn->query($sql_chart);
$index = 0;
while($row = $result_chart->fetch_assoc()){ // loop to store the data in an associative array.
	$pt_race_andrea[$index] = $row;
	$index++;
}


//query per i punti di Toto
$sql_chart="SELECT punti,punti_pag,punti_pron FROM pronostici WHERE id_p='Toto'";
$result_chart=$conn->query($sql_chart);
$index = 0;
while($row = $result_chart->fetch_assoc()){ // loop to store the data in an associative array.
	$pt_race_toto[$index] = $row;
	$index++;
}

//query per i punti di Ciccio
$sql_chart="SELECT punti,punti_pag,punti_pron FROM pronostici WHERE id_p='Ciccio'";
$result_chart=$conn->query($sql_chart);
$index = 0;
while($row = $result_chart->fetch_assoc()){ // loop to store the data in an associative array.
	$pt_race_ciccio[$index] = $row;
	$index++;
}

$conn->close();



?>

<script>
  /*script dario*/
	var elem_dario= <?php echo json_encode($pt_race_dario); ?>;
  var values = elem_dario.map(function (e) {
    return e.punti;
  });
  var values_pron = elem_dario.map(function (e) {
    return e.punti_pron;
  });
  var values_pag = elem_dario.map(function (e) {
    return e.punti_pag;
  });
	addData(chart_dario, values);

   /*script gianpaolo*/
	var elem_gianpaolo= <?php echo json_encode($pt_race_gianpaolo); ?>;
  var values1 = elem_gianpaolo.map(function (e) {
    return e.punti;
  });
  var values_pron1 = elem_gianpaolo.map(function (e) {
    return e.punti_pron;
  });
  var values_pag1 = elem_gianpaolo.map(function (e) {
    return e.punti_pag;
  });
	addData(chart_gianpaolo, values1);
  /*script oliver*/
	var elem_oliver= <?php echo json_encode($pt_race_oliver); ?>;
  var values2 = elem_oliver.map(function (e) {
    return e.punti;
  });
  var values_pron2 = elem_oliver.map(function (e) {
    return e.punti_pron;
  });
  var values_pag2 = elem_oliver.map(function (e) {
    return e.punti_pag;
  });
	addData(chart_oliver, values2);
  /*script ciccio*/
	var elem_ciccio= <?php echo json_encode($pt_race_ciccio); ?>;
  var values3 = elem_ciccio.map(function (e) {
    return e.punti;
  });
  var values_pron3 = elem_ciccio.map(function (e) {
    return e.punti_pron;
  });
  var values_pag3 = elem_ciccio.map(function (e) {
    return e.punti_pag;
  });
	addData(chart_ciccio, values3);
  /*script luca*/
	var elem_luca= <?php echo json_encode($pt_race_luca); ?>;
  var values4 = elem_luca.map(function (e) {
    return e.punti;
  });
  var values_pron4 = elem_luca.map(function (e) {
    return e.punti_pron;
  });
  var values_pag4 = elem_luca.map(function (e) {
    return e.punti_pag;
  });
	addData(chart_luca, values4);
  /*script Toto*/
	var elem_toto= <?php echo json_encode($pt_race_toto); ?>;
  var values5 = elem_toto.map(function (e) {
    return e.punti;
  });
  var values_pron5 = elem_toto.map(function (e) {
    return e.punti_pron;
  });
  var values_pag5 = elem_toto.map(function (e) {
    return e.punti_pag;
  });
	addData(chart_toto, values5);
  /*script pino*/
	var elem_pino= <?php echo json_encode($pt_race_pino); ?>;
  var values6 = elem_pino.map(function (e) {
    return e.punti;
  });
  var values_pron6 = elem_pino.map(function (e) {
    return e.punti_pron;
  });
  var values_pag6 = elem_pino.map(function (e) {
    return e.punti_pag;
  });
	addData(chart_pino, values6);
  /*script andrea*/
	var elem_andrea= <?php echo json_encode($pt_race_andrea); ?>;
  var values7 = elem_andrea.map(function (e) {
    return e.punti;
  });
  var values_pron7 = elem_andrea.map(function (e) {
    return e.punti_pron;
  });
  var values_pag7 = elem_andrea.map(function (e) {
    return e.punti_pag;
  });
	addData(chart_andrea, values7);
   /*script alessioC*/
	var elem_alessioc= <?php echo json_encode($pt_race_alessioc); ?>;
  var values8 = elem_alessioc.map(function (e) {
    return e.punti;
  });
  var values_pron8 = elem_alessioc.map(function (e) {
    return e.punti_pron;
  });
  var values_pag8 = elem_alessioc.map(function (e) {
    return e.punti_pag;
  });
	addData(chart_alessioc, values8);
  /*script alessioD*/
	var elem_alessiod= <?php echo json_encode($pt_race_alessiod); ?>;
  var values9 = elem_alessiod.map(function (e) {
    return e.punti;
  });
  var values_pron9 = elem_alessiod.map(function (e) {
    return e.punti_pron;
  });
  var values_pag9 = elem_alessiod.map(function (e) {
    return e.punti_pag;
  });
	addData(chart_alessiod, values9);
  	
  function update_class_gen(){
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

  function update_class_pron(){
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

  function update_class_pag(){
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
</script>



