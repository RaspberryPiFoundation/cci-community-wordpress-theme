# Code Club World Countries Base Wordpress Theme

This is a WordPress theme designed to help country coordinators build a site to service their community.

Note: this theme and accompanying documentation is in its early stages, many changes and improvements will be made. You're encouraged to provide feedback and log issues via the Github Issues feature attached to this repository.

## General Info

The theme sets up some basic templates and a set of styles that should cover the majority of use-cases required by a community site in its infancy. Styling is based off the [official Code Club style guide](https://styleguide.codeclubworld.org).

## Setup

### Install WordPress

The best resource is the [WordPress Codex](https://codex.wordpress.org/Installing_WordPress), you'll need an appropriate account with a web hosting provider (linked with the relevant domain name) as well (we'll have a short list of recommended hosting providers ready soon).

### Install the ACF Plugin

The Advanced Custom Fields plugin is required for the theme to function. You can download it here: http://downloads.codeclubworld.org/wp-advanced-custom-fields-pro.zip

Once you have the plugin ZIP file, extract it & then upload the resulting directory to your WordPress installation's `wp-content/plugins` directory using whatever mechanism you have available via your hosting provider (eg. FTP). Then:

* Log in to the WordPress Administration panel (usually http://example.com/wp-admin)
* Select the Plugins panel, then click on 'Activate' beneath 'Advanced Custom Fields Pro'

### Install the Theme

We'll be posting releases to the [releases page](https://github.com/CodeClub/ccw-countries-wordpress-theme/releases) but in the meantime simply download the theme using the [ZIP file link](https://github.com/CodeClub/ccw-countries-wordpress-theme/archive/master.zip).

Once you have the theme ZIP file, extract it & then upload the resulting directory to your WordPress installation's `wp-content/themes` directory using whatever mechanism you have available via your hosting provider (eg. FTP). Then:

* Log in to the WordPress Administration panel (usually http://example.com/wp-admin).
* Select the Appearance panel, then Themes.
* You'll see the 'CCW Countries' listed, select it & click on Activate.

### Upload the Setup Data

Back on your machine, within the theme folder (that was unzipped in the steps above) there's a 'setup' directory. This contains some starter data for WordPress and for the Advanced Custom Fields. They need to both be imported:

* Log in to the WordPress Administration panel.
* Select the Tools panel, then Import.
* Select 'WordPress' from the import list (install the Importer plugin if prompted and select 'Activate Plugin & Run Importer' when complete) then select 'Browse' and point it to the `pages-export.xml` file within the theme's 'setup' directory. Select 'Upload file & import'
* When prompted to 'Assign Authors', select the username 'admin' from the dropdown option under 'or assign posts to an existing user' in step 1. Then click on Submit.
* When complete, head to the Custom Fields panel, then Tools.
* Under 'Import Field Groups' browse to the `acf-export.json` file within the theme's 'setup' directory, then select Import.

A page called 'Home' will have been created (using the `template-home.php` file) with an example ACF field attached to it (visit http://yoursiteurl/home/' to see it). Try adding some new fields and outputting them in the template (see the ACF documentation: https://www.advancedcustomfields.com/resources/get_field/). Wordpress' templating help documents can be found here: https://developer.wordpress.org/themes/basics/

### Sass

The themes styles can be found in the `sass` directory. After any changes to Sass files, `sass/style.scss` needs to be compiled to create `style.css`:

* Ensure you have Sass installed: http://sass-lang.com/install
* Run `sass sass/style.scss style.css` from within the theme directory

There are a number of command line tools & GUIs to make this process even easier / automatic (see links on the Sass installation page: http://sass-lang.com/install).

## Club Creation Form

Included in the theme is an example template for outputting a form which allows visitors to register their clubs via the Code Club World API. It's located in `template-parts/form-register-club.php` and is completely self-contained to keep things as simple as possible. To use it:

* First, ensure that *all* of the configuration values in `inc/country-config.php` are set (as part of this you'll need to create 'Terms & Conditions' & 'Registration Success' pages in Wordpress so that you can supply paths to each). If you have any questions regarding the values in the config file, such as the API bearer tokens, please contact the Code Club World team.
* Include the form in one of your page templates using: `<?php get_template_part( 'template-parts/form', 'register-club' ); ?>`
* You're all set! Submissions to the form will be viewable in your CCW API admin account: https://api.codeclubworld.org/admin/clubs
