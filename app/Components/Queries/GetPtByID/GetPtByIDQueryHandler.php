<?php

namespace App\Components\Queries\GetPtByID;

use App\Models\PronosticiGara;
use App\Models\PronosticiQualifica;
use App\Models\PuntiPagelle;


class GetPtByIDQueryHandler  
{
    public function Retrieve(GetPtByIDQuery $query): GetPtByIDQueryResult
    {
        $PtPagelleDbresult = PuntiPagelle::selectRaw('SUM(PUNTI) as PuntiPagelle')
        ->join('utenti', 'ID_UTENTE', '=', 'utenti.ID')
        ->where('USERNAME', $query->getUtente())
        ->groupBy('ID_UTENTE')
        ->first()->PuntiPagelle ?? 0;

        $PtPronosticiGaraDbresult = PronosticiGara::selectRaw('SUM(PUNTI) as PuntiPronosticiGara')
        ->join('utenti', 'ID_UTENTE', '=', 'utenti.ID')
        ->where('USERNAME', $query->getUtente())
        ->groupBy('ID_UTENTE')
        ->first()->PuntiPronosticiGara ?? 0;

        $PtPronosticiQualificheDbresult = PronosticiQualifica::selectRaw('SUM(PUNTI) as PuntiPronosticiQualifica')
        ->join('utenti', 'ID_UTENTE', '=', 'utenti.ID')
        ->where('USERNAME', $query->getUtente())
        ->groupBy('ID_UTENTE')
        ->first()->PuntiPronosticiQualifica ?? 0;

        $result = new GetPtByIDQueryResult (
            $query->getUtente(),
            $PtPronosticiQualificheDbresult + $PtPronosticiGaraDbresult + $PtPagelleDbresult,
            $PtPronosticiQualificheDbresult + $PtPronosticiGaraDbresult,
            $PtPagelleDbresult
        );
        return $result;
    }
}
