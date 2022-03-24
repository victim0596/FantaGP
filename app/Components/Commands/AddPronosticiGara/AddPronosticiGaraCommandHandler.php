<?php

namespace App\Components\Commands\AddPronosticiGara;

use App\Components\CommandResult;
use App\Models\PronosticiGara;
use App\Models\Utenti;
use App\Models\Gare;
use DateTime;

class AddPronosticiGaraCommandHandler
{
    public static function Execute(AddPronosticiGaraCommand $command): CommandResult
    {
        $existData = PronosticiGara::select()
            ->join('utenti', 'ID_UTENTE', '=', 'utenti.ID')
            ->join('gare', 'ID_GARA', '=', 'gare.ID')
            ->where('USERNAME', $command->getUtente())
            ->where('DENOMINAZIONE', $command->getNomeGara())
            ->first();
        if (empty($existData)) {
            date_default_timezone_set("Europe/Rome");
            $today = new DateTime();
            $insertQualy = new PronosticiGara;
            $insertQualy->ID_UTENTE = Utenti::where('USERNAME', $command->getUtente())->first()->ID;;
            $insertQualy->ID_GARA =  Gare::where('DENOMINAZIONE', $command->getNomeGara())->first()->ID;
            $insertQualy->GP1 = $command->getGP1();
            $insertQualy->GP2 = $command->getGP2();
            $insertQualy->GP3 = $command->getGP3();
            $insertQualy->GIRO_VELOCE = $command->getGiroVeloce();
            $insertQualy->NRITIRATI = $command->getNRitirati();
            $insertQualy->SC = $command->getSC();
            $insertQualy->VSC = $command->getVSC();
            $insertQualy->TIMESTAMP = $today;
            $insertQualy->save();
            $result = new CommandResult(true, 'I dati sono stati inseriti correttamente');
        } else {
            $result = new CommandResult(false, 'Hai giá inserito i pronostici della gara');
        }
        return $result;
    }
}
