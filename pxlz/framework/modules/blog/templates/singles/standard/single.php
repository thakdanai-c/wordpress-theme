<?php

pxlz_edgtf_get_single_post_format_html($blog_single_type);

do_action('pxlz_edgtf_after_article_content');

pxlz_edgtf_get_module_template_part('templates/parts/single/author-info', 'blog');

pxlz_edgtf_get_module_template_part('templates/parts/single/related-posts', 'blog', '', $single_info_params);

pxlz_edgtf_get_module_template_part('templates/parts/single/comments', 'blog');

pxlz_edgtf_get_module_template_part('templates/parts/single/single-navigation', 'blog');