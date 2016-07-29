<?php
/**
 * Country-specific config
 */

/* CCW API Constants */

// The 2-character (Alpha-2) code of your country. For example: 'FR', 'DE', 'US'. See: https://www.iso.org/obp/ui/#search
define( 'CCW_API_COUNTRY_CODE', '' );

// CCW API URL
define( 'CCW_API_URL', 'https://api.codeclubworld.org' );

// The read/write API bearer token assigned to you, visible in the CCW API admin
define( 'CCW_API_READWRITE_TOKEN', '' );

// The readonly API bearer token assigned to you, visible in the CCW API admin
define( 'CCW_API_READONLY_TOKEN', '' );

// The CCW API version, currently at '2'
define( 'CCW_API_VERSION', '2' );

// Send an automatic welcome email (in English) when a club registers via the CCW API registration form. Values: 'true' or 'false'
define( 'CCW_API_WELCOME_EMAIL', 'true' );

// You must create a Terms & Conditions page and provide the path to it here. For example, if the page address is: 'http://codeclub.org.uk/terms-and-conditions' then the value here should be: '/terms-and-conditions' (must start with a /)
define( 'CCW_API_TERMS_CONDITIONS_PAGE', '/' );

// You must create a page to display a 'Registration Success' message and provide the path to it here. For example, if the page address is: 'http://codeclub.org.uk/registration-success' then the value here should be: '/registration-success' (must start with a /)
define( 'CCW_API_REGISTRATION_SUCCESS_PAGE', '/' );


/* Social Constants, uncomment to enable */

// Provide the URL to your Facebook Page / Group
#define( 'SOCIAL_FACEBOOK_URL', 'https://www.facebook.com/your-page-here' );
// Provide the URL to your Twitter page
#define( 'SOCIAL_TWITTER_URL', 'https://twitter.com/your-account-here' );
// Provide the URL to your Google+ page or Google Group
#define( 'SOCIAL_GOOGLE_URL', 'https://plus.google.com/your-account-here' );
// Provide the URL to your YouTube channel
#define( 'SOCIAL_YOUTUBE_URL', 'https://youtube.com/your-channel-here' );
