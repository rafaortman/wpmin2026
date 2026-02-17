<!-- header.php -->

<?php
    $share_img = carbon_get_theme_option('share_img');

    if ( $share_img ) {
        $share_img_url = wp_get_attachment_url($share_img);
        $share_img_meta = wp_get_attachment_metadata($share_img);
        $share_img_width  = $share_img_meta['width'];
        $share_img_height = $share_img_meta['height'];
    }
?>

<!doctype html>
<html <?php language_attributes(); ?> style="margin-top:0 !important">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <meta property="og:title" content="<?= get_bloginfo('name') ?>">
    <meta property="og:description" content="<?= get_bloginfo('description') ?>">
    <meta property="og:image" content="<?= $share_img_url ?>">
    <meta property="og:image:width" content="<?= $share_img_width ?>">
    <meta property="og:image:height" content="<?= $share_img_height ?>">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= get_bloginfo('name') ?>">
    <meta name="twitter:description" content="<?= get_bloginfo('description') ?>">
    <meta name="twitter:image" content="<?= $share_img_url ?>">

    <link rel="icon" type="image/png" href="<?= carbon_get_theme_option('icone') ?>">

    <?php wp_head(); ?>
</head>

<body>

    <?= do_shortcode( '[gtranslate]' ); ?>
    
    <header id="site_header">
        <div class="header-wrapper">
            <h1>
                <a href="<?php bloginfo('url'); ?>">
                    <img src="<?= carbon_get_theme_option('logo') ?>" alt="<?php bloginfo('name'); ?>">
                </a>
                <span class="sr-only">
                    <?php bloginfo('name'); ?>
                </span>
            </h1>
    
			<nav class="menu-container">
				<?php get_template_part('includes/menu-page-itens'); ?>
			</nav>
    
            <button id="menuBt" class="toggle-bt">
                <span class="stripes">
                    <span class="stripe stripe-top"></span>
                    <span class="stripe stripe-mid stripe-x1"></span>
                    <span class="stripe stripe-mid stripe-x2"></span>
                    <span class="stripe stripe-bot"></span>
                </span>
            </button>
        </div>
    </header>

    