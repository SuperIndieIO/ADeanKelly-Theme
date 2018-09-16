<?php ?>
<!DOCTYPE html>
<html>
<head>
	<!--Styles-->
	<link rel="stylesheet"  type="text/css" href='<?php echo get_template_directory_uri(); ?>/style.css?r=<?php echo time(); ?>'/>
	<link rel="stylesheet"  type="text/css" href='<?php echo get_template_directory_uri(); ?>/style-home.css?r=<?php echo time(); ?>'/>
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Open+Sans|Roboto:400, 900" rel="stylesheet">
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'/>
	
	<link rel="icon" type="image/png" href="<?php echo get_bloginfo( 'wpurl' ); ?>/images/favicon.png">
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
	
	<?php if ( get_theme_mod( 'ADKThemeAdUnits-Adsense' ) ) : ?>
	<!--Adsense Code-->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<?php endif; ?>
	
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
	<?php if ( get_theme_mod( 'ADKThemeDesign-BackgroundHex' ) ) : ?>
	<style type='text/css'>
		html, body {
			background-color: <?php echo get_theme_mod("ADKThemeDesign-BackgroundHex"); ?>;
		}
	</style>
	<?php else : ?>
	<style type='text/css'>
		html, body {
			background-color: #E4E4E4;
		}
	</style>
	<?php endif; ?>
</head>
<body>
	<header>
		<a href='<?php echo esc_url( home_url( "/" ) ); ?>'>
			<?php if ( get_theme_mod( 'ADKThemeDesign-Header' )) : 
				// This is getting the image / url
				$headerlogo = get_theme_mod( 'ADKThemeDesign-Header' ); ?>
			<img class='ADK-LogoImg' src='<?php echo wp_get_attachment_url( $headerlogo ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' />
			<?php endif; ?>
		</a>
	</header>