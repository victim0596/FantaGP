<?php

function check_date_quali($nome_gara): bool
{
    $var_controllo = true;
    date_default_timezone_set("Europe/Rome");
    $current_date = date("Y-m-d H:i:s");
    $race_date = "";
    if (strcasecmp($nome_gara, "Bahrein") == 0) {
        $race_date = '2021-03-27 00:00:00';
    }
    if (strcasecmp($nome_gara, "Italia-Imola") == 0) {
        $race_date = '2021-04-17 00:00:00';
    }
    if (strcasecmp($nome_gara, "Portogallo") == 0) {
        $race_date = '2021-05-01 00:00:00';
    }
    if (strcasecmp($nome_gara, "Spagna") == 0) {
        $race_date = '2021-05-08 00:00:00';
    }
    if (strcasecmp($nome_gara, "Monaco") == 0) {
        $race_date = '2021-05-22 00:00:00';
    }
    if (strcasecmp($nome_gara, "Azerbaigian") == 0) {
        $race_date = '2021-06-05 00:00:00';
    }
    if (strcasecmp($nome_gara, "Francia") == 0) {
        $race_date = '2021-06-19 00:00:00';
    }
    if (strcasecmp($nome_gara, "Austria") == 0) {
        $race_date = '2021-06-26 00:00:00';
    }
    if (strcasecmp($nome_gara, "Austria-2") == 0) {
        $race_date = '2021-07-03 00:00:00';
    }
    if (strcasecmp($nome_gara, "Gran Bretagna") == 0) {
        $race_date = '2021-07-17 00:00:00';
    }
    if (strcasecmp($nome_gara, "Ungheria") == 0) {
        $race_date = '2021-07-31 00:00:00';
    }
    if (strcasecmp($nome_gara, "Belgio") == 0) {
        $race_date = '2021-08-28 00:00:00';
    }
    if (strcasecmp($nome_gara, "Olanda") == 0) {
        $race_date = '2021-09-04 00:00:00';
    }
    if (strcasecmp($nome_gara, "Italia-Monza") == 0) {
        $race_date = '2021-09-11 00:00:00';
    }
    if (strcasecmp($nome_gara, "Russia") == 0) {
        $race_date = '2021-09-25 00:00:00';
    }
    if (strcasecmp($nome_gara, "Turchia") == 0) {
        $race_date = '2021-10-09 00:00:00';
    }
    if (strcasecmp($nome_gara, "USA") == 0) {
        $race_date = '2021-10-23 00:00:00';
    }
    if (strcasecmp($nome_gara, "Messico") == 0) {
        $race_date = '2021-11-06 00:00:00';
    }
    if (strcasecmp($nome_gara, "Brasile") == 0) {
        $race_date = '2021-11-13 00:00:00';
    }
    if (strcasecmp($nome_gara, "Qatar") == 0) {
        $race_date = '2021-11-20 00:00:00';
    }
    if (strcasecmp($nome_gara, "Arabia Saudita") == 0) {
        $race_date = '2021-12-04 00:00:00';
    }
    if (strcasecmp($nome_gara, "Emirati Arabi") == 0) {
        $race_date = '2021-12-11 00:00:00';
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
    if (strcasecmp($nome_gara, "Bahrein") == 0) {
        $race_date = '2021-03-28 14:00:00';
    }
    if (strcasecmp($nome_gara, "Italia-Imola") == 0) {
        $race_date = '2021-04-18 12:00:00';
    }
    if (strcasecmp($nome_gara, "Portogallo") == 0) {
        $race_date = '2021-05-02 13:00:00';
    }
    if (strcasecmp($nome_gara, "Spagna") == 0) {
        $race_date = '2021-05-09 12:00:00';
    }
    if (strcasecmp($nome_gara, "Monaco") == 0) {
        $race_date = '2021-05-23 12:00:00';
    }
    if (strcasecmp($nome_gara, "Azerbaigian") == 0) {
        $race_date = '2021-06-06 11:00:00';
    }
    if (strcasecmp($nome_gara, "Francia") == 0) {
        $race_date = '2021-06-20 12:00:00';
    }
    if (strcasecmp($nome_gara, "Austria") == 0) {
        $race_date = '2021-06-27 12:00:00';
    }
    if (strcasecmp($nome_gara, "Austria-2") == 0) {
        $race_date = '2021-07-04 12:00:00';
    }
    if (strcasecmp($nome_gara, "Gran Bretagna") == 0) {
        $race_date = '2021-07-18 13:00:00';
    }
    if (strcasecmp($nome_gara, "Ungheria") == 0) {
        $race_date = '2021-08-01 12:00:00';
    }
    if (strcasecmp($nome_gara, "Belgio") == 0) {
        $race_date = '2021-08-29 12:00:00';
    }
    if (strcasecmp($nome_gara, "Olanda") == 0) {
        $race_date = '2021-09-05 12:00:00';
    }
    if (strcasecmp($nome_gara, "Italia-Monza") == 0) {
        $race_date = '2021-09-12 12:00:00';
    }
    if (strcasecmp($nome_gara, "Russia") == 0) {
        $race_date = '2021-09-26 11:00:00';
    }
    if (strcasecmp($nome_gara, "Turchia") == 0) {
        $race_date = '2021-10-10 12:00:00';
    }
    if (strcasecmp($nome_gara, "USA") == 0) {
        $race_date = '2021-10-24 18:00:00';
    }
    if (strcasecmp($nome_gara, "Messico") == 0) {
        $race_date = '2021-11-07 17:00:00';
    }
    if (strcasecmp($nome_gara, "Brasile") == 0) {
        $race_date = '2021-11-14 15:00:00';
    }
    if (strcasecmp($nome_gara, "Qatar") == 0) {
        $race_date = '2021-11-21 12:00:00';
    }
    if (strcasecmp($nome_gara, "Arabia Saudita") == 0) {
        $race_date = '2021-12-05 14:00:00';
    }
    if (strcasecmp($nome_gara, "Emirati Arabi") == 0) {
        $race_date = '2021-12-12 11:00:00';
    }
    if ($current_date > $race_date) {
        $var_controllo = false;
    }

    return $var_controllo;
}

function CurrentRace(): string
{
    date_default_timezone_set("Europe/Rome");
    $currentDate = date("Y-m-d H:i:s");
    $race = "";
    $raceList = array(
        "Bahrein" => "2021-03-27 00:00:00",
        "Italia-Imola" => "2021-04-17 00:00:00",
        "Portogallo" => '2021-05-01 00:00:00',
        "Spagna" => "2021-05-08 00:00:00",
        "Monaco" => "2021-05-22 00:00:00",
        "Azerbaigian" => "2021-06-05 00:00:00",
        "Francia" => "2021-06-19 00:00:00",
        "Austria" => "2021-06-26 00:00:00",
        "Austria-2" => "2021-07-03 00:00:00",
        "Gran Bretagna" => "2021-07-17 00:00:00",
        "Ungheria" => "2021-07-31 00:00:00",
        "Belgio" => "2021-08-28 00:00:00",
        "Olanda" => "2021-09-04 00:00:00",
        "Italia-Monza" => "2021-09-11 00:00:00",
        "Russia" => "2021-09-25 00:00:00",
        "Turchia" => "2021-10-09 00:00:00",
        "USA" => "2021-10-23 00:00:00",
        "Messico" => "2021-11-06 00:00:00",
        "Brasile" => "2021-11-13 00:00:00",
        "Qatar" => "2021-11-20 00:00:00",
        "Arabia Saudita" => "2021-12-04 00:00:00",
        "Emirati Arabi" => "2021-12-11 00:00:00"
    );
    foreach ($raceList as $raceName => $raceDate) {
        if ($raceDate > $currentDate) {
            break;
        }
        $race = $raceName;
    }
    return $race;
}
