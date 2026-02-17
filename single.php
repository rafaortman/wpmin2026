<!-- single.php -->

<?php get_header(); ?>

<main class="single">
    <article class="max680">
        <?php if ( has_post_thumbnail() ) : ?>
            <figure class="the_post_thumbnail--single">
                <?php the_post_thumbnail( 'large' ); ?>
            </figure>
        <?php endif; ?>
        <h2 class="the_title--single">
            <?php the_title() ?>
        </h2>
        <div class="the_content">
            <?php the_content() ?>
        </div>
    </article>

	<?php get_template_part('includes/menu-page-itens'); ?>
</main>

<?php get_footer(); ?>