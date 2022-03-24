<?php

namespace App\Components\Queries\GetRitiratiByRaceByDriverByType;
use App\Components\IQuery;

class GetRitiratiByRaceByDriverByTypeQuery implements IQuery
{

    private string $NomeGara;
    private string $Pilota;
    private bool $Tipo;

    public function __construct(string $nomeGara, string $pilota, bool $tipo)
    {
        $this->NomeGara = $nomeGara;
        $this->Pilota = $pilota;
        $this->Tipo = $tipo;
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

    /**
     * Get the value of Tipo
     *
     * @return  mixed
     */
    public function getTipo()
    {
        return $this->Tipo;
    }
}
