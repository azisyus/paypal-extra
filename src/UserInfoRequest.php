<?php

namespace PaypalExtra;

use PayPalHttp\HttpRequest;

class UserInfoRequest extends HttpRequest
{

    public function __construct($accessToken)
    {
        parent::__construct("/v1/identity/oauth2/userinfo?schema=paypalv1.1", "GET");
        $this->headers["Authorization"] = "Bearer " . $accessToken;
        $this->headers["Content-Type"] = "application/json";
    }

}

