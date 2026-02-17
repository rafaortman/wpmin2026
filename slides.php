<!-- includes/slides.php -->
     
<section id="slides" class="swiper">
    <div class="swiper-wrapper">
        <?php foreach( $slides as $slide ) : ?>
            <div class="swiper-slide">
                <?= ( $slide[ 'link' ] ) ? '<a class="slide-link" href="' . $slide['link'] . '">' : '' ?>
                    <div class="slide-wrapper">
                        <div class="slide-texto">
                            <?= ( $slide[ 'titulo' ] ) ? '<h2>' . $slide[ 'titulo' ] . '</h2>' : ''; ?>
                            <div class="slide-conteudo">
                                <?= apply_filters( 'the_content', $slide[ 'conteudo' ] ); ?>
                            </div>
                        </div>
                        <figure <?= ( $slide[ 'imagem' ]) ? 'style="background-image:url(' . wp_get_attachment_image_url( $slide[ 'imagem' ],'url') . ')"' : ''; ?>></figure>
                    </div>
                <?= ( $slide[ 'link' ]) ? '</a>' : '' ?>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="swiper-pagination"></div>
</section>