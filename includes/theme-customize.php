<?php
 
/* Add settings in customizer. */
add_action( 'customize_register', 'mina_olen_customize_register_settings' );

/**
 * Sets up the theme customizer sections, controls, and settings.
 *
 * @since  1.0.0
 * @return void
 */
function mina_olen_customize_register_settings( $wp_customize ) {

	/* Add the front page section. */
	$wp_customize->add_section(
		'front-page',
		array(
			'title'      => esc_html__( 'Front page settings', 'mina-olen' ),
			'priority'   => 60,
			'capability' => 'edit_theme_options'
		)
	);
	
	/* Loop same setting couple of times. */
	$k = 1;
	
	while( $k < apply_filters( 'mina_olen_how_many_pages', 7 ) ) {
	
	/* Add the 'front_page_*' setting. */
	$wp_customize->add_setting(
		'front_page_' . $k,
		array(
			'default'           => 0,
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'absint'
		)
	);
	
	/* Add front page control. */
	$wp_customize->add_control(
		'front-page-control-' . $k,
			array(
				'label'    => esc_html__( 'Select page', 'mina-olen' ) . ' ' . $k ,
				'section'  => 'front-page',
				'settings' => 'front_page_' . $k,
				'type'     => 'select',
				'priority' => $k+100,
				'choices'  => mina_olen_front_page_choices()
			) 
		);
		
	$k++; // Add one before loop ends.
		
	}
	
	/* Add the callout text setting. */
	$wp_customize->add_setting(
		'callout_text',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	/* Add the callout text control. */
	$wp_customize->add_control(
		'callout-text',
		array(
			'label'    => esc_html__( 'Callout text', 'mina-olen' ),
			'section'  => 'front-page',
			'settings' => 'callout_text',
			'priority' => 10,
			'type'     => 'text'
		)
	);
	
	/* Add the callout link setting. */
	$wp_customize->add_setting(
		'callout_url',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url'
		)
	);
	
	/* Add the callout link control. */
	$wp_customize->add_control(
		'callout-url',
		array(
			'label'    => esc_html__( 'Callout URL', 'mina-olen' ),
			'section'  => 'front-page',
			'settings' => 'callout_url',
			'priority' => 20,
			'type'     => 'text'
		)
	);
	
	/* Add the callout url text setting. */
	$wp_customize->add_setting(
		'callout_url_text',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	/* Add the callout url text control. */
	$wp_customize->add_control(
		'callout-url-text',
		array(
			'label'    => esc_html__( 'Callout URL text', 'mina-olen' ),
			'section'  => 'front-page',
			'settings' => 'callout_url_text',
			'priority' => 30,
			'type'     => 'text'
		)
	);
	
	/* Add the show latest posts setting. */
	$wp_customize->add_setting(
		'show_latest_posts',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	/* Add the show latest posts control. */
	$wp_customize->add_control(
		'show-latest-posts',
		array(
			'label'    => esc_html__( 'Show latest posts on front page', 'mina-olen' ),
			'section'  => 'front-page',
			'settings' => 'show_latest_posts',
			'priority' => 40,
			'type'     => 'checkbox'
		)
	);
	
	/* Show option for latest portfolio if post type exist. */
	if ( post_type_exists( 'portfolio_item' ) ) {
		
		/* Add the show latest portfolios setting. */
		$wp_customize->add_setting(
			'show_latest_portfolios',
			array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
	
		/* Add the show latest portfolios control. */
		$wp_customize->add_control(
			'show-latest-portfolios',
			array(
				'label'    => esc_html__( 'Show latest portfolios on front page', 'mina-olen' ),
				'section'  => 'front-page',
				'settings' => 'show_latest_portfolios',
				'priority' => 50,
				'type'     => 'checkbox'
			)
		);
	}
	
	/* Show option for latest download if post type exist. */
	if ( post_type_exists( 'download' ) ) {
		
		/* Add the show latest downloads setting. */
		$wp_customize->add_setting(
			'show_latest_downloads',
			array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
	
		/* Add the show latest downloads control. */
		$wp_customize->add_control(
			'show-latest-downloads',
			array(
				'label'    => esc_html__( 'Show latest downloads on front page', 'mina-olen' ),
				'section'  => 'front-page',
				'settings' => 'show_latest_downloads',
				'priority' => 60,
				'type'     => 'checkbox'
			)
		);
	}
	
	/* Show option for testimonial if post type exist. */
	if ( post_type_exists( 'testimonial' ) ) {
		
		/* Add the show latest downloads setting. */
		$wp_customize->add_setting(
			'show_latest_testimonials',
			array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
	
		/* Add the show latest downloads control. */
		$wp_customize->add_control(
			'show-latest-testimonials',
			array(
				'label'    => esc_html__( 'Show latest testimonials on front page', 'mina-olen' ),
				'section'  => 'front-page',
				'settings' => 'show_latest_testimonials',
				'priority' => 70,
				'type'     => 'checkbox'
			)
		);
	}
	
	/* Add boxed layout setting. */
	$wp_customize->add_setting(
		'layout_boxed',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	/* Add boxed layout control. */
	$wp_customize->add_control(
		'layout-boxed',
		array(
			'label'    => esc_html__( 'Use boxed layout in all pages.', 'mina-olen' ),
			'section'  => 'layout',
			'settings' => 'layout_boxed',
			'priority' => 60,
			'type'     => 'checkbox'
		)
	);
	
	/* Add the logo upload section. */
	$wp_customize->add_section(
		'logo-upload',
		array(
			'title'      => esc_html__( 'Logo Upload', 'mina-olen' ),
			'priority'   => 60,
			'capability' => 'edit_theme_options'
		)
	);
	
	/* Add the 'logo' setting. */
	$wp_customize->add_setting(
		'logo_upload',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url'
		)
	);
	
	/* Add custom logo control. */
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize, 'logo_image',
				array(
					'label'    => esc_html__( 'Upload custom logo.', 'mina-olen' ),
					'section'  => 'logo-upload',
					'settings' => 'logo_upload',
			) 
		) 
	);

	/* Add the footer section. */
	$wp_customize->add_section(
		'mina-olen-footer',
			array(
				'title'      => esc_html__( 'Footer text', 'mina-olen' ),
				'priority'   => 200,
				'capability' => 'edit_theme_options'
			)
		);

	/* Add the 'mina_olen_footer' setting. */
	$wp_customize->add_setting(
		'mina_olen_footer',
			array(
				'default'              => '',
				'type'                 => 'theme_mod',
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'mina_olen_customize_sanitize'
			)
		);

	/* Add the textarea control for the 'mina_olen_footer' setting. */
	$wp_customize->add_control(
		new Hybrid_Customize_Control_Textarea(
			$wp_customize,
			'mina-olen-footer',
				array(
					'label'    => esc_html__( 'Enter footer text', 'mina-olen' ),
					'section'  => 'mina-olen-footer',
					'settings' => 'mina_olen_footer',
				)
			)
		);

}

/**
 * Sanitizes the footer content on the customize screen.  Users with the 'unfiltered_html' cap can post 
 * anything. For other users, wp_filter_post_kses() is ran over the setting.
 *
 * @since 1.0.0
 */
function mina_olen_customize_sanitize( $setting, $object ) {

	/* Make sure we kill evil scripts from users without the 'unfiltered_html' cap. */
	if ( 'mina_olen_footer' == $object->id && !current_user_can( 'unfiltered_html' ) ) {
		$setting = stripslashes( wp_filter_post_kses( addslashes( $setting ) ) );
	}

	/* Return the sanitized setting. */
	return $setting;
	
}

/**
* Return  Pages for front page choices.
*
* @since  1.0.0
* @return array
*/
function mina_olen_front_page_choices() {
	
	/* Set an array. */
	$mina_olen_return_pages = array(
		0 => __( 'Select page', 'mina-olen' )
	);
	
	/* Get pages. */
	$mina_olen_pages = get_pages();
	
	/* Loop pages data. */
	foreach ( $mina_olen_pages as $mina_olen_page ) {
		$mina_olen_return_pages[$mina_olen_page->ID] = $mina_olen_page->post_title;
	}
	
	/* Return array. */
	return $mina_olen_return_pages;
	
}

?>