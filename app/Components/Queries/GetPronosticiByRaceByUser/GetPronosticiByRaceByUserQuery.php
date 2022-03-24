<?php

namespace App\Components\Queries\GetPronosticiByRaceByUser;
use App\Components\IQuery;

class GetPronosticiByRaceByUserQuery implements IQuery
{
    private string $NomeGara;
    private string $Utente;

    public function __construct(string $nomeGara, string $utente)
    {
        $this->NomeGara = $nomeGara;
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

    /**
     * Get the value of NomeGara
     *
     * @return  mixed
     */
    public function getNomeGara()
    {
        return $this->NomeGara;
    }
}
