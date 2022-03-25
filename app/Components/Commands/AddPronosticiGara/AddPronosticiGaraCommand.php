<?php

namespace App\Components\Commands\AddPronosticiGara;

use App\Components\ICommand;

class AddPronosticiGaraCommand implements ICommand
{
    private string $Utente;
    private string $NomeGara;
    private $GP1;
    private $GP2;
    private $GP3;
    private $GiroVeloce;
    private $VSC;
    private $SC;
    private $NRitirati;

    public function __construct(string $utente, string $nomeGara, string $gp1 = null, string $gp2 = null, string $gp3 = null, string $giroVeloce = null, bool $vsc = null, bool $sc = null, int $nRitirati = null)
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
