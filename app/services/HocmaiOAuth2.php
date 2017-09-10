<?php
class HocmaiOAuth2 {

    private static $TOKEN_ENDPOINT = 'https://hocmai.vn/sso/token.php';
    private static $RESOURCE_ENDPOINT = 'https://hocmai.vn/sso/resource.php';
    private static $AUTHORIZE_ENDPOINT = 'https://hocmai.vn/loginv2/index.php';

    private $CLIENT_ID = NULL;
    private $CLIENT_SECRET = NULL;
    private $CLIENT_REDIRECT_URI = NULL;

    function __construct($client_id, $client_secret, $client_uri) {
        $this->CLIENT_ID = $client_id ? $client_id : NULL;
        $this->CLIENT_SECRET = $client_secret ? $client_secret : NULL;
        $this->CLIENT_REDIRECT_URI = $client_uri ? $client_uri : NULL;
    }

    function getAuthorizeUri() {
        $params = array(
            'response_type' => 'code',
            'state' => '1000',
            'client_id' => $this->CLIENT_ID,
            'redirect_uri' => $this->CLIENT_REDIRECT_URI
        );
        return self::$AUTHORIZE_ENDPOINT . "?" . http_build_query($params);
    }

    function getAuthorizeCode() {
        $code = isset($_GET['code']) ? $_GET['code'] : null;
        return $code;
    }

    // if app is not authorized, get access token form authorization_code
    function getAccessToken() {
        // define client information
        $fields = array(
            'client_id'     => $this->CLIENT_ID,
            'client_secret' => $this->CLIENT_SECRET,
            'redirect_uri'  => $this->CLIENT_REDIRECT_URI,
            'grant_type'    => 'authorization_code',
            'code'          => $this->getAuthorizeCode()
        );
        // submit authorize code to token endpoint
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, self::$TOKEN_ENDPOINT);
        curl_setopt($curl, CURLOPT_POST, sizeof($fields));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($curl);
        curl_close($curl);

        // get access token
        $token          = json_decode($result);
        $accessToken    = isset($token->access_token) ? $token->access_token : NULL;

        return $accessToken;
    }

    function getResource($access_token) {
        $fields = array(
            'access_token' => $access_token
        );

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, self::$RESOURCE_ENDPOINT);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($fields));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));

        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result);
    }
}