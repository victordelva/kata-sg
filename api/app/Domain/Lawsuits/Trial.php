<?php

namespace App\Domain\Lawsuits;

use App\Exceptions\Lawsuits\ContractException;

class Trial
{
    /**
     * @var Contract
     */
    private $contract1;

    /**
     * @var Contract
     */
    private $contract2;

    /**
     * @var integer
     */
    private $winner;

    /**
     * Trial constructor.
     * @param Contract $contract1
     * @param Contract $contract2
     */
    public function __construct(Contract $contract1, Contract $contract2)
    {
        $this->contract1 = $contract1;
        $this->contract2 = $contract2;
        $this->goToTail();
    }

    /**
     * @return int
     */
    public function getContract1()
    {
        return $this->contract1;
    }

    /**
     * @param int $contract1
     */
    public function setContract1($contract1)
    {
        $this->contract1 = $contract1;
    }

    /**
     * @return int
     */
    public function getContract2()
    {
        return $this->contract2;
    }

    /**
     * @param int $contract2
     */
    public function setContract2($contract2)
    {
        $this->contract2 = $contract2;
    }

    private function goToTail()
    {
        if ($this->contract1->getPoints() > $this->contract2->getPoints()) {
            $this->winner = 1;
        } else if ($this->contract2->getPoints() > $this->contract1->getPoints()) {
            $this->winner = 2;
        } else {
            $this->winner = null;
        }
    }

    /**
     * @return int
     */
    public function getWinner()
    {
        return $this->winner;
    }

    public function toArray()
    {
        return [
            "status" => $this->getWinner() === null ? "TIE" : "OK",
            "winner_id" => $this->getWinner(),
            "participants" => [
                1 => $this->contract1->toArray(),
                2 => $this->contract2->toArray(),
            ]
        ];
    }
}
