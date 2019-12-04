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

add_image_size( '4/3x', 1280, 960, true );
add_image_size( '4/3l', 960, 720, true );
add_image_size( '4/3m', 640, 480, true );
add_image_size( '4/3s', 480, 360, true );

//Add Gutenberg Theme Support
add_theme_support( 'wp-block-styles' );
add_theme_support( 'align-wide' );
add_theme_support( 'responsive-embeds' );

add_filter( 'upload_mimes', 'adk_myme_types', 1, 1 );
function adk_myme_types( $mime_types ) {
  $mime_types['webp'] = 'image/webp';     // Adding .svg extension
  
  return $mime_types;
}

//Customizer Theme Settings
function ADKThemeSettings($wp_customize) {
	
	//Add Header Section
	$wp_customize->add_section('ADKThemeHeadCode', array(
		'title' => 'Head Code [ADK Theme]',
		'description' => '',
		'priority' => 1,
	));
    //Add Footer Section
	$wp_customize->add_section('ADKThemeFooterCode', array(
		'title' => 'Footer Code [ADK Theme]',
		'description' => '',
		'priority' => 2,
	));
    
    //Add Footer Section
	$wp_customize->add_section('ADKThemeAMPCode', array(
		'title' => 'AMP Code [ADK Theme]',
		'description' => '',
		'priority' => 3,
	));
	
	//Add Schema.org Section
	$wp_customize->add_section('ADKThemeDesign', array(
		'title' => 'Design Info [ADK Theme]',
		'description' => '',
		'priority' => 4,
	));
	
	//Add Ad Unit Section
	$wp_customize->add_section('ADKThemeAdvertising', array(
		'title' => 'Advertising [ADK Theme]',
		'description' => '',
		'priority' => 5,
	));
	
	//Add Social Media Section
	$wp_customize->add_section('ADKThemeSocialMedia', array(
		'title' => 'Social Media [ADK Theme]',
		'description' => '',
		'priority' => 6,
	));
	
	//Add Head Settings to the Customizer
	$wp_customize->add_setting('ADKThemeHeadCode-GoogleMeta');
	$wp_customize->add_setting('ADKThemeHeadCode-MicrosoftMeta');
	$wp_customize->add_setting('ADKThemeHeadCode-Additional', array('default' => '<!--No Additional Head Code-->'));
    $wp_customize->add_setting('ADKThemeHeadCode-GoogleAnalytics');
    
    //Add Footer Settings to the Customizer
	$wp_customize->add_setting('ADKThemeFooterCode-Before', array('default' => '<!--No Additional Head Code-->'));
	$wp_customize->add_setting('ADKThemeFooterCode-After', array('default' => '<!--No Additional Head Code-->'));
	
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
    $wp_customize->add_setting('ADKThemeDesign-Favicon');
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
    
    //Add Footer Settings to the Customizer
	$wp_customize->add_setting('ADKThemeAMPCode-Before', array('default' => '<!--No Additional AMP Code-->'));
	$wp_customize->add_setting('ADKThemeAMPCode-After', array('default' => '<!--No Additional AMP Code-->'));
	
	//Add Ad Unit Settings to the Customizer
	$wp_customize->add_setting('ADKThemeAdvertising-InArticle');
	$wp_customize->add_setting('ADKThemeAdvertising-Sidebar');
	$wp_customize->add_setting('ADKThemeAdvertising-AdsenseChannels');
    
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
    
    //Add Google Analytics UA- Code to Pages
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeHeadCode-GoogleAnalytics',
		array(
			'type' => 'text',
			'label' => 'Google Analytics UA- Code',
			'description' => 'Add Google Analytics to all pages',
			'section' => 'ADKThemeHeadCode',
			'settings' => 'ADKThemeHeadCode-GoogleAnalytics',
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
    
    
    //Add Control to Add Aditional Footer Code
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeFooterCode-Before',
		array(
			'type' => 'textarea',
			'label' => 'Additional <footer> Code',
			'description' => 'Add additional code to the <footer>',
			'section' => 'ADKThemeFooterCode',
			'settings' => 'ADKThemeFooterCode-Before',
		) ) );
    
    //Add Control to Add Aditional Footer Code
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeFooterCode-After',
		array(
			'type' => 'textarea',
			'label' => 'Additional <footer> Code',
			'description' => 'Add additional code to the <footer>',
			'section' => 'ADKThemeFooterCode',
			'settings' => 'ADKThemeFooterCode-After',
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
    		'width'       => 1920,
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
			'label' => 'Upload Footer Image',
			'description' => 'Upload a 128x128 Sized Image',
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
    
    // Add a control to upload the logo
	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'ADKThemeDesign-Favicon',
		array(
			'label' => 'Upload Favicon Image',
			'description' => 'Upload a 96x96 Sized Image',
			'section' => 'ADKThemeDesign',
			'settings' => 'ADKThemeDesign-Favicon',
			'flex_width'  => false, // Allow any width, making the specified value recommended. False by default.
    		'flex_height' => false, // Require the resulting image to be exactly as tall as the height attribute (default).
    		'width'       => 96,
    		'height'      => 96,
			'button_labels' => array( 
         		'select' => __( 'Select Favicon' ),
         		'change' => __( 'Change Favicon' ),
				'remove' => __( 'Remove' ),
				'default' => __( 'Default' ),
			 	'placeholder' => __( 'No favicon selected' ),
				'frame_title' => __( 'Select Favicon' ),
				'frame_button' => __( 'Choose Favicon' ),
      		)
		) ) );
    
    //Add Control to Add Aditional AMP Footer Code
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeAMPCode-Before',
		array(
			'type' => 'textarea',
			'label' => 'Additional AMP <footer> Code',
			'description' => 'Add additional code to the AMP <footer>',
			'section' => 'ADKThemeAMPCode',
			'settings' => 'ADKThemeAMPCode-Before',
		) ) );
    
    //Add Control to Add Aditional AMP Footer Code
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeAMPCode-After',
		array(
			'type' => 'textarea',
			'label' => 'Additional AMP <footer> Code',
			'description' => 'Add additional code to the AMP <footer>',
			'section' => 'ADKThemeAMPCode',
			'settings' => 'ADKThemeAMPCode-After',
		) ) );
	
	//Add Control to In-Article Ad Units
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeAdvertising-InArticle',
		array(
			'type' => 'text',
			'label' => 'In-Article Ad Units',
			'description' => 'Adsense In-Article Ad Unit',
			'section' => 'ADKThemeAdvertising',
			'settings' => 'ADKThemeAdvertising-InArticle',
			'input_attrs' => array(
         		'placeholder' => __( '/12345/TopLevelAdUnit/LowerLevelAdUnit' ),),
		) ) );
	
	//Add Control to In-Article Ad Units
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeAdvertising-Sidebar',
		array(
			'type' => 'text',
			'label' => 'Sidebar Ad Units',
			'description' => 'Adsense In-Sidebar Ad Unit',
			'section' => 'ADKThemeAdvertising',
			'settings' => 'ADKThemeAdvertising-Sidebar',
			'input_attrs' => array(
         		'placeholder' => __( '/12345/TopLevelAdUnit/LowerLevelAdUnit' ),),
		) ) );
    
    //Add Adsense Custom Channels
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ADKThemeAdvertising-AdsenseChannels',
		array(
			'type' => 'text',
			'label' => 'Adsense Custom Channels',
			'description' => 'Custom channel tracking in Adsense',
			'section' => 'ADKThemeAdvertising',
			'settings' => 'ADKThemeAdvertising-AdsenseChannels',
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

define( 'AMP_QUERY_VAR', apply_filters( 'amp_query_var', 'amp' ) );
add_rewrite_endpoint( AMP_QUERY_VAR, EP_PERMALINK );
add_filter( 'template_include', 'amp_page_template', 99 );
function amp_page_template( $template ) {
    if( get_query_var( AMP_QUERY_VAR, false ) !== false ) {
        if ( is_single() ) {
            $template = get_template_directory() .  '/single-amp.php';
        } 
    }
    return $template;
}
add_filter( 'amp_post_template_file', 'xyz_amp_set_custom_template', 10, 3 );
function xyz_amp_set_custom_template( $file, $type, $post ) {
	if ( 'single' === $type ) {
		$file = dirname( __FILE__ ) . '/single-amp.php';
	}
	return $file;
}

/** Standard Article Template Naming Feature **/
add_filter('default_page_template_title', function() {
    return __('Article Template w/ Image', 'article');
});

add_action( 'wp_ajax_load_more_posts', 'load_more_posts' );
add_action( 'wp_ajax_nopriv_load_more_posts', 'load_more_posts' );

function load_more_posts(){
    global $post;
    $args = array('post_type'=>'post', 'posts_per_page' => $_POST['posts_per_page'], 'offset'=> $_POST['offset'], 'cat' => $_POST['category'], 'tag__in' => $_POST['tag']);
    $rst=[];
    $posts=[];
    $query = new WP_Query($args);
    if($query->have_posts()):
        while($query->have_posts()):$query->the_post();
            if ( has_post_thumbnail($post) ) {
                $thumb_id = get_post_thumbnail_id($post->ID);
                $thumb_src = wp_get_attachment_image_src($thumb_id, '16/9x', false );
                $thumb_alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
            } else {
                $thumb_src[0] = get_bloginfo( 'template_url' ) . '/default/default.jpg';
                $thumb_alt = 'Default Image';
            }
            $catList = ''; 
            foreach((get_the_category()) as $cat) {
                    $catID = get_cat_ID( $cat->cat_name );
                    if(!empty($catList)) { $catList .= ' / '; } 
                    $catList .= $cat->cat_name; 
            }
            $posts = array ('imgsrc' => $thumb_src,'imgalt' => $thumb_alt, 'category' => $catList, 'headline' => get_the_title(), 'url' => get_the_permalink());
            $rst[] = $posts;
        endwhile;
        wp_reset_postdata();
        $offset = $_POST['offset']+$_POST['posts_per_page'];
    endif;
    wp_send_json_success(array('post'=>$rst, 'offset'=>$offset));
}

function createPost( $postID ) {
    $thumb_id = get_post_thumbnail_id($postID);

    $xl = wp_get_attachment_image_src($thumb_id, '16/9x' );
    $l = wp_get_attachment_image_src($thumb_id, '16/9l' );
    $m = wp_get_attachment_image_src($thumb_id, '16/9m' );
    $s = wp_get_attachment_image_src($thumb_id, '16/9s' );
    $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true); ?>
    <figure class='ADK-Article'>
        <picture>
            <source media="(min-width: 961px)" srcset='<?php echo $xl[0] ?>'>
            <source media="(min-width: 640px) and (max-width: 960px)" srcset='<?php echo $l[0] ?>'>
            <source media="(max-width: 639px) and (min-width: 480px)" srcset='<?php echo $m[0] ?>'>
            <source media="(max-width: 479px)" srcset='<?php echo $s[0] ?>'>
            <img class='ADK-PostLargeImage' src='<?php echo $s[0] ?>' alt='<?php echo $alt; ?>'>
        </picture>
        <p><?php $catList = getCatList();  echo $catList; ?></p>
        <figcaption>
            <h3><?php echo get_the_title(); ?></h3>
        </figcaption>
        <a href='<?php echo get_the_permalink(); ?>'>
        </a>
    </figure><?php
}

function getCatList() {
    foreach( (get_the_category()) as $cat) { 
        $catID = get_cat_ID( $cat->cat_name ); 
        if(!empty($catList)) { 
            $catList .= ' / '; 
        }
        $catList .= $cat->cat_name; 
    } 
    return $catList;
}

function getRelatedPostsTag( $postID ) {
    $backupID = $postID;
    $tags = wp_get_post_tags( $postID );
    
    $related_posts = array();
    
    if ( $tags ) {
        foreach ( $tags as $post_tag ) {
            $args = array( 'tag__in' => $post_tag, 'caller_get_posts' => 1 );
            $my_query = new WP_Query($args);
            if( $my_query->have_posts() ) { while ($my_query->have_posts()) : $my_query->the_post();   
                $related_posts[] = get_the_ID( $post );
                endwhile;
            }
        }
        
        $related_posts = array_count_values( $related_posts );
        arsort( $related_posts );
        $related_posts = array_keys( $related_posts );

        $index = array_search( $backupID, $related_posts );
        if( $index !== false ) {
            unset( $related_posts[$index] );
        }
        
        $related_posts = array_slice( $related_posts, 0, 2);
        wp_reset_query();
        $args = array( 'post__in' => $related_posts, 'caller_get_posts' => 1 );
        $final_query = new WP_Query( $args );
        
        if( $final_query->have_posts() ){ while ( $final_query->have_posts()) : $final_query->the_post();
            $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = '' );
            $desktop = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = '16/9s' );
            $tablet = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = '16/9m' );
            $mobile = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = '8/3s' ); ?>

            <figure>
                <picture>
                    <source media="(max-width: 640px)" srcset='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-srcset='<?php echo $mobile[0] ?>'>
                    <source media="(min-width: 641px) and (max-width: 959px)" srcset='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-srcset='<?php echo $tablet[0] ?>'>
                    <source media="(min-width: 960px)" srcset='<?php echo $desktop[0] ?>'>
                    <img src='<?php echo $thumb[0] ?>' alt='<?php $thumbnail_id = get_post_thumbnail_id( $new_post->ID ); $img_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); echo $img_alt;  ?>'>
                </picture>
                <figcaption>
                    <h3><?php echo get_the_title(); ?></h3>
                </figcaption>
                <a href='<?php echo get_the_permalink(); ?>'></a>
            </figure><?php	endwhile;
        }
    }
}

?>