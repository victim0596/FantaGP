<?php

namespace App\Components\Commands\AddPunteggi;

use App\Components\CommandResult;
use App\Models\Punteggi;
use App\Models\Gare;
use App\Models\Utenti;

class AddPunteggiCommandHandler
{

    public static function Execute(AddPunteggiCommand $command): CommandResult
    {
        $existData = Punteggi::select()
            ->join('gare', 'ID_GARA', '=', 'gare.id')
            ->join('utenti', 'ID_UTENTE', '=', 'utenti.ID')
            ->where('DENOMINAZIONE', $command->getNomeGara())
            ->where('USERNAME', $command->getUtente())
            ->first();
        if (empty($existData)) {
            $noDataProno = new Punteggi;
            $noDataProno->ID_GARA = Gare::where('DENOMINAZIONE', $command->getNomeGara())->first()->ID;
            $noDataProno->ID_UTENTE = Utenti::where('USERNAME', $command->getUtente())->first()->ID;
            $noDataProno->PUNTI_GARA = $command->getPuntiGara();
            $noDataProno->PUNTI_QUALIFICA = $command->getPuntiQualifica();
            $noDataProno->PUNTI_PAGELLE = $command->getPuntiPagelle();
            $noDataProno->save();
            $result = new CommandResult(true, 'Hai inserito i punteggi con successo');
        } else {
            Punteggi::select()
                ->join('gare', 'ID_GARA', '=', 'gare.id')
                ->join('utenti', 'ID_UTENTE', '=', 'utenti.ID')
                ->where('DENOMINAZIONE', $command->getNomeGara())
                ->where('USERNAME', $command->getUtente())
                ->update(['PUNTI_GARA' => $command->getPuntiGara(), 'PUNTI_QUALIFICA' => $command->getPuntiQualifica(), 'PUNTI_PAGELLE' => $command->getPuntiPagelle()]);
            $result = new CommandResult(true, 'Hai inserito i punteggi con successo');
        }
        return $result;
    }
}
