<?php

namespace App\Classes;



class Time
{

    function CurrentRace(): string
    {
        date_default_timezone_set("Europe/Rome");
        $currentDate = date("Y-m-d H:i:s");
        $race = "";
        $raceList = config('myGlobalVar.raceDateQualy');
        foreach ($raceList as $raceName => $raceDate) {
            if ($raceDate > $currentDate) {
                break;
            }
            $race = $raceName;
        }
        return $race;
    }



    function check_date_quali($nome_gara): bool
    {
        $var_controllo = true;
        date_default_timezone_set("Europe/Rome");
        $current_date = date("Y-m-d H:i:s");
        $race_date = "";
        $raceList = config('myGlobalVar.raceDateQualy');
        foreach ($raceList as $raceName => $raceDateQualy) {
            if (strcasecmp($nome_gara, $raceName) == 0) {
                $race_date = $raceDateQualy;
                break;
            }
        }
        if ($current_date > $race_date) {
            $var_controllo = false;
        }

        return $var_controllo;
    }

    function check_date_race($nome_gara)
    {
        $var_controllo = true;
        date_default_timezone_set("Europe/Rome");
        $current_date = date("Y-m-d H:i:s");
        $race_date = "";
        $raceList = config('myGlobalVar.raceDateRace');
        foreach ($raceList as $raceName => $raceDateRace) {
            if (strcasecmp($nome_gara, $raceName) == 0) {
                $race_date = $raceDateRace;
                break;
            }
        }
        if ($current_date > $race_date) {
            $var_controllo = false;
        }
        return $var_controllo;
    }
}
