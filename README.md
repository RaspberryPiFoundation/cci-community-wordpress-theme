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
