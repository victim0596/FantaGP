<?php

namespace App\Components\Commands\AddPronosticiQualifica;

use App\Components\CommandResult;
use App\Models\PronosticiQualifica;
use App\Models\Utenti;
use App\Models\Gare;
use DateTime;


class AddPronosticiQualificaCommandHandler
{

    public static function Execute(AddPronosticiQualificaCommand $command): CommandResult
    {
        $existData = PronosticiQualifica::select()
            ->join('utenti', 'ID_UTENTE', '=', 'utenti.ID')
            ->join('gare', 'ID_GARA', '=', 'gare.ID')
            ->where('USERNAME', $command->getUtente())
            ->where('DENOMINAZIONE', $command->getNomeGara())
            ->first();
        if (empty($existData)) {
            date_default_timezone_set("Europe/Rome");
            $today = new DateTime();
            $insertQualy = new PronosticiQualifica;
            $insertQualy->ID_UTENTE = Utenti::where('USERNAME', $command->getUtente())->first()->ID;;
            $insertQualy->ID_GARA =  Gare::where('DENOMINAZIONE', $command->getNomeGara())->first()->ID;
            $insertQualy->QP1 = $command->getQP1();
            $insertQualy->QP2 = $command->getQP2();
            $insertQualy->QP3 = $command->getQP3();
            $insertQualy->TIMESTAMP = $today;
            $insertQualy->save();
            $result = new CommandResult(true, 'I dati sono stati inseriti correttamente');
        } else {
            $result = new CommandResult(false, 'Hai giá inserito i pronostici delle qualifiche');
        }
        return $result;
    }
}
