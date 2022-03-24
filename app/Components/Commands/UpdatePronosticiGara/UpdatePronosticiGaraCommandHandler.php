<?php

namespace App\Components\Commands\UpdatePronosticiGara;

use App\Components\CommandResult;
use App\Models\PronosticiGara;
use DateTime;

class UpdatePronosticiGaraCommandHandler
{

    public function Execute(UpdatePronosticiGaraCommand $command): CommandResult
    {
        $existData = PronosticiGara::select()
            ->join('utenti', 'ID_UTENTE', '=', 'utenti.ID')
            ->join('gare', 'ID_GARA', '=', 'gare.ID')
            ->where('USERNAME', $command->getUtente())
            ->where('DENOMINAZIONE', $command->getNomeGara())
            ->first();
        if (!empty($existData)) {
            date_default_timezone_set("Europe/Rome");
            $today = new DateTime();
            PronosticiGara::select()
                ->join('utenti', 'ID_UTENTE', '=', 'utenti.ID')
                ->join('gare', 'ID_GARA', '=', 'gare.ID')
                ->where('USERNAME', $command->getUtente())
                ->where('DENOMINAZIONE', $command->getNomeGara())
                ->update([
                    'GP1' => $command->getGP1(), 'GP2' => $command->getGP2(), 'GP3' => $command->getGP3(),
                    'GIRO_VELOCE' => $command->getGiroVeloce(), 'NRITIRATI' => $command->getNRitirati(),
                    'SC' => $command->getSC(), 'VSC' => $command->getVSC(), 'TIMESTAMP' => $today
                ]);
            $commandResult = new CommandResult(true, "I dati sono stati inseriti correttamente");
        } else {
            $commandResult = new CommandResult(false, "Non hai ancora inserito nessun pronostico");
        }
        return $commandResult;
    }
}
