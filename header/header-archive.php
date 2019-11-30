<!--Styles-->
<style type='text/css'>
	:root {
		--text-bgc-alpha: <?php echo get_theme_mod("ADKThemeDesign-TextBackgroundColorAlpha"); ?>;
		--text-bgc-beta: <?php echo get_theme_mod("ADKThemeDesign-TextBackgroundColorBeta"); ?>;
		--text-bgc-omega: <?php echo get_theme_mod("ADKThemeDesign-TextBackgroundColorOmega"); ?>;
	}
	html, body {
		background-color: <?php echo get_theme_mod("ADKThemeDesign-BackgroundHex"); ?>;
	}
</style>
<link rel="stylesheet"  type="text/css" href='<?php bloginfo('template_url'); ?>/style.css'/>
<link rel="stylesheet"  type="text/css" href='<?php bloginfo('template_url'); ?>/style/style-home.css'/>
<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto:400, 900" rel="stylesheet">
<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'/>

<link rel="icon" type="image/png" href="<?php echo get_bloginfo( 'wpurl' ); ?>/images/favicon.png">
<meta name='theme-color' content='<?php echo get_theme_mod("ADKThemeDesign-ThemeColorHex"); ?>' />

<!--Meta Info-->
<title>Archive | Page <?php echo $paged; ?> | <?php echo get_bloginfo('name'); ?></title>
<meta name='description' content='<?php echo get_bloginfo("description"); ?>'>
<link rel='alternate' type='application/rss+xml' title='RSS' href='<?php echo get_bloginfo('rss2_url'); ?>' />
<meta name='language' content='English'>
<meta http-equiv="content-language" content="en-us">

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

<!--Schema.org JSON Markup-->
<script type="application/ld+json">
{
	"@context" : "http://schema.org",
	"@type" : "Blog"
}
</script>

<!--Check Page Type-->
<script type='text/javascript'>
    var PageType = 'archive';
</script>

<!--Custom Theme Code-->
<?php echo get_theme_mod('ADKThemeHeadCode-Additional'); ?>
