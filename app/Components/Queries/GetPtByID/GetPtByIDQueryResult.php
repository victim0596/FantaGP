<?php

namespace App\Components\Queries\GetPtByID;

use App\Components\IQueryResult;

class GetPtByIDQueryResult implements IQueryResult
{
    private string $Utente;
    private float $PuntiTotali;
    private float $PuntiPronostici;
    private float $PuntiPagelle;

    public function __construct(string $utente, float $puntiTotali, float $puntiPronostici, float $puntiPagelle)
    {
        $this->Utente = $utente;
        $this->PuntiTotali = $puntiTotali;
        $this->PuntiPagelle = $puntiPagelle;
        $this->PuntiPronostici = $puntiPronostici;
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
     * Get the value of PuntiTotali
     *
     * @return  mixed
     */
    public function getPuntiTotali()
    {
        return $this->PuntiTotali;
    }

    /**
     * Get the value of PuntiPronostici
     *
     * @return  mixed
     */
    public function getPuntiPronostici()
    {
        return $this->PuntiPronostici;
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
