<!-- page.php -->

<?php get_header(); ?>

<main class="page">
<?php 

	$sections = carbon_get_the_post_meta( 'sections' );

	if ( $sections ) {
		require get_template_directory() . '/includes/sections.php';			
	}

?>
</main>

<?php get_footer(); ?>