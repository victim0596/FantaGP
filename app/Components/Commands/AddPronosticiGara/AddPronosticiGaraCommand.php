<?php

namespace App\Components\Commands\AddPronosticiGara;

use App\Components\ICommand;

class AddPronosticiGaraCommand implements ICommand
{
    private string $Utente;
    private string $NomeGara;
    private string $GP1;
    private string $GP2;
    private string $GP3;
    private string $GiroVeloce;
    private bool $VSC;
    private bool $SC;
    private int $NRitirati;

    public function __construct(string $utente, string $nomeGara, string $gp1, string $gp2, string $gp3, string $giroVeloce, string $vsc, string $sc, int $nRitirati)
    {
        $this->Utente = $utente;
        $this->NomeGara = $nomeGara;
        $this->GP1 = $gp1;
        $this->GP2 = $gp2;
        $this->GP3 = $gp3;
        $this->GiroVeloce = $giroVeloce;
        $this->VSC = $vsc;
        $this->SC = $sc;
        $this->NRitirati = $nRitirati;
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
     * Get the value of NRitirati
     *
     * @return  mixed
     */
    public function getNRitirati()
    {
        return $this->NRitirati;
    }
}
