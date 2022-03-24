<?php

namespace App\Components\Queries\GetRitiratiByRaceByDriverByType;

use App\Models\Ritirati;


class GetRitiratiByRaceByDriverByTypeQueryHandler  
{

    public static function Retrieve(GetRitiratiByRaceByDriverByTypeQuery $query): GetRitiratiByRaceByDriverByTypeQueryResult
    {
        $dbresult = Ritirati::select()
            ->join('gare', 'ID_GARA', '=', 'gare.ID')
            ->join('piloti', 'ID_PILOTA', '=', 'piloti.ID')
            ->where('piloti.NOME', $query->getPilota())
            ->where('gare.DENOMINAZIONE', $query->getNomeGara())
            ->where('TIPO', $query->getTipo())
            ->first();
        $result = new GetRitiratiByRaceByDriverByTypeQueryResult(
            $dbresult->NOME,
            $dbresult->DENOMINAZIONE,
            $dbresult->TIPO
        );
        return $result;
    }
}
