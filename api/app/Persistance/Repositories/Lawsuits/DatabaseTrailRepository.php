<?php

namespace App\Persistance\Repositories\Lawsuits;

use App\Domain\Lawsuits\Contract;
use App\Domain\Lawsuits\Trial;
use Illuminate\Support\Facades\DB;

class DatabaseTrailRepository implements TrailRepositoryInterface
{
    public function save(Trial $trial)
    {
        $contract1 = $trial->getContract1();
        $contract2 = $trial->getContract2();
        $contractId1 = $this->storeContract($contract1);
        $contractId2 = $this->storeContract($contract2);
        return DB::table('trials')->insertGetId([
            "contract1_id" => $contractId1,
            "contract2_id" => $contractId2,
            "winner" => $trial->getWinner(),
        ]);
    }

    protected function storeContract(Contract $contract)
    {
        return DB::table('contracts')->insertGetId([
            "roles" => $contract->getRolesString(),
            "points" => $contract->getPoints(),
        ]);
    }
}
