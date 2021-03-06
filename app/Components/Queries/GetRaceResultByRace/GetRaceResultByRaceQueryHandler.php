<?php

namespace App\Components\Queries\GetRaceResultByRace;

use App\Models\Risultati;
use Exception;


class GetRaceResultByRaceQueryHandler
{

    public static function Retrieve(GetRaceResultByRaceQuery $query): GetRaceResultByRaceQueryResult
    {
        $dbresult = Risultati::select()
            ->join('gare', 'ID_GARA', '=', 'gare.ID')
            ->where('gare.DENOMINAZIONE', $query->getNomeGara())->first();
        if (empty($dbresult)) throw new Exception('Non hai inserito nessun risultato per la gara ' . $query->getNomeGara());
        $result = new GetRaceResultByRaceQueryResult(
            $dbresult->DENOMINAZIONE,
            $dbresult->QP1,
            $dbresult->QP2,
            $dbresult->QP3,
            $dbresult->GP1,
            $dbresult->GP2,
            $dbresult->GP3,
            $dbresult->GIRO_VELOCE,
            $dbresult->NRITIRATI,
            $dbresult->VSC,
            $dbresult->SC
        );
        return $result;
    }
}
