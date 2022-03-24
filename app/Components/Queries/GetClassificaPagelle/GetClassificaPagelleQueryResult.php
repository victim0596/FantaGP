<?php
/* NON USATO */
namespace App\Components\Queries\GetClassificaPagelle;

class GetClassificaPagelleQueryResult
{
    private string $Utente;
    private float $Punti;

    public function __construct(string $utente, float $punti)
    {
        $this->Utente = $utente;
        $this->Punti = $punti;
    }

    

    /**
     * Get the value of Punti
     *
     * @return  mixed
     */
    public function getPunti()
    {
        return $this->Punti;
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
