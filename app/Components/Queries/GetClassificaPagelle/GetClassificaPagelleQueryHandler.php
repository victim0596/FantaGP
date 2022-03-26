<?php

namespace App\Components\Queries\GetClassificaPagelle;

use App\Models\Punteggi;

class GetClassificaPagelleQueryHandler
{
    public static function Retrieve(): array
    {
        $loadClassifiche['dataPag'] = [];
        $dataDBClassificaPagelle = Punteggi::selectRaw('USERNAME, sum(PUNTI_PAGELLE) as puntiPag')
            ->join('utenti', 'ID_UTENTE', '=', 'utenti.ID')
            ->groupBy('USERNAME')
            ->orderByRaw('sum(PUNTI_PAGELLE) desc')->get();
        foreach ($dataDBClassificaPagelle as $user) {
            $assocArrayPag[$user->USERNAME] = $user->puntiPag;
        }
        return $assocArrayPag;
    }
}
