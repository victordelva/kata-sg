<?php

namespace App\Services\Lawsuits;

use App\Domain\Lawsuits\Contract;
use App\Domain\Lawsuits\Trial;

class TailsService
{
    /**
     * @param $contract1
     * @param $contract2
     */
    public function trial($contract1, $contract2)
    {
        $contract1 = new Contract($contract1);
        $contract2 = new Contract($contract2);

        $trial = new Trial($contract1, $contract2);

        return $trial->toArray();
    }
}
