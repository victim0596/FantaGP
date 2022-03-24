<?php

namespace App\Components\Queries\GetPtByID;
use App\Components\IQuery;

class GetPtByIDQuery implements IQuery
{

    private string $Utente;

    public function __construct(string $utente)
    {
        $this->Utente = $utente;
    }



    /**
     * Get the value of Utente
     *
     * @return  mixed
     */
    public function getUtente()
    {
        return $this->Utente;
    }
}
