<?php

namespace App\Services\Lawsuits;

use App\Domain\Lawsuits\Contract;

class ContractsService
{
    /**
     * @param $contract1
     * @param $contract2
     */
    public function trial($contract1, $contract2)
    {
        $contract1 = new Contract($contract1);
        $contract2 = new Contract($contract2);

        $winner = 2;
        if ($contract1->getPoints() > $contract2->getPoints()) {
            $winner = 1;
        } else if ($contract1->getPoints() === $contract2->getPoints()) {
            $winner = 0;
        }

        return [
            "status" => $winner === 0 ? "TIE" : "OK",
            "winner_id" => "$winner",
            "participants" => [
                1 => $contract1->toArray(),
                2 => $contract2->toArray(),
            ]
        ];
    }
}
