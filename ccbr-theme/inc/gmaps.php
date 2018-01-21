<?php
 //* Constants are set in `country-config.php`

function get_gmaps($callback_function)
{
    !empty($callback_function) ? $callback_function = '&callback=' . $callback_function : null;
    $retorno = "";
    $retorno = $retorno . '<script src="' . GOOGLE_MAPS_API_END_POINT . GOOGLE_MAPS_API_KEY . $callback_function . '" async defer></script>';
    $retorno = $retorno . '<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">';
    echo $retorno;
}

function get_gmaps_placehold($height = null,$width = null)
{
    helper_scripts();
    !empty($height) ? $height = 'height: ' . $height . ';' : 'height: 300px;';
    !empty($width) ? $width = 'width: ' . $width . ';' : null;

    $retorno = "";
    $retorno = $retorno . '<style>#map { ' . $height . ' ' . $width . ' }</style>';
    $retorno = $retorno . '<div id="map"></div>';
    echo $retorno;
}

function get_gmaps_address_url($address)
{
    return empty($address) ? "" : GOOGLE_MAPS_ADDRESS_END_POINT . GOOGLE_MAPS_API_KEY . '&address=' . preg_replace('/\s+/', '+', $address);
}

function helper_scripts()
{
    wp_enqueue_script( 'maker scripts', get_template_directory_uri() . '/js/marker-clusterer.js' );
    wp_enqueue_script( 'parsley scripts', get_template_directory_uri() . '/js/parsley.js' );
    wp_enqueue_script( 'app maps scripts', get_template_directory_uri() . '/js/maps.js' );
}
