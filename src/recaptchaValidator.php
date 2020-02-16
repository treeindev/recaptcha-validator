<?php

class recaptchaValidator
{
    private $secret;
    private $endpoint = 'https://www.google.com/recaptcha/api/siteverify';

    public function __construct( $secretKey )
    {
        if ( !isset( $secretKey ) || is_null( $secretKey ) ) {
            throw new Exception( 'Invalid Google Captcha key' );
            return;
        }

        $this->secret = $secretKey;
    }

    /**
     * Checks the Google API response for captcha validity.
     */
    public function isValid( $captcha = null ) 
    {
        if ( is_null( $captcha ) && isset( $_POST['g-recaptcha-response'] ) ) {
            $captcha = $_POST['g-recaptcha-response'];
        } else if ( is_null( $captcha ) ) {
            throw new Exception( 'Cannot find Google Captcha V2' );
            return false;
        }

        $result = $this->send( $captcha );
        /*
            Result has the following structure:
            {
                "success": true|false,
                "challenge_ts": timestamp,
                "hostname": string,
                "error-codes": [...]
            }
        */

        if ( isset( $result->success ) && $result->success == true ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Sends API call to Google's validator endpoint.
     */
    private function send( $captcha, $remoteip = null )
    {
        // Creates the content of the API requests.
        // is_null( $remoteip ) ? $remoteip : null
        $data = http_build_query(
            array(
                'secret' => $this->secret,
                'response' => $captcha,
                'remoteip' => $remoteip
            )
        );

        // 'http' key is used for both HTTP and HTTPS context,
        // see https://www.php.net/manual/en/context.http.php for reference.
        $options = array(
            'http' => array(
                'header'  => 'Content-Type: application/x-www-form-urlencoded',
                'method'  => 'POST',
                'content' => $data
            )
        );
        $context = stream_context_create( $options );
        return json_decode ( file_get_contents ( $this->endpoint, false, $context ) );
    }
}