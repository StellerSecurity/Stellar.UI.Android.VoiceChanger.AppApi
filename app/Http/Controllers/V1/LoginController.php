<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function login(Request $request) {

        $subscription_id = $request->input('subscription_id');

        if(empty($subscription_id)) {
            return response()->json(['response_code' => 400, 'response_message' => 'subscription_id is required']);
        }



    }

}