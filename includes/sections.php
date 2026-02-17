<!-- includes/sections.php -->

<?php foreach( $sections as $section ) : ?>
    <section 
        id="<?= sanitize_title( $section[ 'titulo' ] ) ?>"
        class="section<?= ( $section[ 'bg' ] ) ? ' section--bg' : '' ?>"
        <?= ( $section[ 'bg' ] ) ? 'style="background-image:url(' . $section[ 'bg' ] . ')"' : '' ?>
    >
        <article class="max680">
            <?php if ( $section[ 'titulo' ] ) : ?>
                <h2 id="<?= sanitize_title( $section[ 'titulo' ] ) ?>--anchor"  class="the_title">
                    <?= $section[ 'titulo' ] ?>
                </h2>
            <?php endif; ?>
    
            <?php if ( $section[ 'conteudo' ] ) : ?>
                <div class="the_content <?= ( $section[ 'accordion' ] ) ? 'expansivel' : '' ?>">
                    <?= apply_filters( 'the_content', $section[ 'conteudo' ] ) ?>
                </div>
            <?php endif; ?>
			
			<?php if ( $section[ 'subitens' ] ) : ?>
                <div class="subitens">
					<?php foreach ($section[ 'subitens' ] as $subitem ) : ?>
						<?php 
							$subitem_titulo = $subitem[ 'titulo' ]; 
							$subitem_conteudo = apply_filters( 'the_content', $subitem[ 'conteudo' ] );
						?>
						<div class="subitem">
							<?= $subitem_titulo ? '<div class="subitem-titulo">' . $subitem_titulo . '</div>' : '' ?>
							<?= $subitem_conteudo ? '<div class="subitem-conteudo">' . $subitem_conteudo . '</div>' : '' ?>
						</div>
					<?php endforeach; ?>
				</div>
            <?php endif; ?>
        </article>
	
		<?php if ( $section[ 'imagem' ] ) : ?>
            <figure class="the_post_thumbnail">
                <img src="<?= wp_get_attachment_image_url( $section[ 'imagem' ],'url') ?>">
            </figure>
        <?php endif ?>
    </section>

<?php endforeach; ?>
