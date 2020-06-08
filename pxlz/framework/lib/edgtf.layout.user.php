<?php

/*
   Class: PxlzEdgefUserField
   A class that initializes PxlzEdgef User Field
*/

class PxlzEdgefUserField implements iPxlzEdgefRender
{
    private $type;
    private $name;
    private $label;
    private $description;
    private $options = array();
    private $args = array();

    function __construct($type, $name, $label = "", $description = "", $options = array(), $args = array()) {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
        $this->description = $description;
        $this->options = $options;
        $this->args = $args;
        add_filter('pxlz_edgtf_user_fields', array($this, 'addFieldForEditSave'));
    }

    public function addFieldForEditSave($names) {

        $names[] = $this->name;

        return $names;
    }

    public function render($factory) {
        $factory->render($this->type, $this->name, $this->label, $this->description, $this->options, $this->args);
    }
}

abstract class PxlzEdgefUserFieldType
{
    abstract public function render($name, $label = "", $description = "", $options = array(), $args = array());
}

class PxlzEdgefUserFieldText extends PxlzEdgefUserFieldType
{
    public function render($name, $label = "", $description = "", $options = array(), $args = array()) {

        $value = get_user_meta($_GET['user_id'], $name, true);
        ?>
        <tr>
            <th>
                <label for="<?php echo esc_attr($name); ?>"><?php echo esc_html($label); ?></label>
            </th>
            <td>
                <input type="text" name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($value) ? esc_attr($value) : ''; ?>" class="regular-text">
                <p class="description"><?php echo esc_html($description); ?></p>
            </td>
        </tr>
        <?php
    }
}

class PxlzEdgefUserFieldSelect extends PxlzEdgefTaxonomyFieldType
{
    public function render($name, $label = "", $description = "", $options = array(), $args = array()) {
        $selected_value = get_user_meta($_GET['user_id'], $name, true); ?>
        <tr>
            <th>
                <label for="<?php echo esc_attr($name); ?>"><?php echo esc_html($label); ?></label>
            </th>
            <td>
                <select name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($name); ?>">
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

/*
   Class: PxlzEdgefUserGroup
   A class that initializes Edge User Group
*/

class PxlzEdgefUserGroup implements iPxlzEdgefLayoutNode, iPxlzEdgefRender
{
    public $children;
    public $title;
    public $description;

    function __construct($title_label = "", $description = "") {
        $this->children = array();
        $this->title = $title_label;
        $this->description = $description;
    }

    public function hasChidren() {
        return (count($this->children) > 0) ? true : false;
    }

    public function getChild($key) {
        return $this->children[$key];
    }

    public function addChild($key, $value) {
        $this->children[$key] = $value;
    }

    public function render($factory) { ?>
        <h2><?php echo esc_html($this->title); ?></h2>
        <table class="form-table">
            <tbody>
            <?php foreach ($this->children as $child) {
                $this->renderChild($child, $factory);
            } ?>
            </tbody>
        </table>
        <?php
    }

    public function renderChild(iPxlzEdgefRender $child, $factory) {
        $child->render($factory);
    }
}

class PxlzEdgefUserFieldFactory
{
    public function render($field_type, $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        switch (strtolower($field_type)) {
            case 'text':
                $field = new PxlzEdgefUserFieldText();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'select':
                $field = new PxlzEdgefUserFieldSelect();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            default:
                break;
        }
    }
}
