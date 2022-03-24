<?php

namespace App\Components\Commands\AddRitirati;

use App\Components\ICommand;

class AddRitiratiCommand implements ICommand
{
    private string $Pilota;
    private string $NomeGara;
    private bool $Tipo;

    public function __construct(string $pilota, string $nomeGara, bool $tipo)
    {
        $this->Pilota = $pilota;
        $this->NomeGara = $nomeGara;
        $this->Tipo = $tipo;
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
