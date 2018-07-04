<?php ?>
<!DOCTYPE html>

<head>
	<!--Styles-->
	<link rel="stylesheet"  type="text/css" href='<?php echo get_template_directory_uri(); ?>/style.css'/>
	<link rel="stylesheet"  type="text/css" href='<?php echo get_template_directory_uri(); ?>/style-home.css'/>
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Open+Sans|Roboto:400, 900" rel="stylesheet">
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'/>
	
	<link rel="icon" type="image/png" href="'.get_bloginfo( 'wpurl' ).'/images/favicon.png">
	<?php if ( get_theme_mod( 'ADKThemeDesign-ThemeColorHex' ) ) : ?>
    	<meta name='theme-color' content='<?php echo get_theme_mod("ADKThemeDesign-ThemeColorHex"); ?>' />
	<?php endif; ?>

	<!--Meta Info-->
    <title><?php echo get_bloginfo('name'); ?></title>
    <meta name='description' content='<?php echo get_bloginfo("description"); ?>'>
	<link rel='alternate' type='application/rss+xml' title='RSS' href='<?php echo get_bloginfo('rss2_url'); ?>' />
    <meta name='language' content='English'>
	<meta http-equiv="content-language" content="en-us">
	
	<!--Meta Verification-->
	<?php if ( get_theme_mod( 'ADKThemeHeadCode-GoogleMeta' ) ) : ?>
		<meta name="google-site-verification" content="<?php echo get_theme_mod("ADKThemeHeadCode-GoogleMeta"); ?>"/>
	<?php endif; ?>
	<?php if ( get_theme_mod( 'ADKThemeHeadCode-MicrosoftMeta' ) ) : ?>
		<meta name="msvalidate.01" content="<?php echo get_theme_mod("ADKThemeHeadCode-MicrosoftMeta"); ?>"/>
	<?php endif; ?>
	
	<!--Facebook Meta Info-->
	<meta property='og:title' content='<?php echo get_bloginfo('name'); ?>'/>
	<meta property='og:type' content='website'/>
	<meta property='og:url' content='<?php echo esc_url( home_url( '/' ) ); ?>'/>
	<meta property='og:description' content='<?php echo get_bloginfo("description"); ?>'/>

	<!--Twitter Meta Info-->
	<meta name='twitter:card' content='summary'/>
	<meta name='twitter:url' content='<?php echo esc_url( home_url( '/' ) ); ?>'/>
	<meta name='twitter:title' content='<?php echo get_bloginfo('name'); ?>'>
	<meta name='twitter:image' content='<?php echo get_bloginfo("description"); ?>'>
	
	<!--Adsense Code-->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	
	<!--Schema.org JSON Markup-->
	<script type="application/ld+json">
	{
		"@context" : "http://schema.org",
		"@type" : "Blog"
	}
	</script>
	
	<!--Custom Theme Code-->
	<?php echo get_theme_mod('ADKThemeHeadCode-Additional'); ?>
	
	<!--Set Top Level Site CSS-->
	<style type='text/css'>
	<?php if ( get_theme_mod( 'ADKThemeDesign-BackgroundHex' ) ) : ?>
		html, body {
			background-color: <?php echo get_theme_mod("ADKThemeDesign-BackgroundHex"); ?>;
		}
		<?php else : ?>
		html, body {
			background-color: #E4E4E4;
		}
		<?php endif; ?>
	</style>