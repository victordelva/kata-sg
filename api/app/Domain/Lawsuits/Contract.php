<?php

namespace App\Domain\Lawsuits;

use App\Exceptions\Lawsuits\ContractException;

class Contract
{
    // improvement: include roles in database to allow adding new roles
    const ROLE_POINTS = [
        "K" => 5, "N" => 2, "V" => 1,
    ];

    /**
     * value => invalidator
     * key => invalidated
     */
    const INVALIDATORS = [
        "V" => "K",
    ];

    /**
     * @var array
     */
    private $roles;

    /**
     * @var integer
     */
    private $points;

    public function __construct(string $roles)
    {
        $roles = str_split($roles);

        $this->points = 0;

        $this->roles = array_map(function ($role) use ($roles) {
            $role = strtoupper($role);

            if (!in_array($role, $this->getAllowedRoles())) {
                throw new ContractException("INVALID_ROLE", 400);
            }

            $this->points += $this->getSingleRolePoints($role, $roles);

            return $role;
        }, $roles);
    }

    private function getAllowedRoles()
    {
        return array_keys(self::ROLE_POINTS);
    }

    private function getSingleRolePoints(string $role, array $roles)
    {
        if (isset(self::INVALIDATORS[$role])
            && in_array(strtoupper(self::INVALIDATORS[$role]), array_map('strtoupper', $roles))) {
            return 0;
        }
        return self::ROLE_POINTS[$role];
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function getRolesString(): string
    {
        return implode("", $this->roles);
    }

    public function getPoints(): int
    {
        return $this->points;
    }

    public function toArray(): array
    {
        return [
            "contract" => implode("", $this->roles),
            "points" => $this->getPoints(),
        ];
    }
}
