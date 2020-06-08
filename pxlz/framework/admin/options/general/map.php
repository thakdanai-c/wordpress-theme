<?php

if (!function_exists('pxlz_edgtf_general_options_map')) {
    /**
     * General options page
     */
    function pxlz_edgtf_general_options_map() {

        pxlz_edgtf_add_admin_page(
            array(
                'slug' => '',
                'title' => esc_html__('General', 'pxlz'),
                'icon' => 'fa fa-institution'
            )
        );

        $panel_design_style = pxlz_edgtf_add_admin_panel(
            array(
                'page' => '',
                'name' => 'panel_design_style',
                'title' => esc_html__('Design Style', 'pxlz')
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'google_fonts',
                'type' => 'font',
                'default_value' => '-1',
                'label' => esc_html__('Google Font Family', 'pxlz'),
                'description' => esc_html__('Choose a default Google font for your site', 'pxlz'),
                'parent' => $panel_design_style
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'additional_google_fonts',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Additional Google Fonts', 'pxlz'),
                'parent' => $panel_design_style,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_additional_google_fonts_container"
                )
            )
        );

        $additional_google_fonts_container = pxlz_edgtf_add_admin_container(
            array(
                'parent' => $panel_design_style,
                'name' => 'additional_google_fonts_container',
                'hidden_property' => 'additional_google_fonts',
                'hidden_value' => 'no'
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'additional_google_font1',
                'type' => 'font',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'pxlz'),
                'description' => esc_html__('Choose additional Google font for your site', 'pxlz'),
                'parent' => $additional_google_fonts_container
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'additional_google_font2',
                'type' => 'font',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'pxlz'),
                'description' => esc_html__('Choose additional Google font for your site', 'pxlz'),
                'parent' => $additional_google_fonts_container
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'additional_google_font3',
                'type' => 'font',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'pxlz'),
                'description' => esc_html__('Choose additional Google font for your site', 'pxlz'),
                'parent' => $additional_google_fonts_container
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'additional_google_font4',
                'type' => 'font',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'pxlz'),
                'description' => esc_html__('Choose additional Google font for your site', 'pxlz'),
                'parent' => $additional_google_fonts_container
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'additional_google_font5',
                'type' => 'font',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'pxlz'),
                'description' => esc_html__('Choose additional Google font for your site', 'pxlz'),
                'parent' => $additional_google_fonts_container
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'google_font_weight',
                'type' => 'checkboxgroup',
                'default_value' => '',
                'label' => esc_html__('Google Fonts Style & Weight', 'pxlz'),
                'description' => esc_html__('Choose a default Google font weights for your site. Impact on page load time', 'pxlz'),
                'parent' => $panel_design_style,
                'options' => array(
                    '100' => esc_html__('100 Thin', 'pxlz'),
                    '100i' => esc_html__('100 Thin Italic', 'pxlz'),
                    '200' => esc_html__('200 Extra-Light', 'pxlz'),
                    '200i' => esc_html__('200 Extra-Light Italic', 'pxlz'),
                    '300' => esc_html__('300 Light', 'pxlz'),
                    '300i' => esc_html__('300 Light Italic', 'pxlz'),
                    '400' => esc_html__('400 Regular', 'pxlz'),
                    '400i' => esc_html__('400 Regular Italic', 'pxlz'),
                    '500' => esc_html__('500 Medium', 'pxlz'),
                    '500i' => esc_html__('500 Medium Italic', 'pxlz'),
                    '600' => esc_html__('600 Semi-Bold', 'pxlz'),
                    '600i' => esc_html__('600 Semi-Bold Italic', 'pxlz'),
                    '700' => esc_html__('700 Bold', 'pxlz'),
                    '700i' => esc_html__('700 Bold Italic', 'pxlz'),
                    '800' => esc_html__('800 Extra-Bold', 'pxlz'),
                    '800i' => esc_html__('800 Extra-Bold Italic', 'pxlz'),
                    '900' => esc_html__('900 Ultra-Bold', 'pxlz'),
                    '900i' => esc_html__('900 Ultra-Bold Italic', 'pxlz')
                )
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'google_font_subset',
                'type' => 'checkboxgroup',
                'default_value' => '',
                'label' => esc_html__('Google Fonts Subset', 'pxlz'),
                'description' => esc_html__('Choose a default Google font subsets for your site', 'pxlz'),
                'parent' => $panel_design_style,
                'options' => array(
                    'latin' => esc_html__('Latin', 'pxlz'),
                    'latin-ext' => esc_html__('Latin Extended', 'pxlz'),
                    'cyrillic' => esc_html__('Cyrillic', 'pxlz'),
                    'cyrillic-ext' => esc_html__('Cyrillic Extended', 'pxlz'),
                    'greek' => esc_html__('Greek', 'pxlz'),
                    'greek-ext' => esc_html__('Greek Extended', 'pxlz'),
                    'vietnamese' => esc_html__('Vietnamese', 'pxlz')
                )
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'first_color',
                'type' => 'color',
                'label' => esc_html__('First Main Color', 'pxlz'),
                'description' => esc_html__('Choose the most dominant theme color. Default color is #00bbb3', 'pxlz'),
                'parent' => $panel_design_style
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'page_background_color',
                'type' => 'color',
                'label' => esc_html__('Page Background Color', 'pxlz'),
                'description' => esc_html__('Choose the background color for page content. Default color is #ffffff', 'pxlz'),
                'parent' => $panel_design_style
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'selection_color',
                'type' => 'color',
                'label' => esc_html__('Text Selection Color', 'pxlz'),
                'description' => esc_html__('Choose the color users see when selecting text', 'pxlz'),
                'parent' => $panel_design_style
            )
        );

        /***************** Passepartout Layout - begin **********************/

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'boxed',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Boxed Layout', 'pxlz'),
                'parent' => $panel_design_style,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_boxed_container"
                )
            )
        );

        $boxed_container = pxlz_edgtf_add_admin_container(
            array(
                'parent' => $panel_design_style,
                'name' => 'boxed_container',
                'hidden_property' => 'boxed',
                'hidden_value' => 'no'
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'page_background_color_in_box',
                'type' => 'color',
                'label' => esc_html__('Page Background Color', 'pxlz'),
                'description' => esc_html__('Choose the page background color outside box', 'pxlz'),
                'parent' => $boxed_container
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'boxed_background_image',
                'type' => 'image',
                'label' => esc_html__('Background Image', 'pxlz'),
                'description' => esc_html__('Choose an image to be displayed in background', 'pxlz'),
                'parent' => $boxed_container
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'boxed_pattern_background_image',
                'type' => 'image',
                'label' => esc_html__('Background Pattern', 'pxlz'),
                'description' => esc_html__('Choose an image to be used as background pattern', 'pxlz'),
                'parent' => $boxed_container
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'boxed_background_image_attachment',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Background Image Attachment', 'pxlz'),
                'description' => esc_html__('Choose background image attachment', 'pxlz'),
                'parent' => $boxed_container,
                'options' => array(
                    '' => esc_html__('Default', 'pxlz'),
                    'fixed' => esc_html__('Fixed', 'pxlz'),
                    'scroll' => esc_html__('Scroll', 'pxlz')
                )
            )
        );

        /***************** Boxed Layout - end **********************/

        /***************** Passepartout Layout - begin **********************/

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'paspartu',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Passepartout', 'pxlz'),
                'description' => esc_html__('Enabling this option will display passepartout around site content', 'pxlz'),
                'parent' => $panel_design_style,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_paspartu_container"
                )
            )
        );

        $paspartu_container = pxlz_edgtf_add_admin_container(
            array(
                'parent' => $panel_design_style,
                'name' => 'paspartu_container',
                'hidden_property' => 'paspartu',
                'hidden_value' => 'no'
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'paspartu_color',
                'type' => 'color',
                'label' => esc_html__('Passepartout Color', 'pxlz'),
                'description' => esc_html__('Choose passepartout color, default value is #ffffff', 'pxlz'),
                'parent' => $paspartu_container
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'paspartu_width',
                'type' => 'text',
                'label' => esc_html__('Passepartout Size', 'pxlz'),
                'description' => esc_html__('Enter size amount for passepartout', 'pxlz'),
                'parent' => $paspartu_container,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px or %'
                )
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'paspartu_responsive_width',
                'type' => 'text',
                'label' => esc_html__('Responsive Passepartout Size', 'pxlz'),
                'description' => esc_html__('Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'pxlz'),
                'parent' => $paspartu_container,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px or %'
                )
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'parent' => $paspartu_container,
                'type' => 'yesno',
                'default_value' => 'no',
                'name' => 'disable_top_paspartu',
                'label' => esc_html__('Disable Top Passepartout', 'pxlz')
            )
        );

        /***************** Passepartout Layout - end **********************/

        /***************** Content Layout - begin **********************/

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'initial_content_width',
                'type' => 'select',
                'default_value' => 'edgtf-grid-1300',
                'label' => esc_html__('Initial Width of Content', 'pxlz'),
                'description' => esc_html__('Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'pxlz'),
                'parent' => $panel_design_style,
                'options' => array(
                    'edgtf-grid-1100' => esc_html__('1100px - default', 'pxlz'),
                    'edgtf-grid-1300' => esc_html__('1300px', 'pxlz'),
                    'edgtf-grid-1200' => esc_html__('1200px', 'pxlz'),
                    'edgtf-grid-1000' => esc_html__('1000px', 'pxlz'),
                    'edgtf-grid-800' => esc_html__('800px', 'pxlz')
                )
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'preload_pattern_image',
                'type' => 'image',
                'label' => esc_html__('Preload Pattern Image', 'pxlz'),
                'description' => esc_html__('Choose preload pattern image to be displayed until images are loaded', 'pxlz'),
                'parent' => $panel_design_style
            )
        );

        /***************** Content Layout - end **********************/

        $panel_settings = pxlz_edgtf_add_admin_panel(
            array(
                'page' => '',
                'name' => 'panel_settings',
                'title' => esc_html__('Settings', 'pxlz')
            )
        );

        /***************** Smooth Scroll Layout - begin **********************/

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'page_smooth_scroll',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Smooth Scroll', 'pxlz'),
                'description' => esc_html__('Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'pxlz'),
                'parent' => $panel_settings
            )
        );

        /***************** Smooth Scroll Layout - end **********************/

        /***************** Smooth Page Transitions Layout - begin **********************/

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'smooth_page_transitions',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Smooth Page Transitions', 'pxlz'),
                'description' => esc_html__('Enabling this option will perform a smooth transition between pages when clicking on links', 'pxlz'),
                'parent' => $panel_settings,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_page_transitions_container"
                )
            )
        );

        $page_transitions_container = pxlz_edgtf_add_admin_container(
            array(
                'parent' => $panel_settings,
                'name' => 'page_transitions_container',
                'hidden_property' => 'smooth_page_transitions',
                'hidden_value' => 'no'
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'page_transition_preloader',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Enable Preloading Animation', 'pxlz'),
                'description' => esc_html__('Enabling this option will display an animated preloader while the page content is loading', 'pxlz'),
                'parent' => $page_transitions_container,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_page_transition_preloader_container"
                )
            )
        );

        $page_transition_preloader_container = pxlz_edgtf_add_admin_container(
            array(
                'parent' => $page_transitions_container,
                'name' => 'page_transition_preloader_container',
                'hidden_property' => 'page_transition_preloader',
                'hidden_value' => 'no'
            )
        );


        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'smooth_pt_bgnd_color',
                'type' => 'color',
                'label' => esc_html__('Page Loader Background Color', 'pxlz'),
                'parent' => $page_transition_preloader_container
            )
        );

        $group_pt_spinner_animation = pxlz_edgtf_add_admin_group(
            array(
                'name' => 'group_pt_spinner_animation',
                'title' => esc_html__('Loader Style', 'pxlz'),
                'description' => esc_html__('Define styles for loader spinner animation', 'pxlz'),
                'parent' => $page_transition_preloader_container
            )
        );

        $row_pt_spinner_animation = pxlz_edgtf_add_admin_row(
            array(
                'name' => 'row_pt_spinner_animation',
                'parent' => $group_pt_spinner_animation
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'selectsimple',
                'name' => 'smooth_pt_spinner_type',
                'default_value' => '',
                'label' => esc_html__('Spinner Type', 'pxlz'),
                'parent' => $row_pt_spinner_animation,
                'options' => array(
                    'pxlz' => esc_html__('Pxlz', 'pxlz'),
                    'rotate_circles' => esc_html__('Rotate Circles', 'pxlz'),
                    'pulse' => esc_html__('Pulse', 'pxlz'),
                    'double_pulse' => esc_html__('Double Pulse', 'pxlz'),
                    'cube' => esc_html__('Cube', 'pxlz'),
                    'rotating_cubes' => esc_html__('Rotating Cubes', 'pxlz'),
                    'stripes' => esc_html__('Stripes', 'pxlz'),
                    'wave' => esc_html__('Wave', 'pxlz'),
                    'two_rotating_circles' => esc_html__('2 Rotating Circles', 'pxlz'),
                    'five_rotating_circles' => esc_html__('5 Rotating Circles', 'pxlz'),
                    'atom' => esc_html__('Atom', 'pxlz'),
                    'clock' => esc_html__('Clock', 'pxlz'),
                    'mitosis' => esc_html__('Mitosis', 'pxlz'),
                    'lines' => esc_html__('Lines', 'pxlz'),
                    'fussion' => esc_html__('Fussion', 'pxlz'),
                    'wave_circles' => esc_html__('Wave Circles', 'pxlz'),
                    'pulse_circles' => esc_html__('Pulse Circles', 'pxlz')
                )
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'colorsimple',
                'name' => 'smooth_pt_spinner_color',
                'default_value' => '',
                'label' => esc_html__('Spinner Color', 'pxlz'),
                'parent' => $row_pt_spinner_animation
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'page_transition_fadeout',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Enable Fade Out Animation', 'pxlz'),
                'description' => esc_html__('Enabling this option will turn on fade out animation when leaving page', 'pxlz'),
                'parent' => $page_transitions_container
            )
        );

        /***************** Smooth Page Transitions Layout - end **********************/

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'show_back_button',
                'type' => 'yesno',
                'default_value' => 'yes',
                'label' => esc_html__('Show "Back To Top Button"', 'pxlz'),
                'description' => esc_html__('Enabling this option will display a Back to Top button on every page', 'pxlz'),
                'parent' => $panel_settings
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'responsiveness',
                'type' => 'yesno',
                'default_value' => 'yes',
                'label' => esc_html__('Responsiveness', 'pxlz'),
                'description' => esc_html__('Enabling this option will make all pages responsive', 'pxlz'),
                'parent' => $panel_settings
            )
        );

        $panel_custom_code = pxlz_edgtf_add_admin_panel(
            array(
                'page' => '',
                'name' => 'panel_custom_code',
                'title' => esc_html__('Custom Code', 'pxlz')
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'custom_js',
                'type' => 'textarea',
                'label' => esc_html__('Custom JS', 'pxlz'),
                'description' => esc_html__('Enter your custom Javascript here', 'pxlz'),
                'parent' => $panel_custom_code
            )
        );

        $panel_google_api = pxlz_edgtf_add_admin_panel(
            array(
                'page' => '',
                'name' => 'panel_google_api',
                'title' => esc_html__('Google API', 'pxlz')
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'google_maps_api_key',
                'type' => 'text',
                'label' => esc_html__('Google Maps Api Key', 'pxlz'),
                'description' => esc_html__('Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'pxlz'),
                'parent' => $panel_google_api
            )
        );
    }

    add_action('pxlz_edgtf_options_map', 'pxlz_edgtf_general_options_map', 1);
}

if (!function_exists('pxlz_edgtf_page_general_style')) {
    /**
     * Function that prints page general inline styles
     */
    function pxlz_edgtf_page_general_style($style) {
        $current_style = '';
        $page_id = pxlz_edgtf_get_page_id();
        $class_prefix = pxlz_edgtf_get_unique_page_class($page_id);

        $boxed_background_style = array();

        $boxed_page_background_color = pxlz_edgtf_get_meta_field_intersect('page_background_color_in_box', $page_id);
        if (!empty($boxed_page_background_color)) {
            $boxed_background_style['background-color'] = $boxed_page_background_color;
        }

        $boxed_page_background_image = pxlz_edgtf_get_meta_field_intersect('boxed_background_image', $page_id);
        if (!empty($boxed_page_background_image)) {
            $boxed_background_style['background-image'] = 'url(' . esc_url($boxed_page_background_image) . ')';
            $boxed_background_style['background-position'] = 'center 0px';
            $boxed_background_style['background-repeat'] = 'no-repeat';
        }

        $boxed_page_background_pattern_image = pxlz_edgtf_get_meta_field_intersect('boxed_pattern_background_image', $page_id);
        if (!empty($boxed_page_background_pattern_image)) {
            $boxed_background_style['background-image'] = 'url(' . esc_url($boxed_page_background_pattern_image) . ')';
            $boxed_background_style['background-position'] = '0px 0px';
            $boxed_background_style['background-repeat'] = 'repeat';
        }

        $boxed_page_background_attachment = pxlz_edgtf_get_meta_field_intersect('boxed_background_image_attachment', $page_id);
        if (!empty($boxed_page_background_attachment)) {
            $boxed_background_style['background-attachment'] = $boxed_page_background_attachment;
        }

        $boxed_background_selector = $class_prefix . '.edgtf-boxed .edgtf-wrapper';

        if (!empty($boxed_background_style)) {
            $current_style .= pxlz_edgtf_dynamic_css($boxed_background_selector, $boxed_background_style);
        }

        $paspartu_style = array();
        $paspartu_res_style = array();
        $paspartu_res_start = '@media only screen and (max-width: 1024px) {';
        $paspartu_res_end = '}';

        $paspartu_color = pxlz_edgtf_get_meta_field_intersect('paspartu_color', $page_id);
        if (!empty($paspartu_color)) {
            $paspartu_style['background-color'] = $paspartu_color;
        }

        $paspartu_width = pxlz_edgtf_get_meta_field_intersect('paspartu_width', $page_id);
        if ($paspartu_width !== '') {
            if (pxlz_edgtf_string_ends_with($paspartu_width, '%') || pxlz_edgtf_string_ends_with($paspartu_width, 'px')) {
                $paspartu_style['padding'] = $paspartu_width;
            } else {
                $paspartu_style['padding'] = $paspartu_width . 'px';
            }
        }

        $paspartu_selector = $class_prefix . '.edgtf-paspartu-enabled .edgtf-wrapper';

        if (!empty($paspartu_style)) {
            $current_style .= pxlz_edgtf_dynamic_css($paspartu_selector, $paspartu_style);
        }

        $paspartu_responsive_width = pxlz_edgtf_get_meta_field_intersect('paspartu_responsive_width', $page_id);
        if ($paspartu_responsive_width !== '') {
            if (pxlz_edgtf_string_ends_with($paspartu_responsive_width, '%') || pxlz_edgtf_string_ends_with($paspartu_responsive_width, 'px')) {
                $paspartu_res_style['padding'] = $paspartu_responsive_width;
            } else {
                $paspartu_res_style['padding'] = $paspartu_responsive_width . 'px';
            }
        }

        if (!empty($paspartu_res_style)) {
            $current_style .= $paspartu_res_start . pxlz_edgtf_dynamic_css($paspartu_selector, $paspartu_res_style) . $paspartu_res_end;
        }

        $current_style = $current_style . $style;

        return $current_style;
    }

    add_filter('pxlz_edgtf_add_page_custom_style', 'pxlz_edgtf_page_general_style');
}