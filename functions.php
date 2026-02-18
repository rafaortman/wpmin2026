<?php

    require_once get_template_directory() . '/includes/carbon-fields.php';

    function theme_setup(){
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails', ['post']);
		add_post_type_support('page', 'page-attributes');
    }
    add_action('after_setup_theme','theme_setup');

	add_action('init', function () {
		remove_post_type_support('page', 'editor');
	});

    function theme_enqueue_assets(){
        wp_enqueue_style('swiper-css',get_template_directory_uri().'/swiper/swiper.css',[]);
        wp_enqueue_style('poppins-font','https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,700;1,400;1,700&display=swap',[],null);
        wp_enqueue_style('theme-style',get_template_directory_uri().'/style.css',[],time());
		wp_enqueue_script('swiper-js', get_template_directory_uri() . '/swiper/swiper.js', [], '6.9.1', true);
        wp_enqueue_script('theme-scripts',get_template_directory_uri().'/app.js',[],time(),true);
    }
    add_action('wp_enqueue_scripts','theme_enqueue_assets');

	function theme_cleanup() {
		if (!is_admin() && !is_user_logged_in() && $GLOBALS['pagenow'] !== 'wp-login.php') {
			// ========================
			// REMOVER ESTILOS INLINE DO WP CORE
			// ========================
			remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles'); // global-styles-inline-css
			wp_dequeue_style('classic-theme-styles'); // classic-theme-styles-inline-css
			wp_dequeue_style('wp-block-library'); // block library
			wp_dequeue_style('wp-block-library-theme');
			wp_dequeue_style('wp-block-library-rtl');
			wp_dequeue_style('wp-components'); // Gutenberg components
			wp_deregister_style('dashicons');

			// Evita que WP injete auto-size inline nas imagens
			add_filter('wp_img_tag_add_sizes_attr', '__return_false');


			// ========================
			// REMOVE EMOJI (HEAD E FOOTER)
			// ========================
			remove_action('wp_head', 'print_emoji_detection_script', 7);
			remove_action('wp_print_scripts', 'print_emoji_detection_script', 7);
			remove_action('admin_print_scripts', 'print_emoji_detection_script');
			remove_action('wp_print_styles', 'print_emoji_styles');
			remove_action('admin_print_styles', 'print_emoji_styles');
			add_filter('emoji_svg_url', '__return_false'); // remove JSON e loader module

			// ========================
			// REMOVE LINKS E META DESNECESSÁRIOS DO HEAD
			// ========================
			remove_action('wp_head', 'wp_generator'); // meta generator
			remove_action('wp_head', 'rsd_link'); // RSD
			remove_action('wp_head', 'wlwmanifest_link'); // Windows Live Writer
			remove_action('wp_head', 'wp_shortlink_wp_head'); // shortlink
			remove_action('wp_head','rest_output_link_wp_head'); // REST API link
			remove_action('wp_head','wp_oembed_add_discovery_links'); // oEmbed links
		}
	}
	add_action('wp_enqueue_scripts', 'theme_cleanup', 100);
	add_action('init', 'theme_cleanup');
	
	add_filter('big_image_size_threshold', fn() => 1920);

