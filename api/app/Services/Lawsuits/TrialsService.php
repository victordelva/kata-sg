<?php

namespace App\Services\Lawsuits;

use App\Domain\Lawsuits\Contract;
use App\Domain\Lawsuits\Trial;
use App\Persistance\Repositories\Lawsuits\TrailRepositoryInterface;

class TrialsService
{
    private $trialRepository;

    public function __construct(TrailRepositoryInterface $trailRepository)
    {
        $this->trialRepository = $trailRepository;
    }

    /**
     * @param $contract1
     * @param $contract2
     */
    public function trial($contract1, $contract2)
    {
        $contract1 = new Contract($contract1);
        $contract2 = new Contract($contract2);

        $trial = new Trial($contract1, $contract2);

        $this->trialRepository->save($trial);

        return $trial->toArray();
    }
}
