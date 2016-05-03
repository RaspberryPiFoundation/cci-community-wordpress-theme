<div class="o-hero">
    <div class="o-hero__body">
        <h1 class="o-hero__title"><?php the_field('page_title'); ?></h1>
        <?php if ( get_field('page_intro') ): ?>
        <p class="o-hero__subtitle c-lede"><?php the_field('page_intro'); ?></p>
        <?php endif; ?>
    </div>
</div>
