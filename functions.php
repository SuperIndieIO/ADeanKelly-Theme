<?php

add_theme_support( 'post-thumbnails' );
add_image_size( 'post-xlarge', 1296, 0, false );
add_image_size( 'post-large', 960, 0, false );
add_image_size( 'post-medium', 640, 0, false );
add_image_size( 'post-small', 480, 0, false );
add_image_size( 'post-amp', 1280, 720, true );

add_image_size( '16/9-xlarge', 1296, 729, true );
add_image_size( '16/9-large', 960, 540, true );
add_image_size( '16/9-medium', 640, 360, true );
add_image_size( '16/9-small', 480, 270, true );

add_image_size( '8/3-xlarge', 1296, 486, true );
add_image_size( '8/3-large', 960, 360, true );
add_image_size( '8/3-medium', 640, 240, true );
add_image_size( '8/3-small', 480, 180, true );

add_image_size( '32/9-xlarge', 1280, 360, true );
add_image_size( '32/9-large', 960, 270, true );
add_image_size( '32/9-medium', 640, 180, true );
add_image_size( '32/9-small', 480, 135, true );

//Customizer Theme Settings
function ADKThemeSettings($wp_customize) {
	
	//Add Header Section
	$wp_customize->add_section('ADKThemeHeadCode', array(
		'title' => 'Head Code - ADK Theme',
		'description' => '',
		'priority' => 1,
	));
	
	//Add Schema.org Section
	$wp_customize->add_section('ADKThemeDesign', array(
		'title' => 'Design Info - ADK Theme',
		'description' => '',
		'priority' => 2,
	));
	
	//Add Ad Unit Section
	$wp_customize->add_section('ADKThemeAdUnits', array(
		'title' => 'Ad Units - ADK Theme',
		'description' => '',
		'priority' => 3,
	));
	
	//Add Head Settings to the Customizer
	$wp_customize->add_setting('ADKThemeHeadCode-GoogleMeta');
	$wp_customize->add_setting('ADKThemeHeadCode-MicrosoftMeta');
	$wp_customize->add_setting('ADKThemeHeadCode-Additional', array('default' => '<!--No Additional Head Code-->'));
	
	//Add Design Settings to the Customizer
	$wp_customize->add_setting('ADKThemeDesign-BackgroundHex',    
		array(
      		'default' => '#E4E4E4',
      		'transport' => 'refresh',
      		'sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_setting('ADKThemeDesign-ThemeColorHex',
		array(
      		'default' => '#E4E4E4',
      		'transport' => 'refresh',
      		'sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_setting('ADKThemeDesign-Header');
	
	//Add Ad Unit Settings to the Customizer
	$wp_customize->add_setting('ADKThemeAdUnits-Adsense');
	$wp_customize->add_setting('ADKThemeAdUnits-InArticle');
	$wp_customize->add_setting('ADKThemeAdUnits-Sidebar');



	
	//Add Control to Add Google Webmaster Meta Code
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeHeadCode-GoogleMeta',
		array(
			'type' => 'text',
			'label' => 'Google Meta Verification',
			'description' => 'Add Verification for Google Meta',
			'section' => 'ADKThemeHeadCode',
			'settings' => 'ADKThemeHeadCode-GoogleMeta',
		) ) );
	
	//Add Control to Add Microsoft Webmaster Meta Code
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeHeadCode-MicrosoftMeta',
		array(
			'type' => 'text',
			'label' => 'Microsoft Meta Verification',
			'description' => 'Add Verification for Microsoft Meta',
			'section' => 'ADKThemeHeadCode',
			'settings' => 'ADKThemeHeadCode-MicrosoftMeta',
		) ) );
	
	//Add Control to Add Aditional Head Code
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeHeadCode-Additional',
		array(
			'type' => 'textarea',
			'label' => 'Additional <Head> Code',
			'description' => 'Add additional code to the <head>',
			'section' => 'ADKThemeHeadCode',
			'settings' => 'ADKThemeHeadCode-Additional',
		) ) );
	
	//Add Control to Change Background Color
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeDesign-BackgroundHex',
		array(
			'type' => 'text',
			'label' => 'Site Background Color',
			'description' => 'Set Hex Value of Site Background',
			'section' => 'ADKThemeDesign',
			'settings' => 'ADKThemeDesign-BackgroundHex',
			'input_attrs' => array(
         		'placeholder' => __( '#E4E4E4' ),),
		) ) );
	
	//Add Control to Change Theme Color
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeDesign-ThemeColorHex',
		array(
			'type' => 'text',
			'label' => 'Site Theme Color',
			'description' => 'Set Hex Value of Site Theme Color',
			'section' => 'ADKThemeDesign',
			'settings' => 'ADKThemeDesign-ThemeColorHex',
			'input_attrs' => array(
         		'placeholder' => __( '#E4E4E4' ),),
		) ) );
	
	// Add a control to upload the logo
	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'ADKThemeDesign-Header',
		array(
			'label' => 'Upload Header',
			'description' => 'Upload a 360x72 Sized Image',
			'section' => 'ADKThemeDesign',
			'settings' => 'ADKThemeDesign-Header',
			'flex_width'  => false, // Allow any width, making the specified value recommended. False by default.
    		'flex_height' => true, // Require the resulting image to be exactly as tall as the height attribute (default).
    		'width'       => 360,
    		'height'      => 72,
			'button_labels' => array( 
         		'select' => __( 'Select Header' ),
         		'change' => __( 'Change Header' ),
				'remove' => __( 'Remove' ),
				'default' => __( 'Default' ),
			 	'placeholder' => __( 'No header selected' ),
				'frame_title' => __( 'Select Header' ),
				'frame_button' => __( 'Choose Header' ),
      		)
		) ) );
	
	//Add Control to Activate Adsense and Ad Units
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeAdUnits-Adsense',
		array(
			'type' => 'checkbox',
			'label' => 'Activate Adsense Advertising',
			'section' => 'ADKThemeAdUnits',
			'settings' => 'ADKThemeAdUnits-Adsense',
		) ) );
	
	//Add Control to In-Article Ad Units
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeAdUnits-InArticle',
		array(
			'type' => 'textarea',
			'label' => 'In-Article Ad Units',
			'description' => 'Adsense In-Article Ad Unit',
			'section' => 'ADKThemeAdUnits',
			'settings' => 'ADKThemeAdUnits-InArticle',
		) ) );
	
	//Add Control to In-Article Ad Units
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeAdUnits-Sidebar',
		array(
			'type' => 'textarea',
			'label' => 'Sidebar Ad Units',
			'description' => 'Adsense In-Sidebar Ad Unit',
			'section' => 'ADKThemeAdUnits',
			'settings' => 'ADKThemeAdUnits-Sidebar',
		) ) );

	}
add_action('customize_register', 'ADKThemeSettings');

function wp_archive( $template ){
    if( is_front_page() && is_paged() ){
        $template = locate_template(array('archive.php','index.php'));
        }
    return $template;
    }
add_action('template_include','wp_archive');

function ADKContacts( $contactmethods ) {
    // Add Twitter
    $contactmethods['twitter'] = 'Twitter';
    // Add Facebook
    $contactmethods['facebook'] = 'Facebook';
    // Add Title
    $contactmethods['title'] = 'Title';
    // Add Adsense Code
    $contactmethods['authoradsense'] = 'Adsense';

    return $contactmethods;
}
add_filter('user_contactmethods','ADKContacts', 10, 1);

?>