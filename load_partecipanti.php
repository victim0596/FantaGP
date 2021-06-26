<?php
$text = "";
if (isset($_POST['submit_part'])) {
    $nomeutente = $_POST['utente'];
    if (!empty($nomeutente)) {
        switch ($nomeutente) {
            case 'Oliver':
                $pilota1 = "Gasly";
                $pilota2 = "Giovinazzi";
                $scuderia = "Redbull";
                break;
            case 'Ciccio':
                $pilota1 = "Raikkonen";
                $pilota2 = "Alonso";
                $scuderia = "Mercedes";
                break;
            case 'SpiritoBlu':
                $pilota1 = "Sainz";
                $pilota2 = "Vettel";
                $scuderia = "Ferrari";
                break;
            case 'Dario':
                $pilota1 = "Tsunoda";
                $pilota2 = "Ocon";
                $scuderia = "Mclaren";
                break;
            case 'gianpaolo':
                $pilota1 = "Leclerc";
                $pilota2 = "Bottas";
                $scuderia = "Alpine";
                break;
            case 'Andrea':
                $pilota1 = "Russell";
                $pilota2 = "Schumacher";
                $scuderia = "Aston";
                break;
            case 'Ermenegildo':
                $pilota1 = "Ricciardo";
                $pilota2 = "Latifi";
                $scuderia = "Alpha";
                break;
            case 'Toto':
                $pilota1 = "Verstappen";
                $pilota2 = "Stroll";
                $scuderia = "Haas";
                break;
            case 'alessiodom97':
                $pilota1 = "Norris";
                $pilota2 = "Perez";
                $scuderia = "Alfa";
                break;
            case 'pinguinoSquadracorse':

                $pilota1 = "Hamilton";
                $pilota2 = "Mazepin";
                $scuderia = "Williams";
                break;
        }

        ?>
        <img src="img/piloti/<?php echo $pilota1; ?>.png" class="position-absolute pilotino_1">
        <img src="img/piloti/<?php echo $pilota2; ?>.png" class="position-absolute pilotino_2">
        <img src="img/scuderie/<?php echo $scuderia; ?>.png?n=1" class="position-absolute scuderia">

<?php } else {
        $text = "Devi inserire un nome utente";
    }

}?>
 		<div class="text position-absolute"><?php echo $text; ?></div>