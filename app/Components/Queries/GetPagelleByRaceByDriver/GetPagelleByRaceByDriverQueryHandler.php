<?php

namespace App\Components\Queries\GetPagelleByRaceByDriver;

use App\Models\Pagelle;

class GetPagelleByRaceByDriverQueryHandler 
{
    public static function Retrieve(GetPagelleByRaceByDriverQuery $query): GetPagelleByRaceByDriverQueryResult
    {
        $dbresult = Pagelle::select()
            ->join('gare', 'ID_GARA', '=', 'gare.ID')
            ->join('piloti', 'ID_PILOTA', '=', 'piloti.ID')
            ->where('gare.DENOMINAZIONE', $query->getNomeGara())
            ->where('piloti.NOME', $query->getPilota())
            ->first();
        $result = new GetPagelleByRaceByDriverQueryResult(
            $dbresult->NOME,
            $dbresult->DENOMINAZIONE,
            $dbresult->SITO1,
            $dbresult->SITO2,
            $dbresult->SITO3,
        );
        return $result;
    }
}
