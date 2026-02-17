<!-- index.php --> 
<?php get_header(); ?>

<main class="index">
    <div class="max680">
        <h2 class="the_title">
            <?= get_the_title( get_option('page_for_posts') ); ?>
        </h2>
        <?php 
			if ( have_posts() ) {
				echo '<div class="the_posts">';
					while( have_posts()) : the_post(); 
						get_template_part( 'includes/post-inside-loop' ); 
					endwhile; 
				echo '</div>';
			} 
		?>
    </div>
</main>

<?php get_footer(); ?>

