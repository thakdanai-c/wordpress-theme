<?php
$image_proportion = pxlz_edgtf_get_meta_field_intersect('blog_list_featured_image_proportion', pxlz_edgtf_get_page_id());
$image_proportion_value = get_post_meta(get_the_ID(), 'edgtf_blog_masonry_gallery_' . $image_proportion . '_dimensions_meta', true);

if (isset($image_proportion_value) && $image_proportion_value !== '') {
    $size = $image_proportion_value !== '' ? $image_proportion_value : 'default';
    $post_classes[] = 'edgtf-post-size-' . $size;
} else {
    $size = 'default';
    $post_classes[] = 'edgtf-post-size-default';
}
if ($image_proportion == 'original') {
    $part_params['image_size'] = 'full';
} else {
    switch ($size):
        case 'default':
            $part_params['image_size'] = 'pxlz_edgtf_square';
            break;
        case 'large-width':
            $part_params['image_size'] = 'pxlz_edgtf_landscape';
            break;
        case 'large-height':
            $part_params['image_size'] = 'pxlz_edgtf_portrait';
            break;
        case 'large-width-height':
            $part_params['image_size'] = 'pxlz_edgtf_huge';
            break;
        default:
            $part_params['image_size'] = 'pxlz_edgtf_square';
            break;
    endswitch;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <?php pxlz_edgtf_get_module_template_part('templates/parts/media', 'blog', '', $part_params); ?>
    <div class="edgtf-post-info">
        <?php pxlz_edgtf_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
        <?php pxlz_edgtf_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
        <div class="edgtf-post-info-inner">
            <?php pxlz_edgtf_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
            <?php pxlz_edgtf_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
        </div>
    </div>
</article>