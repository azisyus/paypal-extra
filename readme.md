
undefined but necessary request for paypal-connect, this request simply represents this page;
https://developer.paypal.com/docs/api/identity/v1/#userinfo_get (/v1/identity/oauth2/userinfo)


## INSTALL
`composer require azizyus/paypal-extra`

### USAGE

```
$scopes = $_GET['scope'];
$code = $_GET['code'];
$clientId = 'CLIENT_ID';
$clientSecret = 'CLIENT_SECRET';

$environment = new SandboxEnvironment($clientId, $clientSecret);
$client = new PayPalHttpClient($environment);

$request = new AccessTokenRequest($environment);
$request->body = [
    'grant_type' => 'authorization_code',
    'code' => $code
];

$response = $client->execute($request);
if($response->statusCode === 200)
{
    $accessToken = $response->result->access_token;
    $userResponse = $client->execute(new UserInfoRequest($accessToken));
    if($userResponse->statusCode === 200)
    {
        $result = $userResponse->result;
        header('Content-Type: application/json');
        echo json_encode($result);
    }
}
