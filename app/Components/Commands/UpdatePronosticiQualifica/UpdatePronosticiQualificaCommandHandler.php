<?php

namespace App\Components\Commands\UpdatePronosticiQualifica;

use App\Components\CommandResult;
use App\Models\PronosticiQualifica;
use DateTime;

class UpdatePronosticiQualificaCommandHandler
{

    public static function Execute(UpdatePronosticiQualificaCommand $command): CommandResult
    {
        $existData = PronosticiQualifica::select()
            ->join('utenti', 'ID_UTENTE', '=', 'utenti.ID')
            ->join('gare', 'ID_GARA', '=', 'gare.ID')
            ->where('USERNAME', $command->getUtente())
            ->where('DENOMINAZIONE', $command->getNomeGara())
            ->first();
        if (!empty($existData)) {
            date_default_timezone_set("Europe/Rome");
            $today = new DateTime();
            PronosticiQualifica::select()
                ->join('utenti', 'ID_UTENTE', '=', 'utenti.ID')
                ->join('gare', 'ID_GARA', '=', 'gare.ID')
                ->where('USERNAME', $command->getUtente())
                ->where('DENOMINAZIONE', $command->getNomeGara())
                ->update(['QP1' => $command->getQP1(), 'QP2' => $command->getQP2(), 'QP3' => $command->getQP3(), 'TIMESTAMP' => $today]);
            $commandResult = new CommandResult(true, "I dati sono stati inseriti correttamente");
        } else {
            $commandResult = new CommandResult(false, "Non hai ancora inserito nessun pronostico");
        }
        return $commandResult;
    }
}
