<?php

namespace App\Components\Queries\GetPtByID;

use App\Models\PronosticiGara;
use App\Models\PronosticiQualifica;
use App\Models\Punteggi;


class GetPtByIDQueryHandler  
{
    public static function Retrieve(GetPtByIDQuery $query): GetPtByIDQueryResult
    {
        $resultDb = Punteggi::selectRaw('SUM(PUNTI_PAGELLE) as PuntiPagelle, SUM(PUNTI_GARA) as PuntiGara, SUM(PUNTI_QUALIFICA) as PuntiQualifica')
        ->join('utenti', 'ID_UTENTE', '=', 'utenti.ID')
        ->where('USERNAME', $query->getUtente())
        ->groupBy('ID_UTENTE')
        ->first();
        $PtPronosticiQualificheDbresult = $resultDb->PuntiQualifica ?? 0;
        $PtPronosticiGaraDbresult = $resultDb->PuntiGara ?? 0;
        $PtPagelleDbresult = $resultDb->PuntiPagelle ?? 0;
        $result = new GetPtByIDQueryResult (
            $query->getUtente(),
            $PtPronosticiQualificheDbresult + $PtPronosticiGaraDbresult + $PtPagelleDbresult,
            $PtPronosticiQualificheDbresult + $PtPronosticiGaraDbresult,
            $PtPagelleDbresult
        );
        return $result;
    }
}
