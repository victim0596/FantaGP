<?php

namespace App\Components\Commands\AddRisultatiQualifica;

use App\Components\ICommand;

class AddRisultatiQualificaCommand implements ICommand
{
    private string $NomeGara;
    private string $QP1;
    private string $QP2;
    private string $QP3;

    public function __construct(string $nomeGara, string $qp1, string $qp2, string $qp3)
    {
        $this->QP1 = $qp1;
        $this->QP2 = $qp2;
        $this->QP3 = $qp3;
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
