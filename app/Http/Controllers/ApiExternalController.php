<?php

namespace App\Http\Controllers;

use App\Repository\ApiExternalRepository;
use Illuminate\Http\Request;

class ApiExternalController extends Controller
{
    private $apiExternalRepository;

    public function __construct(ApiExternalRepository $apiExternalRepository)
    {
        $this->apiExternalRepository = $apiExternalRepository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        $this->apiExternalRepository->store();
        return response()->json([],200);
    }

    public function listData()
    {
        return $this->apiExternalRepository->listData();
    }
}
