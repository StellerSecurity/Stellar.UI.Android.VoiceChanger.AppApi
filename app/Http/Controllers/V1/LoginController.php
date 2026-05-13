<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Services\SubscriptionService;
use App\SubscriptionStatus;
use app\SubscriptionType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    private SubscriptionService $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService) {
        $this->subscriptionService = $subscriptionService;
    }


    public function login(Request $request): JsonResponse
    {

        return response()->json(['response_code' => 200, 'response_message' => 'success']);

    }

}