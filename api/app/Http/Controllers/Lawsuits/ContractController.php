<?php

namespace App\Http\Controllers\Lawsuits;

use App\Exceptions\AppException;
use App\Http\Controllers\Controller;
use App\Services\Lawsuits\ContractsService;

class ContractController extends Controller
{
    private $contractService;

    public function __construct(ContractsService $contractsService)
    {
        $this->contractsService = $contractsService;
    }

    public function trialAction($contract1, $contract2)
    {
        try {
            return response()->json([
                "statusCode" => 200,
                "data" => $this->contractsService->trial($contract1, $contract2),
            ]);
        } catch (AppException $e) {
            return response(json_encode([
                "statusCode" => $e->getCode(),
                "message" => $e->getMessage(),
            ]), $e->getCode());
        }
    }
}
