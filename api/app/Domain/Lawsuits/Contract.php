<?php

namespace App\Domain\Lawsuits;

use App\Exceptions\Lawsuits\ContractException;

class Contract
{
    const ALLOWED_ROLES = ["K", "N", "V"];

    /**
     * @var array
     */
    private $roles;

    public function __construct(string $roles)
    {
        $this->setRoles($roles);
    }

    private function setRoles(string $roles)
    {
        $roles = str_split($roles);
        array_map(function ($role) {
            if (!in_array($role, self::ALLOWED_ROLES)) {
                throw new ContractException("INVALID_ROLE", 400);
            }
        }, $roles);
        $this->roles = $roles;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function getPoints(): array
    {
        return $this->roles;
    }
}
