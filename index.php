<!-- index.php --> 
<?php get_header(); ?>

<main class="index">
    <div class="max680">
        <?php 
			if ( have_posts() ) {
				echo '<h2 class="the_title">' . get_the_title( get_option('page_for_posts') ) . '</h2>'; 
				echo '<div class="the_posts">';
					while( have_posts()) : the_post(); 
						get_template_part( 'includes/post-inside-loop' ); 
					endwhile; 
				echo '</div>';
			} else {
				echo '<h2 class="the_title">' . carbon_get_theme_option('erro404_titulo') . '</h2>
				<article>' . carbon_get_theme_option('erro404_conteudo') . '
					<br><br>
					<a href="' . home_url() . '" class="btn">Página Inicial</a>
				</article>';
			}
		?>
    </div>
</main>

<?php get_footer(); ?>
