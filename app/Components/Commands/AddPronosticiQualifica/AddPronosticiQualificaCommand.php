<?php

namespace App\Components\Commands\AddPronosticiQualifica;

use App\Components\ICommand;

class AddPronosticiQualificaCommand implements ICommand
{
    private string $Utente;
    private string $NomeGara;
    private $QP1;
    private $QP2;
    private $QP3;

    public function __construct(string $utente, string $nomeGara, string $qp1 = null, string $qp2 = null, string $qp3 = null)
    {
        $this->Utente = $utente;
        $this->NomeGara = $nomeGara;
        $this->QP1 = $qp1;
        $this->QP2 = $qp2;
        $this->QP3 = $qp3;
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

    /**
     * Get the value of QP1
     *
     * @return  mixed
     */
    public function getQP1()
    {
        return $this->QP1;
    }

    /**
     * Get the value of QP2
     *
     * @return  mixed
     */
    public function getQP2()
    {
        return $this->QP2;
    }

    /**
     * Get the value of QP3
     *
     * @return  mixed
     */
    public function getQP3()
    {
        return $this->QP3;
    }
}
