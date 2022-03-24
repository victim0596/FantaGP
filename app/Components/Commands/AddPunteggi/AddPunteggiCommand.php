<?php

namespace App\Components\Commands\AddPunteggi;

use App\Components\ICommand;

class AddPunteggiCommand implements ICommand
{
    private string $NomeGara;
    private string $Utente;
    private float $PuntiGara;
    private float $PuntiQualifica;
    private float $PuntiPagelle;

    public function __construct(string $nomeGara, string $utente, float $puntiGara, float $puntiQualifica, float $puntiPagelle)
    {
        $this->NomeGara = $nomeGara;
        $this->Utente = $utente;
        $this->PuntiGara = $puntiGara;
        $this->PuntiQualifica = $puntiQualifica;
        $this->PuntiPagelle = $puntiPagelle;
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
     * Get the value of Utente
     *
     * @return  mixed
     */
    public function getUtente()
    {
        return $this->Utente;
    }

    /**
     * Get the value of PuntiGara
     *
     * @return  mixed
     */
    public function getPuntiGara()
    {
        return $this->PuntiGara;
    }

    /**
     * Get the value of PuntiQualifica
     *
     * @return  mixed
     */
    public function getPuntiQualifica()
    {
        return $this->PuntiQualifica;
    }

    /**
     * Get the value of PuntiPagelle
     *
     * @return  mixed
     */
    public function getPuntiPagelle()
    {
        return $this->PuntiPagelle;
    }
}
