<?php

namespace App\Components\Queries\GetClassificaGenerale;

use App\Models\Punteggi;

class GetClassificaGeneraleQueryHandler
{
    public function Retrieve(): array
    {
        $loadClassifiche['dataGen'] = [];
        $dataDBClassificaGenerale = Punteggi::selectRaw('USERNAME, sum(PUNTI_GARA + PUNTI_QUALIFICA + PUNTI_PAGELLE) as puntiGen')
        ->join('utenti', 'ID_UTENTE', '=', 'utenti.ID')
        ->groupBy('ID_UTENTE')
        ->orderByRaw('sum(PUNTI_GARA + PUNTI_QUALIFICA + PUNTI_PAGELLE) desc')->get();
        foreach ($dataDBClassificaGenerale as $user) {
            $assocArrayGen[$user->USERNAME] = $user->puntiGen;
        }
        $loadClassifiche['dataGen'] = $assocArrayGen;
        return $loadClassifiche;
    }
}
