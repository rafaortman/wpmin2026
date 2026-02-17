<!-- menu-page-itens.php -->

<?php
$pages = get_pages([
    'post_status' => 'publish',
    'sort_column' => 'menu_order',
    'sort_order'  => 'ASC',
]);

$front_page_id = (int) get_option('page_on_front');
$posts_page_id = (int) get_option('page_for_posts');

if ($pages) {
    echo '<ul class="menu">';

    foreach ($pages as $page) {

        // bypass front page
        if ($page->ID === $front_page_id) {
            continue;
        }

        // page for posts só entra se houver posts
        if ($page->ID === $posts_page_id) {
            $has_posts = get_posts([
                'post_type'      => 'post',
                'post_status'    => 'publish',
                'posts_per_page' => 1,
                'fields'         => 'ids',
            ]);

            if (empty($has_posts)) {
                continue;
            }
        }
		
		$sections = carbon_get_post_meta($page->ID, 'sections');

        echo '<li ' . (!empty($sections) ? 'class="menu-item-has-children"' : 'menu-item') . ' >';
        echo '<a href="'.get_permalink($page->ID).'">';
        echo esc_html($page->post_title);
        echo '</a>';
        

        if (!empty($sections)) {
            echo '<ul class="sub-menu">';

            foreach ($sections as $section) {
                if (empty($section['titulo'])) continue;

                $slug = sanitize_title($section['titulo']);

                echo '<li>';
                echo '<a href="'.get_permalink($page->ID).'#'.$slug.'">';
                echo esc_html($section['titulo']);
                echo '</a>';
                echo '</li>';
            }

            echo '</ul>';
        }

        echo '</li>';
    }

    echo '</ul>';
}
