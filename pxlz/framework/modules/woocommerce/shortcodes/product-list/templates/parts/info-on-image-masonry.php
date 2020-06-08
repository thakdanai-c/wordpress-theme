<?php
$item_classes = $this_object->getItemClasses($params);
$shader_styles = $this_object->getShaderStyles($params);
?>
<div class="edgtf-pli edgtf-item-space <?php echo esc_attr($item_classes); ?>">
    <div class="edgtf-pli-inner">

        <?php if (has_post_thumbnail()): ?>

            <div class="edgtf-pli-image">
                <div class="edgtf-pli-image-overlay" style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url()); ?>)"></div>

                <?php
                $product = pxlz_edgtf_return_woocommerce_global_variable();

                if ($product->is_on_sale()) { ?>
                    <span class="edgtf-<?php echo esc_attr($class_name); ?>-onsale"><?php esc_html_e('SALE', 'pxlz'); ?></span>
                <?php } ?>

                <?php if (!$product->is_in_stock()) { ?>
                    <span class="edgtf-<?php echo esc_attr($class_name); ?>-out-of-stock"><?php esc_html_e('OUT OF STOCK', 'pxlz'); ?></span>
                <?php } ?>

            </div>

        <?php endif; ?>

        <div class="edgtf-pli-text" <?php echo pxlz_edgtf_get_inline_style($shader_styles); ?>>
            <div class="edgtf-pli-text-outer">
                <div class="edgtf-pli-text-inner">
                    <?php pxlz_edgtf_get_module_template_part('templates/parts/title', 'woocommerce', '', $params); ?>

                    <?php pxlz_edgtf_get_module_template_part('templates/parts/category', 'woocommerce', '', $params); ?>

                    <?php pxlz_edgtf_get_module_template_part('templates/parts/excerpt', 'woocommerce', '', $params); ?>

                    <?php pxlz_edgtf_get_module_template_part('templates/parts/rating', 'woocommerce', '', $params); ?>

                    <?php pxlz_edgtf_get_module_template_part('templates/parts/price', 'woocommerce', '', $params); ?>

                    <?php pxlz_edgtf_get_module_template_part('templates/parts/add-to-cart', 'woocommerce', '', $params); ?>
                </div>
            </div>
        </div>
        <a class="edgtf-pli-link" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
    </div>
</div>