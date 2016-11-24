<?php
/**
 * CCW API Class & Functions
 * Constants are set in `country-config.php`
 */
class CCW_API {

    /**
     * @param string $state The state of the clubs (eg. active, pending, suspended). Defaults to 'active'
     * @param integer $per_page Number of clubs per page. Defaults to 50
     * @param integer $page Page number. Defaults to 1
     * @return array $response Containing 'headers' & 'body' arrays
     */
    public function getClubs( $state = 'active', $per_page = 50, $page = 1 ) {
        $url = CCW_API_URL . '/clubs?state=' . strtolower( $state ). '&in_country=' . strtolower( CCW_API_COUNTRY_CODE ) . '&per_page=' . $per_page . '&page=' . $page;
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

    /**
     * @param integer $id The ID of the club
     * @return array $response Containing 'headers' & 'body' arrays
     */
    public function getClub( $id ) {
        $url = CCW_API_URL . '/clubs/' . $id;
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

    /**
     * @param json $club_json Club data (inc. venue, address, contact) in a JSON encoded array
     * @return array $response Containing 'headers', 'body' & 'response' arrays
     */
    public function createClub( $club_json ) {
        $response = wp_remote_post( CCW_API_URL . '/clubs?welcome_email=' . CCW_API_WELCOME_EMAIL,
            array(
                'timeout' => 30,
                'headers' => array(
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . CCW_API_READWRITE_TOKEN,
                    'Accept'        => 'application/vnd.codeclubworld.v' . CCW_API_VERSION,
                ),
                'body' => $club_json,
            )
        );
        return $response;
    }


   /**
    * @param float $latitude location's latitude
    * @param float $longitude location's longitude
    * @param integer $radius radius to look up code clubs within
    * @return array $response Containing 'headers' & 'body' arrays
    */
    public function getNearbyCodeClubs($latitude, $longitude, $radius) {
      $url = CCW_API_URL . '/nearest_code_clubs?' .
             'radius=' . $radius . '&latitude=' . $latitude . '&longitude=' .$longitude;
      $headers = [
        'AUTHORIZATION' => 'Bearer ' . CCW_API_READONLY_TOKEN,
        'Accept'        => 'application/vnd.codeclubworld.v' . CCW_API_VERSION,
      ];
      $response = wp_remote_get($url,
        array(
          'timeout' => 30,
          'headers' => $headers,
        )
      );
      return $response;
    }

}
