<?php

namespace App\Components\Commands\AddRisultatiGara;

use App\Components\CommandResult;
use App\Models\Risultati;

class AddRisultatiGaraCommandHandler
{
    public static function Execute(AddRisultatiGaraCommand $command): CommandResult
    {
        $existData = Risultati::select()
            ->join('gare', 'ID_GARA', '=', 'gare.ID')
            ->where('DENOMINAZIONE', $command->getNomeGara())
            ->first();
        if (!empty($existData)) {
            Risultati::select()
                ->join('gare', 'ID_GARA', '=', 'gare.ID')
                ->where('DENOMINAZIONE', $command->getNomeGara())
                ->update([
                    'GP1' => $command->getGP1(), 'GP2' => $command->getGP2(), 'GP3' => $command->getGP3(),
                    'GIRO_VELOCE' => $command->getGiroVeloce(), 'VSC' => $command->getVSC(), 'SC' => $command->getSC(), 'NRITIRATI' => $command->getNRitirati()
                ]);
            $result = new CommandResult(true, "I dati sono stati inseriti correttamente");
        } else {
            $result = new CommandResult(false, "Non hai inserito i pronostici delle qualifiche");
        }
        return $result;
    }
}
