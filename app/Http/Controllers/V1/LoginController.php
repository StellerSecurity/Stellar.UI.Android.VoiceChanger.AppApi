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

        $subscription_id = $request->input('subscription_id');

        if(empty($subscription_id)) {
            return response()->json(['response_code' => 400, 'response_message' => 'subscription_id is required']);
        }

        $subscription = $this->subscriptionService->find($subscription_id, SubscriptionType::VOICECHANGER->value)->object();

        if(!isset($subscription->id)) {
            return response()->json(['response_code' => 400, 'response_message' => 'subscription_id was not found']);
        }

        if($subscription->status === SubscriptionStatus::INACTIVE->value) {
            return response()->json(['response_code' => 400, 'response_message' => 'subscription is not active / or is expired.']);
        }

        return response()->json(['response_code' => 200, 'response_message' => 'success']);

    }

}