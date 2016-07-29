<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package CCW_Countries
 */

get_header(); ?>

	<div class="o-hero">
	    <div class="o-hero__bg c-grid c-grid--h-center c-grid--v-center">
	        <div class="c-col--8">
	            <div class="o-hero__body">
	            	<h1 class="o-hero__title"><?php esc_html_e( '404 - Not found', 'ccw_countries' ); ?></h1>
	                <p class="o-hero__subtitle c-lede"><?php esc_html_e( 'Sorry but we couldn\'t find the content you were looking for', 'ccw_countries' ); ?></p>
	            </div>
	        </div>
	    </div>
	</div>

	<div class="c-page-block c-page-block--alt-block u-text--center">
		<div class="c-grid">
			<div class="c-col c-col--12">
				<p><?php esc_html_e( 'Try the navigation menu above or search for the content', 'ccw_countries' ); ?>:</p>
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>

<?php
get_footer();
