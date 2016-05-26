<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CCW_Countries
 */

?>

</main>

<footer class="o-footer">
    <div class="c-grid c-grid--v-top">
        <?php if ( has_nav_menu( 'footer_navigation_1' ) ) : ?>
        <div class="c-col--3">
            <p class="o-footer__heading"><?php nav_menu_name_by_location('footer_navigation_1'); ?></p>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer_navigation_1',
                'menu_class'     => 'o-footer__list',
                'container'      => false
            ]);
            ?>
        </div>
        <?php endif; ?>

        <?php if ( has_nav_menu( 'footer_navigation_2' ) ) : ?>
        <div class="c-col--3">
            <p class="o-footer__heading"><?php nav_menu_name_by_location('footer_navigation_2'); ?></p>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer_navigation_2',
                'menu_class'     => 'o-footer__list',
                'container'      => false
            ]);
            ?>
        </div>
        <?php endif; ?>

        <?php if ( has_nav_menu( 'footer_navigation_3' ) ) : ?>
        <div class="c-col--3">
            <p class="o-footer__heading"><?php nav_menu_name_by_location('footer_navigation_3'); ?></p>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer_navigation_3',
                'menu_class'     => 'o-footer__list',
                'container'      => false
            ]);
            ?>
        </div>
        <?php endif; ?>

        <?php if ( has_nav_menu( 'footer_navigation_4' ) ) : ?>
        <div class="c-col--3">
            <p class="o-footer__heading"><?php nav_menu_name_by_location('footer_navigation_4'); ?></p>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer_navigation_4',
                'menu_class'     => 'o-footer__list',
                'container'      => false
            ]);
            ?>
        </div>
        <?php endif; ?>
    </div>

    <div class="c-grid">
        <div class="c-col--9">
            &copy; <?php echo date('Y'); ?>
        </div>
        <div class="c-col--2">
            <ul class="o-footer__social-list">
                <li class="o-footer__social-list-item">
                    <a class="o-footer__social-list-link" href="https://www.facebook.com/" target="_blank">
                        <span class="c-icon c-icon--social-facebook c-icon--white"></span>
                    </a>
                </li>
                <li class="o-footer__social-list-item">
                    <a class="o-footer__social-list-link" href="https://twitter.com/" target="_blank">
                        <span class="c-icon c-icon--social-twitter c-icon--white"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <?php dynamic_sidebar('sidebar-footer'); ?>
</footer>

<?php wp_footer(); ?>

</body>
</html>
