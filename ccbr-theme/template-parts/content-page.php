<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CCW_Countries
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="c-page-block">
	    <div class="c-grid c-grid--h-center">
	        <div class="c-col--12">
	        <?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ccw_countries' ),
					'after'  => '</div>',
				) );
			?>
	        </div>
	    </div>
	</div>
</article>
