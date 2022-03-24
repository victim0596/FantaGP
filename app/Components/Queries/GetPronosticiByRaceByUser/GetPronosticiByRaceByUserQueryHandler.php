<?php

namespace App\Components\Queries\GetPronosticiByRaceByUser;

use App\Models\PronosticiGara;


class GetPronosticiByRaceByUserQueryHandler  
{
    public static function Retrieve(GetPronosticiByRaceByUserQuery $query): GetPronosticiByRaceByUserQueryResult
    {
        $dbResult = PronosticiGara::selectRaw('utenti.USERNAME, gare.DENOMINAZIONE, 
            pronostici_gara.GP1, pronostici_gara.GP2, pronostici_gara.GP3, pronostici_qualifica.QP1,  pronostici_qualifica.QP2,  pronostici_qualifica.QP3,
            pronostici_gara.NRITIRATI, pronostici_gara.VSC, pronostici_gara.SC, pronostici_gara.GIRO_VELOCE,
            pronostici_gara.TIMESTAMP as DataPronosticiGara, pronostici_qualifica.TIMESTAMP as DataPronosticiQualifica')
            ->join('pronostici_qualifica', 'pronostici_gara.ID_GARA', '=', 'pronostici_qualifica.ID_GARA')
            ->join('gare', 'pronostici_gara.ID_GARA', '=', 'gare.ID')
            ->join('utenti', 'pronostici_gara.ID_UTENTE', '=', 'utenti.ID')
            ->where('DENOMINAZIONE', $query->getNomeGara())
            ->where('USERNAME', $query->getUtente())->first();
        $result = new GetPronosticiByRaceByUserQueryResult(
            $dbResult->DENOMINAZIONE,
            $dbResult->USERNAME,
            $dbResult->QP1,
            $dbResult->QP2,
            $dbResult->QP3,
            $dbResult->GP1,
            $dbResult->GP2,
            $dbResult->GP3,
            $dbResult->GIRO_VELOCE,
            $dbResult->NRITIRATI,
            $dbResult->VSC,
            $dbResult->SC,
            $dbResult->DataPronosticiQualifica,
            $dbResult->DataPronosticiGara
        );
        return $result;
    }
}
