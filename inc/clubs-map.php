<?php
require_once get_template_directory() . '/inc/ccw-api-transient.php';
function cci_map_handler($atts = array())
{
    ob_start();
    $ccw_api          = new CCW_API_TRANSIENT();
    $ccw_api_response = $ccw_api->getAllClubs(); 
    $_SESSION['code_clubs'] = $ccw_api_response;
    
?>

<div  class="club_map_wrapper">
    <div id="map"  class="club_map"></div>
    </div>
    <script>
	function initMap()
	{
		fillMap( {lat: <?php echo $atts["center_lat"];?>, lng: <?php echo $atts["center_lng"]; ?>,zoom:<?php echo $atts["zoom_level"];?>,
			  icon:'<?php echo  get_stylesheet_directory_uri(); ?>/images/',
			  contactVenue:'<?php esc_html_e("Contact Venue", 'ccw_countries');?>'});
    }

	<?php
    $clubs_array = Array();
    foreach ($ccw_api_response as $code_club) {
        $lat = $code_club['venue']['address']['latitude'];
        $lng = $code_club['venue']['address']['longitude'];
        if ($lat == "" || $lng == "")
            continue;
        $club_object["lat"]     = (float) $lat;
        $club_object["lng"]     = (float) $lng;
        $club_object["name"]    = $code_club['venue']['name'];
        $club_object["address"] = $code_club['venue']['address']['address_1'] . ' ' . $code_club['venue']['address']['address_2'] . ' ' . $code_club['venue']['address']['city'] . ' ' . $code_club['venue']['address']['postcode'];
        $code_club['venue']['address']['postcode'];
        $club_object["id"] = $code_club['id'];
        if (!empty($code_club['venue']['phone']))
            $club_object["phone"] = $code_club['venue']['phone'];
        $clubs_array[] = $club_object;
    }
    echo "var clubs=" . json_encode($clubs_array) . ";";
?>
         
    </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=<?= GOOGLE_MAPS_API_KEY ?>&callback=initMap">
    </script>
<?php
    
    $result = ob_get_clean();
    return $result;
}
add_shortcode( 'cci_map', 'cci_map_handler' );

