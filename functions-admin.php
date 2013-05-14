<?php

if( !function_exists( 'archetype_mce_buttons_2' ) ) {
	function archetype_mce_buttons_2( $buttons ) {
		array_unshift( $buttons, 'styleselect' );
		return $buttons;
	}
	add_filter('mce_buttons_2', 'archetype_mce_buttons_2');	
}



if( !function_exists( 'archetype_tiny_mce_before_init' ) ) {
	function archetype_tiny_mce_before_init( $settings ) {
	    $style_formats = array(
	        array(
	            'title' => 'Side quote',
	            'inline' => 'span',
	            'classes' => 'quoted',
	        )
	    );
	    $settings['style_formats'] = json_encode( $style_formats );
	    return $settings;
	}
	add_filter( 'tiny_mce_before_init', 'archetype_tiny_mce_before_init' );
}



if( !function_exists( 'archetype_custom_mce_format' ) ) {
	function archetype_custom_mce_format( $settings ) {
		$settings['theme_advanced_blockformats'] = 'p,h2,h3,h4,h5,h6,pre';
		return $settings;
	}
	add_filter( 'tiny_mce_before_init', 'archetype_custom_mce_format' );
}