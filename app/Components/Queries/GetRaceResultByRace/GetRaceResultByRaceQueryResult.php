<?php

namespace App\Components\Queries\GetRaceResultByRace;

use App\Components\IQueryResult;

class GetRaceResultByRaceQueryResult implements IQueryResult
{

    private string $NomeGara;
    private string $Qp1;
    private string $Qp2;
    private string $Qp3;
    private string $Gp1;
    private string $Gp2;
    private string $Gp3;
    private string $GiroVeloce;
    private int $NRitirati;
    private bool $VSC;
    private bool $SC;

    public function __construct(string $nomeGara, string $qp1, string $qp2, string $qp3, string $gp1, string $gp2, string $gp3, string $giroVeloce, int $nRitirati, bool $vsc, bool $sc)
    {
        $this->NomeGara = $nomeGara;
        $this->Qp1 = $qp1;
        $this->Qp2 = $qp2;
        $this->Qp3 = $qp3;
        $this->Gp1 = $gp1;
        $this->Gp2 = $gp2;
        $this->Gp3 = $gp3;
        $this->GiroVeloce = $giroVeloce;
        $this->NRitirati = $nRitirati;
        $this->VSC = $vsc;
        $this->SC = $sc;
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
     * Get the value of Qp1
     *
     * @return  mixed
     */
    public function getQp1()
    {
        return $this->Qp1;
    }

    /**
     * Get the value of Qp2
     *
     * @return  mixed
     */
    public function getQp2()
    {
        return $this->Qp2;
    }

    /**
     * Get the value of Qp3
     *
     * @return  mixed
     */
    public function getQp3()
    {
        return $this->Qp3;
    }

    /**
     * Get the value of Gp1
     *
     * @return  mixed
     */
    public function getGp1()
    {
        return $this->Gp1;
    }

    /**
     * Get the value of Gp2
     *
     * @return  mixed
     */
    public function getGp2()
    {
        return $this->Gp2;
    }

    /**
     * Get the value of Gp3
     *
     * @return  mixed
     */
    public function getGp3()
    {
        return $this->Gp3;
    }

    /**
     * Get the value of GiroVeloce
     *
     * @return  mixed
     */
    public function getGiroVeloce()
    {
        return $this->GiroVeloce;
    }


    /**
     * Get the value of NRitirati
     *
     * @return  mixed
     */
    public function getNRitirati()
    {
        return $this->NRitirati;
    }

    /**
     * Get the value of VSC
     *
     * @return  mixed
     */
    public function getVSC()
    {
        return $this->VSC;
    }

    /**
     * Get the value of SC
     *
     * @return  mixed
     */
    public function getSC()
    {
        return $this->SC;
    }
}
