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
        wp_enqueue_style('theme-style',get_template_directory_uri().'/style.css',[],time());
        wp_enqueue_style('swiper-css',get_template_directory_uri().'/swiper/swiper.css',[],time());
        wp_enqueue_style('poppins-font','https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,700;1,400;1,700&display=swap',[],null);
        wp_enqueue_script('swiper-js',get_template_directory_uri().'/swiper/swiper.js',[],time(),true);
        wp_enqueue_script('theme-scripts',get_template_directory_uri().'/app.js',[],time(),true);
    }
    add_action('wp_enqueue_scripts','theme_enqueue_assets');

    function theme_cleanup(){
        remove_action('wp_head','print_emoji_detection_script',7);
        remove_action('admin_print_scripts','print_emoji_detection_script');
        remove_action('wp_print_styles','print_emoji_styles');
        remove_action('admin_print_styles','print_emoji_styles');
        wp_deregister_style('wp-block-library');
        wp_dequeue_style('wp-block-library');
        wp_deregister_style('wp-components');
        
        if(!is_admin()&&!is_user_logged_in()){
            wp_deregister_style('dashicons');
        }
    }
    add_action('wp_enqueue_scripts','theme_cleanup',100);
	
	add_filter('big_image_size_threshold', fn() => 1920);

