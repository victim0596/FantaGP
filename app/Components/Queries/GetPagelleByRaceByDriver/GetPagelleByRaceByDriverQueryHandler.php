<?php

namespace App\Components\Queries\GetPagelleByRaceByDriver;

use App\Models\Pagelle;
use Exception;

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
            $dbresult->NOME ?? "",
            $dbresult->DENOMINAZIONE  ?? "",
            $dbresult->SITO1  ?? 0,
            $dbresult->SITO2  ?? 0,
            $dbresult->SITO3  ?? 0,
        );
        return $result;
    }
}
