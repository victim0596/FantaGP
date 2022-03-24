<?php

namespace App\Components\Commands\AddRitirati;

use App\Components\CommandResult;
use App\Models\Ritirati;
use App\Models\Gare;
use App\Models\Piloti;

class AddRitiratiCommandHandler
{
    public function Execute(AddRitiratiCommand $command): CommandResult
    {
        $existData = Ritirati::select()
            ->join('piloti', 'ID_PILOTA', '=', 'piloti.ID')
            ->join('gare', 'ID_GARA', '=', 'gare.ID')
            ->where('DENOMINAZIONE', $command->getNomeGara())
            ->where('NOME', $command->getPilota())
            ->first();
        if (empty($existData)) {
            $ritirato = new Ritirati;
            $ritirato->ID_GARA = Gare::where('DENOMINAZIONE', $command->getNomeGara())->first()->ID;
            $ritirato->ID_PILOTA = Piloti::where('NOME', $command->getPilota())->first()->ID;
            $ritirato->TIPO = $command->getTipo();
            $ritirato->save();
            $result = new CommandResult(true, 'I dati sono stati inseriti correttamente');
        } else {
            $result = new CommandResult(false, 'Hai giá inserito questo ritirato');
        }
        return $result;
    }
}
