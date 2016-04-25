<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CCW_Countries
 */

?>

</main>

<footer class="o-footer">
    <div class="c-grid c-grid--v-top">

        <?php
        if (has_nav_menu('footer_navigation_1')) :
        ?>
        <div class="c-col--3">
            <p class="o-footer__heading">
            <?php
            $menu_name = 'footer_navigation_1';
            $locations = get_nav_menu_locations();
            $menu_id = $locations[ $menu_name ] ;
            $nav_menu = wp_get_nav_menu_object($menu_id);
            echo $nav_menu->name;
            ?>
            </p>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer_navigation_1',
                'menu_class' => 'o-footer__list',
                'container' => false
            ]);
            ?>
        </div>
        <?php
        endif;
        ?>

        <?php
        if (has_nav_menu('footer_navigation_2')) :
        ?>
        <div class="c-col--3">
            <p class="o-footer__heading">
            <?php
            $menu_name = 'footer_navigation_2';
            $locations = get_nav_menu_locations();
            $menu_id = $locations[ $menu_name ] ;
            $nav_menu = wp_get_nav_menu_object($menu_id);
            echo $nav_menu->name;
            ?>
            </p>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer_navigation_2',
                'menu_class' => 'o-footer__list',
                'container' => false
            ]);
            ?>
        </div>
        <?php
        endif;
        ?>

        <?php
        if (has_nav_menu('footer_navigation_3')) :
        ?>
        <div class="c-col--3">
            <p class="o-footer__heading">
            <?php
            $menu_name = 'footer_navigation_3';
            $locations = get_nav_menu_locations();
            $menu_id = $locations[ $menu_name ] ;
            $nav_menu = wp_get_nav_menu_object($menu_id);
            echo $nav_menu->name;
            ?>
            </p>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer_navigation_3',
                'menu_class' => 'o-footer__list',
                'container' => false
            ]);
            ?>
        </div>
        <?php
        endif;
        ?>

        <?php
        if (has_nav_menu('footer_navigation_4')) :
        ?>
        <div class="c-col--3">
            <p class="o-footer__heading">
            <?php
            $menu_name = 'footer_navigation_4';
            $locations = get_nav_menu_locations();
            $menu_id = $locations[ $menu_name ] ;
            $nav_menu = wp_get_nav_menu_object($menu_id);
            echo $nav_menu->name;
            ?>
            </p>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer_navigation_4',
                'menu_class' => 'o-footer__list',
                'container' => false
            ]);
            ?>
        </div>
        <?php
        endif;
        ?>

    </div>

    <div class="c-grid">
        <div class="c-col--9">
            &copy; <?php echo date('Y') ?>
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
