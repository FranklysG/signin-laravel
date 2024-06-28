<?php

namespace App\Http\Controllers;

use App\Services\Api\ApiResponseService;

abstract class Controller
{
    protected ApiResponseService $apiResponse;

    public function __construct()
    {
        $this->apiResponse = new ApiResponseService();
    }
}
