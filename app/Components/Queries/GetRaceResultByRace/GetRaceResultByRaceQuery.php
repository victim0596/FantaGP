<?php

namespace App\Components\Queries\GetRaceResultByRace;
use App\Components\IQuery;

class GetRaceResultByRaceQuery implements IQuery
{

    private string $NomeGara;

    public function __construct(string $nomeGara)
    {
        $this->NomeGara = $nomeGara;
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
