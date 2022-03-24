<?php

namespace App\Components\Queries\GetPagelleByRaceByDriver;
use App\Components\IQuery;

class GetPagelleByRaceByDriverQuery implements IQuery{

    private string $NomeGara;
    private string $Pilota;

    public function __construct(string $nomeGara, string $pilota)
    {
        $this->NomeGara = $nomeGara;
        $this->Pilota = $pilota;
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

    /**
     * Get the value of Pilota
     *
     * @return  mixed
     */
    public function getPilota()
    {
        return $this->Pilota;
    }
}
