<?php

namespace App\Components\Queries\GetClassificaPronostici;

use App\Models\Punteggi;

class GetClassificaPronosticiQueryHandler
{
    public function Retrieve(): array
    {
        $loadClassifiche['dataPron'] = [];
        $dataDBClassificaPronostici = Punteggi::selectRaw('USERNAME, sum(PUNTI_GARA + PUNTI_QUALIFICA) as puntiPron')
            ->join('utenti', 'ID_UTENTE', '=', 'utenti.ID')
            ->groupBy('ID_UTENTE')
            ->orderByRaw('sum(PUNTI_GARA + PUNTI_QUALIFICA) desc')->get();
        foreach ($dataDBClassificaPronostici as $user) {
            $assocArrayPron[$user->USERNAME] = $user->puntiGen;
        }
        $loadClassifiche['dataPron'] = $assocArrayPron;
        return $loadClassifiche;
    }
}
