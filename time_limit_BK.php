<?php

	function check_date_quali($nome_gara){
		$var_controllo=1;
		date_default_timezone_set("Europe/Rome");
		$giorno=date("d");
		$mese=date("m");
		$giorno_limite_gara=0;
		$mese_limite_gara=0;

		if(strcasecmp($nome_gara,"Bahrein")==0){
			$giorno_limite_qualifica=26;
			$mese_limite_gara=3;
		}
		if(strcasecmp($nome_gara,"Italia-Imola")==0){
			$giorno_limite_qualifica=16;
			$mese_limite_gara=4;
		}
		if(strcasecmp($nome_gara,"Portogallo")==0){
			$giorno_limite_qualifica=30;
			$mese_limite_gara=4;
		}
		if(strcasecmp($nome_gara,"Spagna")==0){
			$giorno_limite_qualifica=7;
			$mese_limite_gara=5;
		}
		if(strcasecmp($nome_gara,"Monaco")==0){
			$giorno_limite_qualifica=20;
			$mese_limite_gara=5;
		}
		if(strcasecmp($nome_gara,"Azerbaigian")==0){
			$giorno_limite_qualifica=4;
			$mese_limite_gara=6;
		}
		if(strcasecmp($nome_gara,"Canada")==0){
			$giorno_limite_qualifica=11;
			$mese_limite_gara=6;
		}
		if(strcasecmp($nome_gara,"Francia")==0){
			$giorno_limite_qualifica=25;
			$mese_limite_gara=6;
		}
		if(strcasecmp($nome_gara,"Austria")==0){
			$giorno_limite_qualifica=2;
			$mese_limite_gara=7;
		}
		if(strcasecmp($nome_gara,"Gran Bretagna")==0){
			$giorno_limite_qualifica=16;
			$mese_limite_gara=7;
		}
		if(strcasecmp($nome_gara,"Ungheria")==0){
			$giorno_limite_qualifica=30;
			$mese_limite_gara=7;
		}
		if(strcasecmp($nome_gara,"Belgio")==0){
			$giorno_limite_qualifica=27;
			$mese_limite_gara=8;
		}
		if(strcasecmp($nome_gara,"Olanda")==0){
			$giorno_limite_qualifica=3;
			$mese_limite_gara=9;
		}
		if(strcasecmp($nome_gara,"Italia-Monza")==0){
			$giorno_limite_qualifica=10;
			$mese_limite_gara=9;
		}
		if(strcasecmp($nome_gara,"Russia")==0){
			$giorno_limite_qualifica=24;
			$mese_limite_gara=9;
		}
		if(strcasecmp($nome_gara,"Singapore")==0){
			$giorno_limite_qualifica=1;
			$mese_limite_gara=10;
		}
		if(strcasecmp($nome_gara,"Giappone")==0){
			$giorno_limite_qualifica=8;
			$mese_limite_gara=10;
		}
		if(strcasecmp($nome_gara,"USA")==0){
			$giorno_limite_qualifica=22;
			$mese_limite_gara=10;
		}
		if(strcasecmp($nome_gara,"Messico")==0){
			$giorno_limite_qualifica=29;
			$mese_limite_gara=10;
		}
		if(strcasecmp($nome_gara,"Brasile")==0){
			$giorno_limite_qualifica=5;
			$mese_limite_gara=11;
		}
		if(strcasecmp($nome_gara,"Australia")==0){
			$giorno_limite_qualifica=19;
			$mese_limite_gara=11;
		}
		if(strcasecmp($nome_gara,"Arabia Saudita")==0){
			$giorno_limite_qualifica=3;
			$mese_limite_gara=12;
		}
		if(strcasecmp($nome_gara,"Emirati Arabi")==0){
			$giorno_limite_qualifica=10;
			$mese_limite_gara=12;
		}
		if($giorno>$giorno_limite_qualifica && $mese==$mese_limite_gara) $var_controllo=0;
		if($mese>$mese_limite_gara) $var_controllo=0;
		return $var_controllo;
	}

	function check_date_race($nome_gara){
		$var_controllo=1;
		date_default_timezone_set("Europe/Rome");
		$giorno=date("d");
		$mese=date("m");
		$ora=date("H");
		$giorno_limite_gara=0;
		$mese_limite_gara=0;
		$ore_limite_gara=0;

		if(strcasecmp($nome_gara,"Bahrein")==0){
			$giorno_limite_gara=28;
			$mese_limite_gara=3;
			$ore_limite_gara=14;
		}
		if(strcasecmp($nome_gara,"Italia-Imola")==0){
			$giorno_limite_gara=18; 
			$mese_limite_gara=4;   
			$ore_limite_gara=11;   
		}
		if(strcasecmp($nome_gara,"Portogallo")==0){
			$giorno_limite_gara=2;
			$mese_limite_gara=5;
			$ore_limite_gara=13;
		}
		
		if(strcasecmp($nome_gara,"Spagna")==0){
			$giorno_limite_gara=9;
			$mese_limite_gara=5;
			$ore_limite_gara=12;
		}
		if(strcasecmp($nome_gara,"Monaco")==0){
			$giorno_limite_gara=22;
			$mese_limite_gara=5;
			$ore_limite_gara=12;
		}
		if(strcasecmp($nome_gara,"Azerbaigian")==0){
			$giorno_limite_gara=6;
			$mese_limite_gara=6;
			$ore_limite_gara=11;
		}
		if(strcasecmp($nome_gara,"Canada")==0){
			$giorno_limite_gara=13;
			$mese_limite_gara=6;
			$ore_limite_gara=17;
		}
		if(strcasecmp($nome_gara,"Francia")==0){
			$giorno_limite_gara=27;
			$mese_limite_gara=6;
			$ore_limite_gara=12;
		}
		if(strcasecmp($nome_gara,"Austria")==0){
			$giorno_limite_gara=4;
			$mese_limite_gara=7;
			$ore_limite_gara=12;
		}
		if(strcasecmp($nome_gara,"Gran Bretagna")==0){
			$giorno_limite_gara=18;
			$mese_limite_gara=7;
			$ore_limite_gara=13;
		}
		if(strcasecmp($nome_gara,"Ungheria")==0){
			$giorno_limite_gara=1;
			$mese_limite_gara=8;
			$ore_limite_gara=12;
		}
		if(strcasecmp($nome_gara,"Belgio")==0){
			$giorno_limite_gara=29;
			$mese_limite_gara=8;
			$ore_limite_gara=12;
		}
		if(strcasecmp($nome_gara,"Olanda")==0){
			$giorno_limite_gara=5;
			$mese_limite_gara=9;
			$ore_limite_gara=12;
		}
		if(strcasecmp($nome_gara,"Italia-Monza")==0){
			$giorno_limite_gara=12;
			$mese_limite_gara=9;
			$ore_limite_gara=12;
		}
		if(strcasecmp($nome_gara,"Russia")==0){
			$giorno_limite_gara=26;
			$mese_limite_gara=9;
			$ore_limite_gara=11;
		}
		if(strcasecmp($nome_gara,"Singapore")==0){
			$giorno_limite_gara=3;
			$mese_limite_gara=10;
			$ore_limite_gara=11;
		}
		if(strcasecmp($nome_gara,"Giappone")==0){
			$giorno_limite_gara=10;
			$mese_limite_gara=10;
			$ore_limite_gara=4;
		}
		if(strcasecmp($nome_gara,"USA")==0){
			$giorno_limite_gara=24;
			$mese_limite_gara=10;
			$ore_limite_gara=18;
		}
		if(strcasecmp($nome_gara,"Messico")==0){
			$giorno_limite_gara=31;
			$mese_limite_gara=10;
			$ore_limite_gara=17;
		}
		if(strcasecmp($nome_gara,"Brasile")==0){
			$giorno_limite_gara=7;
			$mese_limite_gara=11;
			$ore_limite_gara=15;
		}
		if(strcasecmp($nome_gara,"Australia")==0){
			$giorno_limite_gara=21;
			$mese_limite_gara=11;
			$ore_limite_gara=4;
		}
		if(strcasecmp($nome_gara,"Arabia Saudita")==0){
			$giorno_limite_gara=5;
			$mese_limite_gara=12;
			$ore_limite_gara=14;
		}
		if(strcasecmp($nome_gara,"Emirati Arabi")==0){
			$giorno_limite_gara=12;
			$mese_limite_gara=12;
			$ore_limite_gara=11;
		}

		if($giorno>$giorno_limite_gara && $mese==$mese_limite_gara) $var_controllo=0;
		if($giorno==$giorno_limite_gara && $ora>=$ore_limite_gara) $var_controllo=0;
		if($mese>$mese_limite_gara) $var_controllo=0;
		return $var_controllo;
	}



?>