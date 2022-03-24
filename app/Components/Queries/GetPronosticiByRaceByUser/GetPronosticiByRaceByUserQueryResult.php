<?php

namespace App\Components\Queries\GetPronosticiByRaceByUser;
use App\Components\IQueryResult;

class GetPronosticiByRaceByUserQueryResult implements IQueryResult
{
    private string $NomeGara;
    private string $Utente;
    private string $QP1;
    private string $QP2;
    private string $QP3;
    private string $GP1;
    private string $GP2;
    private string $GP3;
    private string $GiroVeloce;
    private int $NRitirati;
    private bool $VSC;
    private bool $SC;
    private string $DataPronosticiQualifica;
    private string $DataPronosticiGara;

    public function __construct(
        string $nomeGara,
        string $utente,
        string $qp1,
        string $qp2,
        string $qp3,
        string $gp1,
        string $gp2,
        string $gp3,
        string $giroVeloce,
        string $nRitirati,
        bool $vsc,
        bool $sc,
        string $dataPronosticiQualifica,
        string $dataPronosticiGara
    ) {
        $this->NomeGara = $nomeGara;
        $this->Utente = $utente;
        $this->QP1 = $qp1;
        $this->QP2 = $qp2;
        $this->QP3 = $qp3;
        $this->GP1 = $gp1;
        $this->GP2 = $gp2;
        $this->GP3 = $gp3;
        $this->GiroVeloce = $giroVeloce;
        $this->NRitirati = $nRitirati;
        $this->SC = $sc;
        $this->VSC = $vsc;
        $this->DataPronosticiGara = $dataPronosticiGara;
        $this->DataPronosticiQualifica = $dataPronosticiQualifica;
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

    /**
     * Get the value of GP1
     *
     * @return  mixed
     */
    public function getGP1()
    {
        return $this->GP1;
    }

    /**
     * Get the value of GP2
     *
     * @return  mixed
     */
    public function getGP2()
    {
        return $this->GP2;
    }

    /**
     * Get the value of GP3
     *
     * @return  mixed
     */
    public function getGP3()
    {
        return $this->GP3;
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

    /**
     * Get the value of DataPronosticiQualifica
     *
     * @return  mixed
     */
    public function getDataPronosticiQualifica()
    {
        return $this->DataPronosticiQualifica;
    }

    /**
     * Get the value of DataPronosticiGara
     *
     * @return  mixed
     */
    public function getDataPronosticiGara()
    {
        return $this->DataPronosticiGara;
    }
}
