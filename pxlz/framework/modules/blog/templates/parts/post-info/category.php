<div class="edgtf-post-info-category">
    <?php

    $categories_id = wp_get_post_categories(get_the_ID());
    $count = 1;
    $separator = ', ';

    foreach ($categories_id as $category_id) {
        $category_name = get_category($category_id)->name;
        $link = get_category_link($category_id);
        $color = get_term_meta($category_id, 'category_color', true);
        $background_color = get_term_meta($category_id, 'category_background_color', true);


        if ($count == count($categories_id)) {
            $separator = '';
        }


        $inline_style = '';
        if ($color !== '' || $background_color !== '') {
            $inline_style .= 'style=';
            $inline_style .= ($color !== '') ? 'color:' . $color . ';' : '';
            $inline_style .= ($background_color !== '') ? 'background-color:' . $background_color : '';
        }

        echo '<a href="' . esc_url($link) . '" ' . esc_attr($inline_style) . '>';
        echo '<span class="edgtf-category-text">';
        echo esc_attr($category_name);
        echo '</span>'; //close category text
        echo '<div class="edgtf-category-cover">';
        echo '<span class="edgtf-category-text edgtf-category-cover-text">';
        echo esc_attr($category_name);
        echo '</span>'; //close category cover text
        echo '<div class="edgtf-category-cover-bgrnd"></div>';
        echo '</div>'; //close category cover div
        echo '</a>';
        echo esc_attr($separator);

        $count++;
    }

    ?>

</div>