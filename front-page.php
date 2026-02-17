<!-- front-page.php -->

<?php get_header(); ?>

<main class="front-page">
<?php 
	$slides = carbon_get_the_post_meta( 'slides' );
	if ( $slides ) {
		require get_template_directory() . '/includes/slides.php';
	}

	$posts = get_posts([
		'post_type'      => 'post',
		'posts_per_page' => 3
	]);

	if (!empty($posts)) :
?>
	<section id="artigos" class="section">
		<article class="max680">
			<h2 id="artigos--anchor" class="the_title">Artigos</h2>

			<div id="artigos_swiper" class="the_posts swiper">
				<div class="swiper-wrapper">

					<?php foreach ($posts as $post) : ?>
						<div class="swiper-slide">
							<?php require get_template_directory() . '/includes/post-inside-loop.php'; ?>
						</div>
					<?php endforeach; wp_reset_postdata(); ?>

				</div>
				<div class="swiper-pagination"></div>
			</div>
		</article>
	</section>
<?php endif; ?>

<?php
	$servicos_page		= get_page_by_title('servicos');
	$servicos_page_id 	= $servicos_page->ID;
	$sections 			= carbon_get_post_meta($servicos_page_id, 'sections'); 

	if (!empty($sections)) :
		$count = count($sections);
	?>
	<section id="servicos" class="section">
		<article class="max680">
			<h2 id="servicos--anchor" class="the_title">Serviços</h2>

			<div class="the_content">
				<ul class="grid grid-<?= $count ?>">
					<?php 
						foreach ($sections as $section) :
						$slug = sanitize_title($section['titulo']);
					?>
						<li>
							<a href="<?= get_permalink($servicos_page_id) . '#' . $slug; ?>">
								<?= $section['titulo']; ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</article>
	</section>
<?php endif; ?>

</main>

<?php get_footer(); ?>
