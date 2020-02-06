<?php

namespace Tests\Unit;

use App\Domain\Lawsuits\Contract;
use PHPUnit\Framework\TestCase;

class ContractTest extends TestCase
{
    public function contractsProvider()
    {
        return [
            [
                [
                    "string" => "KNN",
                    "array" => ["K", "N", "N"],
                    "points" => 9
                ],
            ],
            [
                [
                    "string" => "KNNVVVV",
                    "array" => ["K","N","N","V","V","V","V"],
                    "points" => 9
                ],
            ],
            [
                [
                    "string" => "NNVVVV",
                    "array" => ["N","N","V","V","V","V"],
                    "points" => 8
                ],
            ],
            [
                [
                    "string" => "KNV",
                    "array" => ["K","N","V"],
                    "points" => 7
                ],
            ]
        ];
    }

    /**
     * @test
     * @dataProvider contractsProvider
     */
    public function testContract($contractProvided)
    {
        $contract = new Contract($contractProvided["string"]);
        $this->assertEquals($contract->getRoles(), $contractProvided["array"]);
        $this->assertEquals($contract->getPoints(), $contractProvided["points"]);
    }

    public function testInvalidContract()
    {
        $this->expectExceptionMessage("INVALID_ROLE");

        $contractString = "KNNM";
        $contract = new Contract($contractString);
    }
}
