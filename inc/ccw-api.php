<?php
/**
 * CCW API Class & Functions
 * Constants are set in `country-config.php`
 */
class CCW_API {

    public function getClubs() {
        $url = CCW_API_URL . '/clubs?in_country=' . strtolower( CCW_API_COUNTRY_CODE );
        $headers = [
            'AUTHORIZATION' => 'Bearer ' . CCW_API_READONLY_TOKEN,
            'Accept'        => 'application/vnd.codeclubworld.v' . CCW_API_VERSION,
        ];

        $response = wp_remote_get( $url,
            array(
                'timeout' => 30,
                'headers' => $headers,
            )
        );
        return $response;
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
