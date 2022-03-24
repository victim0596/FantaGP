<?php

namespace App\Components\Commands\AddPagelle;

use App\Components\CommandResult;
use App\Models\Pagelle;
use App\Models\Gare;
use App\Models\Piloti;



class AddPagelleCommandHandler
{
    public static function Execute(AddPagelleCommand $command): CommandResult
    {
        $existData = Pagelle::select()
            ->join('piloti', 'ID_PILOTA', '=', 'piloti.ID')
            ->join('gare', 'ID_GARA', '=', 'gare.ID')
            ->where('DENOMINAZIONE', $command->getNomeGara())
            ->where('NOME', $command->getPilota())
            ->first();
        if (empty($existData)) {
            $pagelle = new Pagelle;
            $pagelle->ID_GARA = Gare::where('DENOMINAZIONE', $command->getNomeGara())->first()->ID;
            $pagelle->ID_PILOTA = Piloti::where('NOME', $command->getPilota())->first()->ID;
            $pagelle->SITO1 = $command->getSito1();
            $pagelle->SITO2 = $command->getSito2();
            $pagelle->SITO3 = $command->getSito3();
            $pagelle->save();
            $result = new CommandResult(true, 'I dati sono stati inseriti correttamente');
        } else {
            $result = new CommandResult(false, 'Hai gia inserito la pagella di questo pilota');
        }
        return $result;

    }
}
