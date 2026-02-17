<!-- includes/post-inside-loop.php -->

<a class="the_permalink" href="<?php the_permalink() ?>">
	<figure class="the_post_thumbnail--thumb">
		<?php the_post_thumbnail( 'thumbnail' ); ?>
	</figure>
	<article>
		<h3>
			<?php the_title(); ?>
		</h3>
		<div class="the_excerpt">
			<?= wp_trim_words( get_the_excerpt(), 30 ) ?>
		</div>
	</article>
</a>
