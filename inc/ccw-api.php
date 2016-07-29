<?php
/**
 * CCW API Class & Functions
 * Constants are set in `country-config.php`
 */
class CCW_API {

    public function getClubs() {
        $url = CCW_API_URL . '/clubs?in_country=' . strtolower( CCW_API_COUNTRY_CODE );
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'AUTHORIZATION: Bearer ' . CCW_API_READONLY_TOKEN,
            'Accept: application/vnd.codeclubworld.v' . CCW_API_VERSION,
        ]);

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
    }

    public function saveClub( $club_json ) {
        $response = wp_remote_post( CCW_API_URL . '/clubs?welcome_email=' . CCW_API_WELCOME_EMAIL, array(
            'timeout' => 30,
            'headers' => array(
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . CCW_API_READWRITE_TOKEN,
                'Accept' => 'application/vnd.codeclubworld.v' . CCW_API_VERSION,
            ),
            'body' => $club_json,
        ));
        return $response;
    }

}
