<?php

class PxlzEdgefFieldPortfolioFollow extends PxlzEdgefFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        $dependence = false;
        if (isset($args["dependence"])) {
            $dependence = true;
        }

        $dependence_hide_on_yes = "";
        if (isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }

        $dependence_show_on_yes = "";
        if (isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">
            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>
                <p><?php echo esc_html($description); ?></p>
            </div>
            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                    class="cb-enable<?php if (pxlz_edgtf_option_get_value($name) == "portfolio_single_follow") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('Yes', 'pxlz') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                    class="cb-disable<?php if (pxlz_edgtf_option_get_value($name) == "portfolio_single_no_follow") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('No', 'pxlz') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                    name="<?php echo esc_attr($name); ?>_portfoliofollow" value="portfolio_single_follow"<?php if (pxlz_edgtf_option_get_value($name) == "portfolio_single_follow") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_portfoliofollow" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(pxlz_edgtf_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

class PxlzEdgefFieldZeroOne extends PxlzEdgefFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        $dependence = false;
        if (isset($args["dependence"])) {
            $dependence = true;
        }

        $dependence_hide_on_yes = "";
        if (isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }

        $dependence_show_on_yes = "";
        if (isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">
            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>
                <p><?php echo esc_html($description); ?></p>
            </div>
            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                    class="cb-enable<?php if (pxlz_edgtf_option_get_value($name) == "1") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('Yes', 'pxlz') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                    class="cb-disable<?php if (pxlz_edgtf_option_get_value($name) == "0") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('No', 'pxlz') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                    name="<?php echo esc_attr($name); ?>_zeroone" value="1"<?php if (pxlz_edgtf_option_get_value($name) == "1") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_zeroone" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(pxlz_edgtf_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

class PxlzEdgefFieldImageVideo extends PxlzEdgefFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        $dependence = false;
        if (isset($args["dependence"])) {
            $dependence = true;
        }

        $dependence_hide_on_yes = "";
        if (isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }

        $dependence_show_on_yes = "";
        if (isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">
            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>
                <p><?php echo esc_html($description); ?></p>
            </div>
            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch switch-type">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                    class="cb-enable<?php if (pxlz_edgtf_option_get_value($name) == "image") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('Image', 'pxlz') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                    class="cb-disable<?php if (pxlz_edgtf_option_get_value($name) == "video") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('Video', 'pxlz') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                    name="<?php echo esc_attr($name); ?>_imagevideo" value="image"<?php if (pxlz_edgtf_option_get_value($name) == "image") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_imagevideo" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(pxlz_edgtf_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

class PxlzEdgefFieldYesEmpty extends PxlzEdgefFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        $dependence = false;
        if (isset($args["dependence"])) {
            $dependence = true;
        }

        $dependence_hide_on_yes = "";
        if (isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }

        $dependence_show_on_yes = "";
        if (isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">
            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>
                <p><?php echo esc_html($description); ?></p>
            </div>
            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                    class="cb-enable<?php if (pxlz_edgtf_option_get_value($name) == "yes") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('Yes', 'pxlz') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                    class="cb-disable<?php if (pxlz_edgtf_option_get_value($name) == "") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('No', 'pxlz') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                    name="<?php echo esc_attr($name); ?>_yesempty" value="yes"<?php if (pxlz_edgtf_option_get_value($name) == "yes") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_yesempty" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(pxlz_edgtf_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

class PxlzEdgefFieldFlagPage extends PxlzEdgefFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        $dependence = false;
        if (isset($args["dependence"])) {
            $dependence = true;
        }

        $dependence_hide_on_yes = "";
        if (isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }

        $dependence_show_on_yes = "";
        if (isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">
            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>
                <p><?php echo esc_html($description); ?></p>
            </div>
            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                    class="cb-enable<?php if (pxlz_edgtf_option_get_value($name) == "page") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('Yes', 'pxlz') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                    class="cb-disable<?php if (pxlz_edgtf_option_get_value($name) == "") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('No', 'pxlz') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                    name="<?php echo esc_attr($name); ?>_flagpage" value="page"<?php if (pxlz_edgtf_option_get_value($name) == "page") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_flagpage" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(pxlz_edgtf_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

class PxlzEdgefFieldFlagPost extends PxlzEdgefFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        $dependence = false;
        if (isset($args["dependence"])) {
            $dependence = true;
        }

        $dependence_hide_on_yes = "";
        if (isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }

        $dependence_show_on_yes = "";
        if (isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">
            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>
                <p><?php echo esc_html($description); ?></p>
            </div>
            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                    class="cb-enable<?php if (pxlz_edgtf_option_get_value($name) == "post") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('Yes', 'pxlz') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                    class="cb-disable<?php if (pxlz_edgtf_option_get_value($name) == "") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('No', 'pxlz') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                    name="<?php echo esc_attr($name); ?>_flagpost" value="post"<?php if (pxlz_edgtf_option_get_value($name) == "post") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_flagpost" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(pxlz_edgtf_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

class PxlzEdgefFieldFlagMedia extends PxlzEdgefFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        $dependence = false;
        if (isset($args["dependence"])) {
            $dependence = true;
        }

        $dependence_hide_on_yes = "";
        if (isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }

        $dependence_show_on_yes = "";
        if (isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">
            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>
                <p><?php echo esc_html($description); ?></p>
            </div>
            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                    class="cb-enable<?php if (pxlz_edgtf_option_get_value($name) == "attachment") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('Yes', 'pxlz') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                    class="cb-disable<?php if (pxlz_edgtf_option_get_value($name) == "") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('No', 'pxlz') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                    name="<?php echo esc_attr($name); ?>_flagmedia" value="attachment"<?php if (pxlz_edgtf_option_get_value($name) == "attachment") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_flagmedia" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(pxlz_edgtf_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

class PxlzEdgefFieldFlagPortfolio extends PxlzEdgefFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        $dependence = false;
        if (isset($args["dependence"])) {
            $dependence = true;
        }

        $dependence_hide_on_yes = "";
        if (isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }

        $dependence_show_on_yes = "";
        if (isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">
            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>
                <p><?php echo esc_html($description); ?></p>
            </div>
            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                    class="cb-enable<?php if (pxlz_edgtf_option_get_value($name) == "portfolio_page") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('Yes', 'pxlz') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                    class="cb-disable<?php if (pxlz_edgtf_option_get_value($name) == "") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('No', 'pxlz') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                    name="<?php echo esc_attr($name); ?>_flagportfolio" value="portfolio_page"<?php if (pxlz_edgtf_option_get_value($name) == "portfolio_page") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_flagportfolio" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(pxlz_edgtf_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

class PxlzEdgefFieldFlagProduct extends PxlzEdgefFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        $dependence = false;
        if (isset($args["dependence"])) {
            $dependence = true;
        }

        $dependence_hide_on_yes = "";
        if (isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }

        $dependence_show_on_yes = "";
        if (isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">
            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>
                <p><?php echo esc_html($description); ?></p>
            </div>
            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                    class="cb-enable<?php if (pxlz_edgtf_option_get_value($name) == "product") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('Yes', 'pxlz') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                    class="cb-disable<?php if (pxlz_edgtf_option_get_value($name) == "") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('No', 'pxlz') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                    name="<?php echo esc_attr($name); ?>_flagproduct" value="product"<?php if (pxlz_edgtf_option_get_value($name) == "product") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_flagproduct" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(pxlz_edgtf_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

class PxlzEdgefFieldRange extends PxlzEdgefFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        $range_min = 0;
        $range_max = 1;
        $range_step = 0.01;
        $range_decimals = 2;
        if (isset($args["range_min"])) {
            $range_min = $args["range_min"];
        }

        if (isset($args["range_max"])) {
            $range_max = $args["range_max"];
        }

        if (isset($args["range_step"])) {
            $range_step = $args["range_step"];
        }

        if (isset($args["range_decimals"])) {
            $range_decimals = $args["range_decimals"];
        }
        ?>

        <div class="edgtf-page-form-section">
            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>
                <p><?php echo esc_html($description); ?></p>
            </div>
            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="edgtf-slider-range-wrapper">
                                <div class="form-inline">
                                    <input type="text" class="form-control edgtf-form-element edgtf-form-element-xsmall pull-left edgtf-slider-range-value" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(pxlz_edgtf_option_get_value($name)); ?>"/>
                                    <div class="edgtf-slider-range small" data-step="<?php echo esc_attr($range_step); ?>" data-min="<?php echo esc_attr($range_min); ?>" data-max="<?php echo esc_attr($range_max); ?>" data-decimals="<?php echo esc_attr($range_decimals); ?>" data-start="<?php echo esc_attr(pxlz_edgtf_option_get_value($name)); ?>"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

class PxlzEdgefFieldRangeSimple extends PxlzEdgefFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) { ?>

        <div class="col-lg-3" id="edgtf_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
            <div class="edgtf-slider-range-wrapper">
                <div class="form-inline">
                    <em class="edgtf-field-description"><?php echo esc_html($label); ?></em>
                    <input type="text" class="form-control edgtf-form-element edgtf-form-element-xxsmall pull-left edgtf-slider-range-value" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(pxlz_edgtf_option_get_value($name)); ?>"/>
                    <div class="edgtf-slider-range xsmall" data-step="0.01" data-max="1" data-start="<?php echo esc_attr(pxlz_edgtf_option_get_value($name)); ?>"></div>
                </div>
            </div>
        </div>
        <?php
    }
}

class PxlzEdgefFieldRadio extends PxlzEdgefFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        $checked = $value = "";
        $value_saved = pxlz_edgtf_option_has_value($name);
        if ($value_saved) {
            $value = pxlz_edgtf_option_get_value($name);
            $checked = $value == 'yes' ? "checked" : "";
        }

        $html = '<input type="radio" name="' . $name . '" value="' . $value . '" ' . $checked . ' /> ' . $label . '<br />';
        echo wp_kses($html, array(
            'input' => array(
                'type' => true,
                'name' => true,
                'value' => true,
                'checked' => true
            ),
            'br' => true
        ));
    }
}

class PxlzEdgefFieldRadioGroup extends PxlzEdgefFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        $dependence = isset($args["dependence"]) && $args["dependence"] ? true : false;
        $show = !empty($args["show"]) ? $args["show"] : array();
        $hide = !empty($args["hide"]) ? $args["hide"] : array();

        $use_images = isset($args["use_images"]) && $args["use_images"] ? true : false;
        $hide_labels = isset($args["hide_labels"]) && $args["hide_labels"] ? true : false;
        $hide_radios = $use_images ? 'display: none' : '';
        $checked_value = pxlz_edgtf_option_get_value($name);
        ?>

        <div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>" <?php if ($hidden) { ?> style="display: none"<?php } ?>>
            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>
                <p><?php echo esc_html($description); ?></p>
            </div>
            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if (is_array($options) && count($options)) { ?>
                                <div class="edgtf-radio-group-holder <?php if ($use_images) echo "with-images"; ?>">
                                    <?php foreach ($options as $key => $atts) {
                                        $selected = false;
                                        if ($checked_value == $key) {
                                            $selected = true;
                                        }

                                        $show_val = "";
                                        $hide_val = "";
                                        if ($dependence) {
                                            if (array_key_exists($key, $show)) {
                                                $show_val = $show[$key];
                                            }

                                            if (array_key_exists($key, $hide)) {
                                                $hide_val = $hide[$key];
                                            }
                                        }
                                        ?>
                                        <label class="radio-inline">
                                            <input <?php echo pxlz_edgtf_get_inline_attr($show_val, 'data-show'); ?> <?php echo pxlz_edgtf_get_inline_attr($hide_val, 'data-hide'); ?>
                                                <?php if ($selected) echo "checked"; ?> <?php pxlz_edgtf_inline_style($hide_radios); ?>
                                                type="radio" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($key); ?>"
                                                <?php if ($dependence) pxlz_edgtf_class_attribute("dependence"); ?>> <?php if (!empty($atts["label"]) && !$hide_labels) echo esc_attr($atts["label"]); ?>

                                            <?php if ($use_images) { ?>
                                                <img title="<?php if (!empty($atts["label"])) echo esc_attr($atts["label"]); ?>" src="<?php echo esc_url($atts['image']); ?>" alt="<?php echo esc_attr("$key image") ?>"/>
                                            <?php } ?>
                                        </label>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

class PxlzEdgefFieldCheckBoxGroup extends PxlzEdgefFieldType
{

    public function render($name, $label = '', $description = '', $options = array(), $args = array(), $hidden = false) {
        if (!(is_array($options) && count($options))) {
            return;
        }

        $dependence = isset($args["dependence"]) && $args["dependence"] ? true : false;
        $show = !empty($args["show"]) ? $args["show"] : array();

        $saved_value = pxlz_edgtf_option_get_value($name);

        ?>

        <div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>
                <p><?php echo esc_html($description); ?></p>
            </div>
            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="edgtf-checkbox-group-holder">
                                <div class="checkbox-inline" style="display: none">
                                    <label>
                                        <input checked type="checkbox" value="" name="<?php echo esc_attr($name . '[]'); ?>">
                                    </label>
                                </div>
                                <?php foreach ($options as $option_key => $option_label) : ?>
                                    <?php
                                    if ($option_label !== '') {
                                        $i = 1;
                                        $checked = is_array($saved_value) && in_array($option_key, $saved_value);
                                        $checked_attr = $checked ? 'checked' : '';

                                        $show_val = "";
                                        if ($dependence) {
                                            if (array_key_exists($option_key, $show)) {
                                                $show_val = $show[$option_key];
                                            }
                                        }
                                        ?>
                                        <div class="checkbox-inline">
                                            <label>
                                                <input <?php echo pxlz_edgtf_get_inline_attr($show_val, 'data-show'); ?>
                                                    <?php echo esc_attr($checked_attr); ?> type="checkbox"
                                                    id="<?php echo esc_attr($option_key) . '-' . $i; ?>"
                                                    value="<?php echo esc_attr($option_key); ?>" name="<?php echo esc_attr($name . '[]'); ?>"
                                                    <?php if ($dependence) pxlz_edgtf_class_attribute("dependence multiselect"); ?>>
                                                <label for="<?php echo esc_attr($option_key) . '-' . $i; ?>"><?php echo esc_html($option_label); ?></label>
                                            </label>
                                        </div>
                                        <?php
                                        $i++;
                                    }
                                endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

class PxlzEdgefFieldCheckBox extends PxlzEdgefFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        $checked = "";

        if ('1' === pxlz_edgtf_option_get_value($name)) {
            $checked = "checked";
        }

        $html = '<div class ="edgtf-page-form-section">';
        $html .= '<div class="edgtf-section-content">';
        $html .= '<div class="container-fluid">';
        $html .= '<div class="row">';
        $html .= '<div class="col-lg-3">';
        $html .= '<input id="' . $name . '" class="edgtf-single-checkbox-field" type="checkbox" name="' . $name . '" value="1" ' . $checked . ' />';
        $html .= '<label for="' . $name . '"> ' . $label . '</label><br />';
        $html .= '<input class="edgtf-checkbox-single-hidden" type="hidden" name="' . $name . '" value="0"/>';
        $html .= '</div>'; //close col-lg-3
        $html .= '</div>'; //close row
        $html .= '</div>'; //close container-fluid
        $html .= '</div>'; //close edgtf-section-content
        $html .= '</div>'; //close edgtf-page-form-section

        echo wp_kses($html, array(
            'input' => array(
                'type' => true,
                'id' => true,
                'name' => true,
                'value' => true,
                'checked' => true,
                'class' => true,
                'disabled' => true
            ),
            'div' => array(
                'class' => true
            ),
            'br' => true,
            'label' => array(
                'for' => true
            )
        ));
    }
}

class PxlzEdgefFieldDate extends PxlzEdgefFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array()) {
        $col_width = 2;
        if (isset($args["col_width"]))
            $col_width = $args["col_width"];

        $suffix = !empty($args['suffix']) ? $args['suffix'] : false;

        $class = '';
        $data_string = '';
        if (!empty($repeat)) {
            if (array_key_exists('index', $repeat)) {
                $id = $name . '-' . $repeat['index'];
            } else {
                $id = $name;
            }
            if (array_key_exists('name', $repeat)) {
                $name = $repeat['name'];
            }
            $name .= '[]';
            $value = $repeat['value'];
            $class = 'edgtf-repeater-field';
        } else {
            $id = $name;
            $value = pxlz_edgtf_option_get_value($name);
        }

        if ($label === '' && $description === '') {
            $class .= ' edgtf-no-description';
        }

        if (isset($args['custom_class']) && $args['custom_class'] != '') {
            $class .= ' ' . $args['custom_class'];
        }

        if (isset($args['input-data']) && $args['input-data'] != '') {
            foreach ($args['input-data'] as $data_key => $data_value) {
                $data_string .= $data_key . '=' . $data_value;
                $data_string .= ' ';
            }
        }
        ?>

        <div class="edgtf-page-form-section <?php echo esc_attr($class); ?>" id="edgtf_<?php echo esc_attr($id); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>
                <p><?php echo esc_html($description); ?></p>
            </div>
            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-<?php echo esc_attr($col_width); ?>">
                            <?php if ($suffix) : ?>
                            <div class="input-group">
                                <?php endif; ?>
                                <input type="text" id="edgtf_<?php echo esc_attr($id); ?>dp" class="datepicker form-control edgtf-input edgtf-form-element" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($value); ?>"/>
                                <?php if ($suffix) : ?>
                                    <div class="input-group-addon"><?php echo esc_html($args['suffix']); ?></div>
                                <?php endif; ?>
                                <?php if ($suffix) : ?>
                            </div>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

class PxlzEdgefFieldFile extends PxlzEdgefFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        $value = pxlz_edgtf_option_get_value($name);
        $has_value = pxlz_edgtf_option_has_value($name);
        ?>

        <div class="edgtf-page-form-section">


            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgtf-field-desc -->

            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="edgtf-media-uploader">
                                <div<?php if (!$has_value) { ?> style="display: none"<?php } ?>
                                    class="edgtf-media-image-holder">
                                    <img src="<?php if ($has_value) {
                                        echo esc_url(pxlz_edgtf_option_get_uploaded_file_icon($value));
                                    } ?>" alt="<?php esc_attr_e('Image thumbnail', 'pxlz'); ?>"
                                        class="edgtf-media-image img-thumbnail"/>
                                    <?php if ($has_value) { ?>
                                        <h4 class="edgtf-media-title"><?php echo pxlz_edgtf_option_get_uploaded_file_title($value) ?></h4> <?php } ?>
                                </div>
                                <div style="display: none"
                                    class="edgtf-media-meta-fields">
                                    <input type="hidden" class="edgtf-media-upload-url"
                                        name="<?php echo esc_attr($name); ?>"
                                        value="<?php echo esc_attr($value); ?>"/>
                                </div>
                                <a class="edgtf-media-upload-btn btn btn-sm btn-primary"
                                    href="javascript:void(0)"
                                    data-frame-title="<?php esc_attr_e('Select File', 'pxlz'); ?>"
                                    data-frame-button-text="<?php esc_attr_e('Select File', 'pxlz'); ?>"><?php esc_html_e('Upload', 'pxlz'); ?></a>
                                <a style="display: none;" href="javascript: void(0)"
                                    class="edgtf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'pxlz'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgtf-section-content -->

        </div>
        <?php

    }

}

class PxlzEdgefFieldFactory
{

    public function render($field_type, $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array()) {

        switch (strtolower($field_type)) {

            case 'text':
                $field = new PxlzEdgefFieldText();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'textsimple':
                $field = new PxlzEdgefFieldTextSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'textarea':
                $field = new PxlzEdgefFieldTextArea();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'textareasimple':
                $field = new PxlzEdgefFieldTextAreaSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'textareahtml':
                $field = new PxlzEdgefFieldTextAreaHtml();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'color':
                $field = new PxlzEdgefFieldColor();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'colorsimple':
                $field = new PxlzEdgefFieldColorSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'image':
                $field = new PxlzEdgefFieldImage();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'imagesimple':
                $field = new PxlzEdgefFieldImageSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'font':
                $field = new PxlzEdgefFieldFont();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'fontsimple':
                $field = new PxlzEdgefFieldFontSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'select':
                $field = new PxlzEdgefFieldSelect();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'selectblank':
                $field = new PxlzEdgefFieldSelectBlank();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'selectsimple':
                $field = new PxlzEdgefFieldSelectSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'selectblanksimple':
                $field = new PxlzEdgefFieldSelectBlankSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'yesno':
                $field = new PxlzEdgefFieldYesNo();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'yesnosimple':
                $field = new PxlzEdgefFieldYesNoSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'onoff':
                $field = new PxlzEdgefFieldOnOff();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'portfoliofollow':
                $field = new PxlzEdgefFieldPortfolioFollow();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'zeroone':
                $field = new PxlzEdgefFieldZeroOne();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'imagevideo':
                $field = new PxlzEdgefFieldImageVideo();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'yesempty':
                $field = new PxlzEdgefFieldYesEmpty();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'file':
                $field = new PxlzEdgefFieldFile();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'flagpost':
                $field = new PxlzEdgefFieldFlagPost();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'flagpage':
                $field = new PxlzEdgefFieldFlagPage();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'flagmedia':
                $field = new PxlzEdgefFieldFlagMedia();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'flagportfolio':
                $field = new PxlzEdgefFieldFlagPortfolio();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'flagproduct':
                $field = new PxlzEdgefFieldFlagProduct();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'range':
                $field = new PxlzEdgefFieldRange();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'rangesimple':
                $field = new PxlzEdgefFieldRangeSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'radio':
                $field = new PxlzEdgefFieldRadio();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'checkbox':
                $field = new PxlzEdgefFieldCheckBox();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'date':
                $field = new PxlzEdgefFieldDate();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'radiogroup':
                $field = new PxlzEdgefFieldRadioGroup();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'checkboxgroup':
                $field = new PxlzEdgefFieldCheckBoxGroup();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'address':
                $field = new PxlzEdgefFieldAddress();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            default:
                break;
        }
    }
}