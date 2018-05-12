<?php
namespace Services;

class HocmaiOAuth2 {

    private static $TOKEN_ENDPOINT = 'https://hocmai.vn/sso/token.php';
    private static $RESOURCE_ENDPOINT = 'https://hocmai.vn/sso/resource.php';
    private static $AUTHORIZE_ENDPOINT = 'https://hocmai.vn/loginv2/index.php';
    private static $CLIENT_VERSION = '1.2';
    private $CLIENT_ID = '4UMMmM26a43SZL8nPFDcz3DM7YpFxGyh';
    private $CLIENT_SECRET = 'fmHCxaFZQsRfaAgeZj2ctUpPULCP3k4T';
    private $CLIENT_REDIRECT_URI = 'http://tieuhoc.hocmai.vn/sso/index';
    private $ACCESS_TOKEN = NULL;

    function __construct($client_id = null, $client_secret = null, $client_uri = null) {
        $this->CLIENT_ID = $client_id ? $client_id : '4UMMmM26a43SZL8nPFDcz3DM7YpFxGyh';
        $this->CLIENT_SECRET = $client_secret ? $client_secret : 'fmHCxaFZQsRfaAgeZj2ctUpPULCP3k4T';
        $this->CLIENT_REDIRECT_URI = $client_uri ? $client_uri : 'http://tieuhoc.hocmai.vn/sso/index';
    }

    function getAuthorizeUri() {
        $params = array(
            'response_type' => 'code',
            'state' => time(),
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
        if (!is_null($this->ACCESS_TOKEN)) {
            return $this->ACCESS_TOKEN;
        }

        $fields = array(
            'grant_type'    => 'authorization_code',
            'code'          => $this->getAuthorizeCode()
        );

        $token          = $this->doRequest(self::$TOKEN_ENDPOINT, $fields);
        $accessToken    = isset($token->access_token) ? $token->access_token : NULL;

        return $this->setAccessToken($accessToken);
    }

    function getAccessTokenByRefreshToken($refresh_token) {
        $fields = array(
            'grant_type'    => 'refresh_token',
            'refresh_token'    => $refresh_token,
        );

        $token          = $this->doRequest(self::$TOKEN_ENDPOINT, $fields);
        $accessToken    = isset($token->access_token) ? $token->access_token : NULL;

        return $this->setAccessToken($accessToken);
    }

    function getResource($resource, $accessToken = null) {
        $fields = array(
            'resource' => $resource,
        );
        if( $accessToken == null ){
            $accessToken = $this->getAccessToken();
        }

        return $this->doRequest(self::$RESOURCE_ENDPOINT, $fields, array(
            'Authorization: Bearer ' . $accessToken
        ));
    }

    function doRequest($endpoint, $fields, $headers = array()) {
        if (!is_array($headers)) {
            $headers = array();
        }

        if (!is_array($fields)) {
            $fields = array();
        }

        $fields = array_merge(array(
            'client_version' => self::$CLIENT_VERSION,
            'client_id'     => $this->CLIENT_ID,
            'client_secret' => $this->CLIENT_SECRET,
            'redirect_uri'  => $this->CLIENT_REDIRECT_URI,
        ), $fields);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $endpoint);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($fields, '', '&'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array_merge(array(
            'Content-Type: application/x-www-form-urlencoded',
        ), $headers));

        $result = curl_exec($curl);
        curl_close($curl);

        // get access token
        return json_decode($result);
    }

    function setAccessToken($accessToken) {
        $this->ACCESS_TOKEN = $accessToken;
        return $this->ACCESS_TOKEN;
    }
}
