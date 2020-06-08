<?php

/*** Child Theme Function  ***/
if ( ! function_exists( 'pxlz_edgtf_child_theme_enqueue_scripts' ) ) {
	function pxlz_edgtf_child_theme_enqueue_scripts()
	{

		$parent_style = 'pxlz-edgtf-default-style';

		wp_enqueue_style('pxlz-edgtf-child-style', get_stylesheet_directory_uri() . '/style.css', array($parent_style));
	}

	add_action('wp_enqueue_scripts', 'pxlz_edgtf_child_theme_enqueue_scripts');
}