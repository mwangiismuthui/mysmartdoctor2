<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;


class AccessTokenController extends Controller
{
    public function generate_token($name)
    {
        // Substitute your Twilio Account SID and API Key details
        $accountSid = 'ACbb8fe036574535c66804f772ec6d6545';
        $apiKeySid = 'SK456cd0b394b308b8d86f9d29e44af651';
        $apiKeySecret = 'Lj4p0seTSo6aZg7a5xYUNpcDGcAAr70g';

        $identity = uniqid();

        // Create an Access Token
        $token = new AccessToken(
            $accountSid,
            $apiKeySid,
            $apiKeySecret,
            3600,
            $identity
        );

        // Grant access to Video
        $grant = new VideoGrant();
        $grant->setRoom($name);
        $token->addGrant($grant);

        // Serialize the token as a JWT
        echo $token->toJWT();
    }
}