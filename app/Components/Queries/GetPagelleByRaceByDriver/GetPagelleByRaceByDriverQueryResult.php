<?php

namespace App\Components\Queries\GetPagelleByRaceByDriver;

use App\Components\IQueryResult;

class GetPagelleByRaceByDriverQueryResult implements IQueryResult
{
    private string $Pilota;
    private string $NomeGara;
    private float $Sito1;
    private float $Sito2;
    private float $Sito3;

    public function __construct(string $pilota, string $nomeGara, float $sito1, float $sito2, float $sito3)
    {
        $this->Pilota = $pilota;
        $this->NomeGara = $nomeGara;
        $this->Sito1 = $sito1;
        $this->Sito2 = $sito2;
        $this->Sito3 = $sito3;
    }



    /**
     * Get the value of Sito3
     *
     * @return  mixed
     */
    public function getSito3()
    {
        return $this->Sito3;
    }

    /**
     * Get the value of Sito2
     *
     * @return  mixed
     */
    public function getSito2()
    {
        return $this->Sito2;
    }

    /**
     * Get the value of Sito1
     *
     * @return  mixed
     */
    public function getSito1()
    {
        return $this->Sito1;
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
