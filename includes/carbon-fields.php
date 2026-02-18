<?php  
    use Carbon_Fields\Container;
    use Carbon_Fields\Field;
    
// Site logo
    add_action( 'carbon_fields_register_fields', 'site_logo' );
    function site_logo() {
        Container::make( 'theme_options', 'Site branding' )
        ->add_fields( array(
            Field::make( 'image', 'logo', 'Logo' )->set_value_type('url'),
            Field::make( 'image', 'icone', 'Favicon' )->set_value_type('url'),
            Field::make( 'image', 'share_img', 'Share image' ) 
        ) );
    }

// Site footer
    add_action( 'carbon_fields_register_fields', 'site_footer' );
    function site_footer() {
        Container::make( 'theme_options', 'Site footer' )
        ->add_fields( array(
            Field::make( 'rich_text', 'site_footer', 'Site Footer' )
        ) );
    }

// Página inicial
    add_action( 'carbon_fields_register_fields', 'home_fields' );
    function home_fields() {
        $front_page_id = get_option( 'page_on_front' );
        Container::make( 'post_meta', 'Slides' )
            ->where( 'post_id', '=', $front_page_id ) 
            ->add_fields( array(
                Field::make( 'complex', 'slides', 'Slides' )
                    ->set_layout( 'tabbed-horizontal' )
                    ->add_fields( array(
                        Field::make( 'text', 'titulo', 'Título' ),
                        Field::make( 'rich_text', 'conteudo', 'Conteúdo' ),
                        Field::make( 'text', 'link', 'Link' ),
                        Field::make( 'image', 'imagem', 'Imagem' )
                    ) ),
            ) );
    }

// Page Sections
    add_action( 'carbon_fields_register_fields', 'page_sections' );
    function page_sections() {
        $front_page_id = get_option( 'page_on_front' );
        Container::make( 'post_meta', 'Sections' )
            ->where( 'post_type', '=', 'page' ) 
            ->add_fields( array(
                Field::make( 'complex', 'sections', 'Sections' )
                    ->set_layout( 'tabbed-horizontal' )
                    ->add_fields( array(
                        Field::make( 'text', 'titulo', 'Título' ),
                        Field::make( 'rich_text', 'conteudo', 'Conteúdo' ),
						Field::make( 'complex', 'subitens', 'Subitens' )
							->set_layout( 'tabbed-horizontal' )
							->add_fields( array(
								Field::make( 'text', 'titulo', 'Título' ),
								Field::make( 'rich_text', 'conteudo', 'Conteúdo' ),
						) ),
                        Field::make( 'image', 'imagem', 'Imagem' ),
                        Field::make( 'image', 'bg', 'Background' )->set_value_type( 'url' ),
                        // Field::make( 'checkbox', 'accordion', 'Conteúdo expansível' ),
						
                    ) ),
            ) );
    }
?>
