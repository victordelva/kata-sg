<?php

namespace App\Persistance\Repositories\Lawsuits;

use App\Domain\Lawsuits\Trial;

interface TrailRepositoryInterface
{
    public function save(Trial $trial);
}
