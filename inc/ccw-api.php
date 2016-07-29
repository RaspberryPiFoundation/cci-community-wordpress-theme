<?php
/**
 * CCW API Class & Functions
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

}
