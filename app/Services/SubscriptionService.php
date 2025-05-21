<?php

namespace App\Services;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;


class SubscriptionService
{

    private $baseUrl = "https://stellersubscriptionapiprod.azurewebsites.net/api/";

    private $usernameKey = "APPSETTING_API_USERNAME_STELLER_SUBSCRIPTION_API";

    private $passwordKey = "APPSETTING_API_PASSWORD_STELLER_SUBSCRIPTION_API";

    /**
     * @param string $id
     * @param string $type
     * @return Response|null
     */
    public function find(string $id, int $type = 0): ?Response
    {
        try {
            $response = Http::retry(1, 100)->withBasicAuth(getenv($this->usernameKey),getenv($this->passwordKey))
                ->get($this->baseUrl . "v1/subscriptioncontroller/find/{$id}?type={$type}");
            return $response;
        } catch (\Illuminate\Http\Client\RequestException $exception) {
            return null;
        }
    }

}