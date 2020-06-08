<?php

if (!function_exists('pxlz_edgtf_map_general_meta')) {
    function pxlz_edgtf_map_general_meta() {

        $general_meta_box = pxlz_edgtf_create_meta_box(
            array(
                'scope' => apply_filters('pxlz_edgtf_set_scope_for_meta_boxes', array('page', 'post'), 'general_meta'),
                'title' => esc_html__('General', 'pxlz'),
                'name' => 'general_meta'
            )
        );

        /***************** Slider Layout - begin **********************/

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_page_slider_meta',
                'type' => 'text',
                'label' => esc_html__('Slider Shortcode', 'pxlz'),
                'description' => esc_html__('Paste your slider shortcode here', 'pxlz'),
                'parent' => $general_meta_box
            )
        );

        /***************** Slider Layout - begin **********************/

        /***************** Content Layout - begin **********************/

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_page_content_behind_header_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Always put content behind header', 'pxlz'),
                'description' => esc_html__('Enabling this option will put page content behind page header', 'pxlz'),
                'parent' => $general_meta_box
            )
        );

        $edgtf_content_padding_group = pxlz_edgtf_add_admin_group(
            array(
                'name' => 'content_padding_group',
                'title' => esc_html__('Content Style', 'pxlz'),
                'description' => esc_html__('Define styles for Content area', 'pxlz'),
                'parent' => $general_meta_box
            )
        );

        $edgtf_content_padding_row = pxlz_edgtf_add_admin_row(
            array(
                'name' => 'edgtf_content_padding_row',
                'next' => true,
                'parent' => $edgtf_content_padding_group
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_page_content_top_padding',
                'type' => 'textsimple',
                'label' => esc_html__('Content Top Padding', 'pxlz'),
                'parent' => $edgtf_content_padding_row,
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_page_content_top_padding_mobile',
                'type' => 'selectsimple',
                'label' => esc_html__('Set this top padding for mobile header', 'pxlz'),
                'parent' => $edgtf_content_padding_row,
                'options' => pxlz_edgtf_get_yes_no_select_array(false)
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_page_background_color_meta',
                'type' => 'color',
                'label' => esc_html__('Page Background Color', 'pxlz'),
                'description' => esc_html__('Choose background color for page content', 'pxlz'),
                'parent' => $general_meta_box
            )
        );

        /***************** Content Layout - end **********************/

        /***************** Boxed Layout - begin **********************/

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_boxed_meta',
                'type' => 'select',
                'label' => esc_html__('Boxed Layout', 'pxlz'),
                'parent' => $general_meta_box,
                'options' => pxlz_edgtf_get_yes_no_select_array(),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        '' => '#edgtf_boxed_container_meta',
                        'no' => '#edgtf_boxed_container_meta',
                        'yes' => ''
                    ),
                    'show' => array(
                        '' => '',
                        'no' => '',
                        'yes' => '#edgtf_boxed_container_meta'
                    )
                )
            )
        );

        $boxed_container_meta = pxlz_edgtf_add_admin_container(
            array(
                'parent' => $general_meta_box,
                'name' => 'boxed_container_meta',
                'hidden_property' => 'edgtf_boxed_meta',
                'hidden_values' => array(
                    '',
                    'no'
                )
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_page_background_color_in_box_meta',
                'type' => 'color',
                'label' => esc_html__('Page Background Color', 'pxlz'),
                'description' => esc_html__('Choose the page background color outside box', 'pxlz'),
                'parent' => $boxed_container_meta
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_boxed_background_image_meta',
                'type' => 'image',
                'label' => esc_html__('Background Image', 'pxlz'),
                'description' => esc_html__('Choose an image to be displayed in background', 'pxlz'),
                'parent' => $boxed_container_meta
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_boxed_pattern_background_image_meta',
                'type' => 'image',
                'label' => esc_html__('Background Pattern', 'pxlz'),
                'description' => esc_html__('Choose an image to be used as background pattern', 'pxlz'),
                'parent' => $boxed_container_meta
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_boxed_background_image_attachment_meta',
                'type' => 'select',
                'default_value' => 'fixed',
                'label' => esc_html__('Background Image Attachment', 'pxlz'),
                'description' => esc_html__('Choose background image attachment', 'pxlz'),
                'parent' => $boxed_container_meta,
                'options' => array(
                    '' => esc_html__('Default', 'pxlz'),
                    'fixed' => esc_html__('Fixed', 'pxlz'),
                    'scroll' => esc_html__('Scroll', 'pxlz')
                )
            )
        );

        /***************** Boxed Layout - end **********************/

        /***************** Passepartout Layout - begin **********************/

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_paspartu_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Passepartout', 'pxlz'),
                'description' => esc_html__('Enabling this option will display passepartout around site content', 'pxlz'),
                'parent' => $general_meta_box,
                'options' => pxlz_edgtf_get_yes_no_select_array(),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        '' => '#edgtf_edgtf_paspartu_container_meta',
                        'no' => '#edgtf_edgtf_paspartu_container_meta',
                        'yes' => ''
                    ),
                    'show' => array(
                        '' => '',
                        'no' => '',
                        'yes' => '#edgtf_edgtf_paspartu_container_meta'
                    )
                )
            )
        );

        $paspartu_container_meta = pxlz_edgtf_add_admin_container(
            array(
                'parent' => $general_meta_box,
                'name' => 'edgtf_paspartu_container_meta',
                'hidden_property' => 'edgtf_paspartu_meta',
                'hidden_values' => array(
                    '',
                    'no'
                )
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_paspartu_color_meta',
                'type' => 'color',
                'label' => esc_html__('Passepartout Color', 'pxlz'),
                'description' => esc_html__('Choose passepartout color, default value is #ffffff', 'pxlz'),
                'parent' => $paspartu_container_meta
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_paspartu_width_meta',
                'type' => 'text',
                'label' => esc_html__('Passepartout Size', 'pxlz'),
                'description' => esc_html__('Enter size amount for passepartout', 'pxlz'),
                'parent' => $paspartu_container_meta,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px or %'
                )
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_paspartu_responsive_width_meta',
                'type' => 'text',
                'label' => esc_html__('Responsive Passepartout Size', 'pxlz'),
                'description' => esc_html__('Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'pxlz'),
                'parent' => $paspartu_container_meta,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px or %'
                )
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'parent' => $paspartu_container_meta,
                'type' => 'select',
                'default_value' => '',
                'name' => 'edgtf_disable_top_paspartu_meta',
                'label' => esc_html__('Disable Top Passepartout', 'pxlz'),
                'options' => pxlz_edgtf_get_yes_no_select_array(),
            )
        );

        /***************** Passepartout Layout - end **********************/

        /***************** Content Width Layout - begin **********************/

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_initial_content_width_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Initial Width of Content', 'pxlz'),
                'description' => esc_html__('Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'pxlz'),
                'parent' => $general_meta_box,
                'options' => array(
                    '' => esc_html__('Default', 'pxlz'),
                    'edgtf-grid-1100' => esc_html__('1100px', 'pxlz'),
                    'edgtf-grid-1300' => esc_html__('1300px', 'pxlz'),
                    'edgtf-grid-1200' => esc_html__('1200px', 'pxlz'),
                    'edgtf-grid-1000' => esc_html__('1000px', 'pxlz'),
                    'edgtf-grid-800' => esc_html__('800px', 'pxlz')
                )
            )
        );

        /***************** Content Width Layout - end **********************/

        /***************** Smooth Page Transitions Layout - begin **********************/

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_smooth_page_transitions_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Smooth Page Transitions', 'pxlz'),
                'description' => esc_html__('Enabling this option will perform a smooth transition between pages when clicking on links', 'pxlz'),
                'parent' => $general_meta_box,
                'options' => pxlz_edgtf_get_yes_no_select_array(),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        '' => '#edgtf_page_transitions_container_meta',
                        'no' => '#edgtf_page_transitions_container_meta',
                        'yes' => ''
                    ),
                    'show' => array(
                        '' => '',
                        'no' => '',
                        'yes' => '#edgtf_page_transitions_container_meta'
                    )
                )
            )
        );

        $page_transitions_container_meta = pxlz_edgtf_add_admin_container(
            array(
                'parent' => $general_meta_box,
                'name' => 'page_transitions_container_meta',
                'hidden_property' => 'edgtf_smooth_page_transitions_meta',
                'hidden_values' => array(
                    '',
                    'no'
                )
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_page_transition_preloader_meta',
                'type' => 'select',
                'label' => esc_html__('Enable Preloading Animation', 'pxlz'),
                'description' => esc_html__('Enabling this option will display an animated preloader while the page content is loading', 'pxlz'),
                'parent' => $page_transitions_container_meta,
                'options' => pxlz_edgtf_get_yes_no_select_array(),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        '' => '#edgtf_page_transition_preloader_container_meta',
                        'no' => '#edgtf_page_transition_preloader_container_meta',
                        'yes' => ''
                    ),
                    'show' => array(
                        '' => '',
                        'no' => '',
                        'yes' => '#edgtf_page_transition_preloader_container_meta'
                    )
                )
            )
        );

        $page_transition_preloader_container_meta = pxlz_edgtf_add_admin_container(
            array(
                'parent' => $page_transitions_container_meta,
                'name' => 'page_transition_preloader_container_meta',
                'hidden_property' => 'edgtf_page_transition_preloader_meta',
                'hidden_values' => array(
                    '',
                    'no'
                )
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_smooth_pt_bgnd_color_meta',
                'type' => 'color',
                'label' => esc_html__('Page Loader Background Color', 'pxlz'),
                'parent' => $page_transition_preloader_container_meta
            )
        );

        $group_pt_spinner_animation_meta = pxlz_edgtf_add_admin_group(
            array(
                'name' => 'group_pt_spinner_animation_meta',
                'title' => esc_html__('Loader Style', 'pxlz'),
                'description' => esc_html__('Define styles for loader spinner animation', 'pxlz'),
                'parent' => $page_transition_preloader_container_meta
            )
        );

        $row_pt_spinner_animation_meta = pxlz_edgtf_add_admin_row(
            array(
                'name' => 'row_pt_spinner_animation_meta',
                'parent' => $group_pt_spinner_animation_meta
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'type' => 'selectsimple',
                'name' => 'edgtf_smooth_pt_spinner_type_meta',
                'label' => esc_html__('Spinner Type', 'pxlz'),
                'parent' => $row_pt_spinner_animation_meta,
                'options' => array(
                    '' => esc_html__('Default', 'pxlz'),
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

        pxlz_edgtf_create_meta_box_field(
            array(
                'type' => 'colorsimple',
                'name' => 'edgtf_smooth_pt_spinner_color_meta',
                'label' => esc_html__('Spinner Color', 'pxlz'),
                'parent' => $row_pt_spinner_animation_meta
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_page_transition_fadeout_meta',
                'type' => 'select',
                'label' => esc_html__('Enable Fade Out Animation', 'pxlz'),
                'description' => esc_html__('Enabling this option will turn on fade out animation when leaving page', 'pxlz'),
                'options' => pxlz_edgtf_get_yes_no_select_array(),
                'parent' => $page_transitions_container_meta

            )
        );

        /***************** Smooth Page Transitions Layout - end **********************/

        /***************** Comments Layout - begin **********************/

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_page_comments_meta',
                'type' => 'select',
                'label' => esc_html__('Show Comments', 'pxlz'),
                'description' => esc_html__('Enabling this option will show comments on your page', 'pxlz'),
                'parent' => $general_meta_box,
                'options' => pxlz_edgtf_get_yes_no_select_array()
            )
        );

        /***************** Comments Layout - end **********************/
    }

    add_action('pxlz_edgtf_meta_boxes_map', 'pxlz_edgtf_map_general_meta', 10);
}