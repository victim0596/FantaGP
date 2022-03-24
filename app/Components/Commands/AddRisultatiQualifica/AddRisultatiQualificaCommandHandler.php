<?php

namespace App\Components\Commands\AddRisultatiQualifica;

use App\Components\CommandResult;
use App\Models\Risultati;
use App\Models\Gare;

class AddRisultatiQualificaCommandHandler
{
    public static function Execute(AddRisultatiQualificaCommand $command): CommandResult
    {
        $existData = Risultati::select()
            ->join('gare', 'ID_GARA', '=', 'gare.ID')
            ->where('DENOMINAZIONE', $command->getNomeGara())
            ->first();
        if (empty($existData)) {
            $insertQualy = new Risultati();
            $insertQualy->ID_GARA = Gare::where('DENOMINAZIONE', $command->getNomeGara())->first()->ID;;
            $insertQualy->QP1 = $command->getQP1();
            $insertQualy->QP2 = $command->getQP2();
            $insertQualy->QP3 = $command->getQP3();
            $insertQualy->save();
            $result = new CommandResult(true, "I dati sono stati inseriti correttamente");
        } else {
            $result = new CommandResult(false, "Hai gia aggiunto il risultato delle qualifiche");
        }
        return $result;
    }
}
