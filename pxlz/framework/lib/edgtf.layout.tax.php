<?php

/*
   Class: PxlzEdgefTaxonomyField
   A class that initializes PxlzEdgef Taxonomy Field
*/

class PxlzEdgefTaxonomyField implements iPxlzEdgefRender
{
    private $type;
    private $name;
    private $label;
    private $description;
    private $options = array();
    private $args = array();
    private $hidden_property;
    private $hidden_values = array();

    function __construct($type, $name, $label = "", $description = "", $options = array(), $args = array(), $hidden_property = "", $hidden_values = array()) {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
        $this->description = $description;
        $this->options = $options;
        $this->args = $args;
        $this->hidden_property = $hidden_property;
        $this->hidden_values = $hidden_values;
        add_filter('pxlz_edgtf_taxonomy_fields', array($this, 'addFieldForEditSave'));
    }

    public function addFieldForEditSave($names) {

        //for icon type of field add additonal icon font family based names for saving
        if ($this->type == 'icon') {
            $icons_collections = \PxlzEdgefIconCollections::get_instance()->getIconCollectionsKeys();

            foreach ($icons_collections as $icons_collection) {
                $icons_param = \PxlzEdgefIconCollections::get_instance()->getIconCollectionParamNameByKey($icons_collection);

                $names[] = $this->name . '_' . $icons_param;
            }
        }
        $names[] = $this->name;

        return $names;
    }

    public function render($factory) {
        $hidden = false;
        if (isset($_GET['tag_ID'])) {
            if (!empty($this->hidden_property)) {
                foreach ($this->hidden_values as $value) {
                    if (get_term_meta($_GET['tag_ID'], $this->hidden_property, true) == $value) {
                        $hidden = true;
                    }
                }
            }
        }
        $factory->render($this->type, $this->name, $this->label, $this->description, $this->options, $this->args, $hidden);
    }
}

abstract class PxlzEdgefTaxonomyFieldType
{
    abstract public function render($name, $label = "", $description = "", $options = array(), $args = array());
}

class PxlzEdgefTaxonomyFieldText extends PxlzEdgefTaxonomyFieldType
{
    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        if (!isset($_GET['tag_ID'])) { ?>
            <div class="form-field">
                <label for="<?php echo esc_attr($name); ?>"><?php echo esc_html($label); ?></label>
                <input type="text" name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($name); ?>" value="">
                <p class="description"><?php echo esc_html($description); ?></p>
            </div>
            <?php
        } else {
            $value = get_term_meta($_GET['tag_ID'], $name, true);
            ?>
            <tr class="form-field" <?php if ($hidden) { ?> style="display: none"<?php } ?>>
                <th scope="row" valign="top">
                    <label for="<?php echo esc_attr($name); ?>"><?php echo esc_html($label); ?></label>
                </th>
                <td>
                    <input type="text" name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($value) ? esc_attr($value) : ''; ?>">
                    <p class="description"><?php echo esc_html($description); ?></p>
                </td>
            </tr>
            <?php
        }
    }
}

class PxlzEdgefTaxonomyFieldImage extends PxlzEdgefTaxonomyFieldType
{
    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        if (!isset($_GET['tag_ID'])) { ?>
            <div class="form-field">
                <label for="<?php echo esc_attr($name); ?>"><?php echo esc_html($label); ?></label>
                <input type="hidden" name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($name); ?>" class="edgtf-tax-custom-media-url" value="">
                <div class="edgtf-tax-image-wrapper"></div>
                <p>
                    <input type="button" class="button button-secondary edgtf-tax-media-add" name="edgtf-tax-media-add" value="<?php esc_attr_e('Add Image', 'pxlz'); ?>"/>
                    <input type="button" class="button button-secondary edgtf-tax-media-remove" name="edgtf-tax-media-remove" value="<?php esc_attr_e('Remove Image', 'pxlz'); ?>"/>
                </p>
				<input type="hidden" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>" class="edgtf-tax-custom-media-url" value="">
				<?php wp_nonce_field( 'edgtf_tax_del_image_nonce', 'edgtf_tax_del_image_nonce' ); ?>
			</div>
            <?php
        } else {
            global $taxonomy;
            $image_id = get_term_meta($_GET['tag_ID'], $name, true);
            ?>
            <tr class="form-field" <?php if ($hidden) { ?> style="display: none"<?php } ?>>
                <th scope="row">
                    <label for="<?php echo esc_attr($name); ?>"><?php echo esc_html($label); ?></label>
                </th>
                <td>
                    <?php ?>
                    <input type="hidden" name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($image_id); ?>" class="edgtf-tax-custom-media-url">
                    <div class="edgtf-tax-image-wrapper">
                        <?php if ($image_id) { ?>
                            <?php echo wp_get_attachment_image($image_id, 'thumbnail'); ?>
                        <?php } ?>
                    </div>
                    <p>
                        <input type="button" class="button button-secondary edgtf-tax-media-add" name="edgtf-tax-media-add" value="<?php esc_attr_e('Add Image', 'pxlz'); ?>"/>
                        <input data-termid="<?php echo esc_html($_GET['tag_ID']); ?>" data-taxonomy="<?php echo esc_html($taxonomy); ?>" type="button" class="button button-secondary edgtf-tax-media-remove" name="edgtf-tax-media-remove" value="<?php esc_attr_e('Remove Image', 'pxlz'); ?>"/>
                    </p>
					<input type="hidden" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $image_id ); ?>" class="edgtf-tax-custom-media-url">
					<?php wp_nonce_field( 'edgtf_tax_del_image_nonce', 'edgtf_tax_del_image_nonce' ); ?>
                </td>
            </tr>
            <?php
        }
    }
}

class PxlzEdgefTaxonomyFieldSelect extends PxlzEdgefTaxonomyFieldType
{
    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        $dependence = false;
        if (isset($args["dependence"])) {
            $dependence = true;
        }

        $show = array();
        if (isset($args["show"])) {
            $show = $args["show"];
        }

        $hide = array();
        if (isset($args["hide"])) {
            $hide = $args["hide"];
        }

        $select2 = '';
        if (isset($args['select2'])) {
            $select2 = 'edgtf-select2';
        }

        if (!isset($_GET['tag_ID'])) { ?>
            <div class="form-field">
                <label for="<?php echo esc_attr($name); ?>"><?php echo esc_html($label); ?></label>
                <select
                    class="<?php echo esc_attr($select2) ?> form-control edgtf-form-element<?php if ($dependence) {
                        echo " dependence";
                    } ?>"
                    name="<?php echo esc_attr($name); ?>"
                    <?php foreach ($show as $key => $value) { ?>
                        data-show-<?php echo str_replace(' ', '', $key); ?>="<?php echo esc_attr($value); ?>"
                    <?php } ?>
                    <?php foreach ($hide as $key => $value) { ?>
                        data-hide-<?php echo str_replace(' ', '', $key); ?>="<?php echo esc_attr($value); ?>"
                    <?php } ?>
                    id="<?php echo esc_attr($name); ?>">
                    <?php if (isset($args['first_empty']) && $args['first_empty']) { ?>
                        <option selected='selected' value=""></option>
                    <?php } ?>
                    <?php foreach ($options as $key => $value) {
                        if ($key == "-1") {
                            $key = "";
                        } ?>
                        <option value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                    <?php } ?>
                </select>
                <p class="description"><?php echo esc_html($description); ?></p>
            </div>
            <?php
        } else {

            $selected_value = get_term_meta($_GET['tag_ID'], $name, true);
            ?>
            <tr class="form-field" <?php if ($hidden) { ?> style="display: none"<?php } ?>>
                <th scope="row" valign="top">
                    <label for="<?php echo esc_attr($name); ?>"><?php echo esc_html($label); ?></label>
                </th>
                <td>
                    <select name="<?php echo esc_attr($name); ?>"
                        class="<?php echo esc_attr($select2) ?> edgtf-form-element<?php if ($dependence) {
                            echo " dependence";
                        } ?>"
                        <?php foreach ($show as $key => $value) { ?>
                            data-show-<?php echo str_replace(' ', '', $key); ?>="<?php echo esc_attr($value); ?>"
                        <?php } ?>
                        <?php foreach ($hide as $key => $value) { ?>
                            data-hide-<?php echo str_replace(' ', '', $key); ?>="<?php echo esc_attr($value); ?>"
                        <?php } ?>
                        id="<?php echo esc_attr($name); ?>">
                        <option <?php if ($selected_value == "") {
                            echo "selected='selected'";
                        } ?> value=""></option>
                        <?php foreach ($options as $key => $value) {
                            if ($key == "-1") {
                                $key = "";
                            } ?>
                            <option <?php if ($selected_value == $key) {
                                echo "selected='selected'";
                            } ?> value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                        <?php } ?>
                    </select>
                    <p class="description"><?php echo esc_html($description); ?></p>
                </td>
            </tr>
            <?php
        }
    }
}

class PxlzEdgefTaxonomyFieldIcon extends PxlzEdgefTaxonomyFieldType
{
    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        $options = \PxlzEdgefIconCollections::get_instance()->getIconCollectionsEmpty();
        $icons_collections = \PxlzEdgefIconCollections::get_instance()->getIconCollectionsKeys();

        if (!isset($_GET['tag_ID'])) { ?>
            <div class="form-field">
                <label for="<?php echo esc_attr($name); ?>"><?php echo esc_html($label); ?></label>
                <select name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($name); ?>" class="dependence">
                    <?php foreach ($options as $option => $key) { ?>
                        <option value="<?php echo esc_attr($option); ?>"><?php echo esc_attr($key); ?></option>
                    <?php } ?>
                </select>
                <p class="description"><?php echo esc_html($description); ?></p>
            </div>
            <?php foreach ($icons_collections as $icons_collection) {
                $icons_param = \PxlzEdgefIconCollections::get_instance()->getIconCollectionParamNameByKey($icons_collection);
                ?>
                <div class="form-field edgt-icon-collection-holder" style="display: none" data-icon-collection="<?php echo esc_attr($icons_collection); ?>">
                    <label for="<?php echo esc_attr($name) . '_icon'; ?>"><?php esc_html_e('Icon', 'pxlz'); ?></label>
                    <select name="<?php echo esc_attr($name . '_' . $icons_param) ?>" id="<?php echo esc_attr($name . '_' . $icons_param) ?>">
                        <?php
                        $icons = \PxlzEdgefIconCollections::get_instance()->getIconCollection($icons_collection);
                        foreach ($icons->icons as $option => $key) { ?>
                            <option value="<?php echo esc_attr($option); ?>"><?php echo esc_attr($key); ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php } ?>
            <?php
        } else {
            $icon_pack = get_term_meta($_GET['tag_ID'], $name, true);
            ?>
            <tr class="form-field" <?php if ($hidden) { ?> style="display: none"<?php } ?>>
                <th scope="row">
                    <label for="<?php echo esc_attr($name); ?>"><?php echo esc_html($label); ?></label>
                </th>
                <td>
                    <select name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($name); ?>" class="dependence">
                        <?php foreach ($options as $option => $key) { ?>
                            <option value="<?php echo esc_attr($option); ?>" <?php if ($option == $icon_pack) {
                                echo 'selected';
                            } ?>><?php echo esc_attr($key); ?></option>
                        <?php } ?>
                    </select>
                    <p class="description"><?php echo esc_html($description); ?></p>
                </td>
            </tr>
            <?php foreach ($icons_collections as $icons_collection) {
                $icons_param = \PxlzEdgefIconCollections::get_instance()->getIconCollectionParamNameByKey($icons_collection);
                $style = 'display:none';
                if ($icon_pack == $icons_collection) {
                    $style = 'display:table-row';
                }
                ?>
                <tr class="form-field edgt-icon-collection-holder" style="<?php echo esc_attr($style); ?>" data-icon-collection="<?php echo esc_attr($icons_collection); ?>">
                    <th scope="row"><?php esc_html_e('Icon', 'pxlz'); ?></th>
                    <td>
                        <select name="<?php echo esc_attr($name . '_' . $icons_param) ?>" id="<?php echo esc_attr($name . '_' . $icons_param) ?>">
                            <?php
                            $icons = \PxlzEdgefIconCollections::get_instance()->getIconCollection($icons_collection);
                            $activ_icon = get_term_meta($_GET['tag_ID'], $name . '_' . $icons_param, true);
                            foreach ($icons->icons as $option => $key) { ?>
                                <option value="<?php echo esc_attr($option); ?>" <?php if ($option == $activ_icon) {
                                    echo 'selected';
                                } ?>><?php echo esc_attr($key); ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
            <?php } ?>
            <?php
        }
    }
}

class PxlzEdgefTaxonomyFieldColor extends PxlzEdgefTaxonomyFieldType
{
    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        if (!isset($_GET['tag_ID'])) { ?>
            <div class="form-field">
                <label for="<?php echo esc_attr($name); ?>"><?php echo esc_html($label); ?></label>
                <input type="text" name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($name); ?>" value="" class="edgtf-taxonomy-color-field">
                <p class="description"><?php echo esc_html($description); ?></p>
            </div>
            <?php
        } else {
            $value = get_term_meta($_GET['tag_ID'], $name, true);
            ?>
            <tr class="form-field" <?php if ($hidden) { ?> style="display: none"<?php } ?>>
                <th scope="row" valign="top">
                    <label for="<?php echo esc_attr($name); ?>"><?php echo esc_html($label); ?></label>
                </th>
                <td>
                    <input type="text" name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($value) ? esc_attr($value) : ''; ?>" class="edgtf-taxonomy-color-field">
                    <p class="description"><?php echo esc_html($description); ?></p>
                </td>
            </tr>
            <?php
        }
    }
}

class PxlzEdgefTaxonomyFieldFactory
{
    public function render($field_type, $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        switch (strtolower($field_type)) {
            case 'text':
                $field = new PxlzEdgefTaxonomyFieldText();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'image':
                $field = new PxlzEdgefTaxonomyFieldImage();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'selectblank':
                $field = new PxlzEdgefTaxonomyFieldSelect();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'icon':
                $field = new PxlzEdgefTaxonomyFieldIcon();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'color':
                $field = new PxlzEdgefTaxonomyFieldColor();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            default:
                break;
        }
    }
}
