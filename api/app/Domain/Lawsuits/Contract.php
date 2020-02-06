<?php

namespace App\Http\Domain\Lawsuits;

class Contract
{
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
        $this->roles = str_split($roles);
    }

    public function getRoles(): array
    {
        return $this->roles;
    }
}
