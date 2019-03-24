<?php

add_theme_support( 'menus' );
function register_footer_menu() {
  register_nav_menu('footer',__( 'Footer Menu' ));
}
add_action( 'init', 'register_footer_menu' );

add_theme_support( 'post-thumbnails' );
add_image_size( 'postx', 1280, 0, false );
add_image_size( 'postl', 960, 0, false );
add_image_size( 'postm', 640, 0, false );
add_image_size( 'posts', 480, 0, false );

add_image_size( '16/9x', 1280, 720, true );
add_image_size( '16/9l', 960, 540, true );
add_image_size( '16/9m', 640, 360, true );
add_image_size( '16/9s', 480, 270, true );

add_image_size( '8/3x', 1280, 480, true );
add_image_size( '8/3l', 960, 360, true );
add_image_size( '8/3m', 640, 240, true );
add_image_size( '8/3s', 480, 180, true );

add_image_size( '32/9x', 1280, 360, true );
add_image_size( '32/9l', 960, 270, true );
add_image_size( '32/9m', 640, 180, true );
add_image_size( '32/9s', 480, 135, true );

//Customizer Theme Settings
function ADKThemeSettings($wp_customize) {
	
	//Add Header Section
	$wp_customize->add_section('ADKThemeHeadCode', array(
		'title' => 'Head Code [ADK Theme]',
		'description' => '',
		'priority' => 1,
	));
	
	//Add Schema.org Section
	$wp_customize->add_section('ADKThemeDesign', array(
		'title' => 'Design Info [ADK Theme]',
		'description' => '',
		'priority' => 2,
	));
	
	//Add Ad Unit Section
	$wp_customize->add_section('ADKThemeAdUnits', array(
		'title' => 'Ad Units [ADK Theme]',
		'description' => '',
		'priority' => 3,
	));
	
	//Add Social Media Section
	$wp_customize->add_section('ADKThemeSocialMedia', array(
		'title' => 'Social Media [ADK Theme]',
		'description' => '',
		'priority' => 4,
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
	$wp_customize->add_setting('ADKThemeDesign-Footer');
	$wp_customize->add_setting('ADKThemeDesign-TextBackgroundColorAlpha',
		array(
      		'default' => '#0F2027',
      		'transport' => 'refresh',
      		'sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_setting('ADKThemeDesign-TextBackgroundColorBeta',
		array(
      		'default' => '#203A43',
      		'transport' => 'refresh',
      		'sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_setting('ADKThemeDesign-TextBackgroundColorOmega',
		array(
      		'default' => '#2c5364',
      		'transport' => 'refresh',
      		'sanitize_callback' => 'sanitize_hex_color'));
	
	//Add Ad Unit Settings to the Customizer
	$wp_customize->add_setting('ADKThemeAdUnits-InArticle');
	$wp_customize->add_setting('ADKThemeAdUnits-Sidebar');
	
	//Add Social Media Settings to the Customizer
    $wp_customize->add_setting('ADKThemeSocialMedia-Youtube');
	$wp_customize->add_setting('ADKThemeSocialMedia-Twitter');
	$wp_customize->add_setting('ADKThemeSocialMedia-Facebook');
	$wp_customize->add_setting('ADKThemeSocialMedia-Tumblr');



	
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
	//Add Control to Change the First Color of Text on Images
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeDesign-TextBackgroundColorAlpha',
		array(
			'type' => 'text',
			'label' => 'Text Background Color Alpha',
			'description' => 'Set Hex Value of the Background Color for Text on Images',
			'section' => 'ADKThemeDesign',
			'settings' => 'ADKThemeDesign-TextBackgroundColorAlpha',
			'input_attrs' => array(
         		'placeholder' => __( '#0F2027' ),),
		) ) );
	//Add Control to Change the Second Color of Text on Images
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeDesign-TextBackgroundColorBeta',
		array(
			'type' => 'text',
			'label' => 'Text Background Color Beta',
			'description' => 'Set Hex Value of the Background Color for Text on Images',
			'section' => 'ADKThemeDesign',
			'settings' => 'ADKThemeDesign-TextBackgroundColorBeta',
			'input_attrs' => array(
         		'placeholder' => __( '#203A43' ),),
		) ) );
	//Add Control to Change the Last Color of Text on Images
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeDesign-TextBackgroundColorOmega',
		array(
			'type' => 'text',
			'label' => 'Text Background Color Omega',
			'description' => 'Set Hex Value of the Background Color for Text on Images',
			'section' => 'ADKThemeDesign',
			'settings' => 'ADKThemeDesign-TextBackgroundColorOmega',
			'input_attrs' => array(
         		'placeholder' => __( '#2c5364' ),),
		) ) );
	
	// Add a control to upload the logo
	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'ADKThemeDesign-Header',
		array(
			'label' => 'Upload Header Image',
			'description' => 'Upload a 640x128 Sized Image',
			'section' => 'ADKThemeDesign',
			'settings' => 'ADKThemeDesign-Header',
			'flex_width'  => false, // Allow any width, making the specified value recommended. False by default.
    		'flex_height' => true, // Require the resulting image to be exactly as tall as the height attribute (default).
    		'width'       => 640,
    		'height'      => 128,
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
	// Add a control to upload the logo
	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'ADKThemeDesign-Footer',
		array(
			'label' => 'Upload Header Image',
			'description' => 'Upload a 640x128 Sized Image',
			'section' => 'ADKThemeDesign',
			'settings' => 'ADKThemeDesign-Footer',
			'flex_width'  => false, // Allow any width, making the specified value recommended. False by default.
    		'flex_height' => true, // Require the resulting image to be exactly as tall as the height attribute (default).
    		'width'       => 128,
    		'height'      => 128,
			'button_labels' => array( 
         		'select' => __( 'Select Footer' ),
         		'change' => __( 'Change Footer' ),
				'remove' => __( 'Remove' ),
				'default' => __( 'Default' ),
			 	'placeholder' => __( 'No footer selected' ),
				'frame_title' => __( 'Select Footer' ),
				'frame_button' => __( 'Choose Footer' ),
      		)
		) ) );
	
	//Add Control to In-Article Ad Units
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeAdUnits-InArticle',
		array(
			'type' => 'text',
			'label' => 'In-Article Ad Units',
			'description' => 'Adsense In-Article Ad Unit',
			'section' => 'ADKThemeAdUnits',
			'settings' => 'ADKThemeAdUnits-InArticle',
			'input_attrs' => array(
         		'placeholder' => __( '/12345/TopLevelAdUnit/LowerLevelAdUnit' ),),
		) ) );
	
	//Add Control to In-Article Ad Units
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeAdUnits-Sidebar',
		array(
			'type' => 'text',
			'label' => 'Sidebar Ad Units',
			'description' => 'Adsense In-Sidebar Ad Unit',
			'section' => 'ADKThemeAdUnits',
			'settings' => 'ADKThemeAdUnits-Sidebar',
			'input_attrs' => array(
         		'placeholder' => __( '/12345/TopLevelAdUnit/LowerLevelAdUnit' ),),
		) ) );
    
    
	//Add Youtube Social Media
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeSocialMedia-Youtube',
		array(
			'type' => 'text',
			'label' => 'Youtube',
			'description' => 'Youtube Account',
			'section' => 'ADKThemeSocialMedia',
			'settings' => 'ADKThemeSocialMedia-Youtube',
		) ) );
    
	//Add Twitter Social Media
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeSocialMedia-Twitter',
		array(
			'type' => 'text',
			'label' => 'Twitter',
			'description' => 'Twitter Account',
			'section' => 'ADKThemeSocialMedia',
			'settings' => 'ADKThemeSocialMedia-Twitter',
		) ) );
	
	//Add Facebook Social Media
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeSocialMedia-Facebook',
		array(
			'type' => 'text',
			'label' => 'Facebook',
			'description' => 'Facebook Account',
			'section' => 'ADKThemeSocialMedia',
			'settings' => 'ADKThemeSocialMedia-Facebook',
		) ) );
	//Add Tumblr Social Media
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeSocialMedia-Tumblr',
		array(
			'type' => 'text',
			'label' => 'Tumblr',
			'description' => 'Tumblr Account',
			'section' => 'ADKThemeSocialMedia',
			'settings' => 'ADKThemeSocialMedia-Tumblr',
		) ) );

	}
add_action('customize_register', 'ADKThemeSettings');

//Add Archive to Theme
function wp_archive( $template ){
    if( is_front_page() && is_paged() ){
        $template = locate_template(array('archive.php','index.php'));
        }
    return $template;
    }
add_action('template_include','wp_archive');

function numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<nav class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></nav>' . "\n";

}

//Add Twitter, Facebook, and Adsense Information to contacts section in Admin
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