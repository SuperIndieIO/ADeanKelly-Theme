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
<link rel="stylesheet"  type="text/css" href='<?php bloginfo('template_url'); ?>/style/style-archive.css'/>
<link href="https://fonts.googleapis.com/css?family=Arimo:400,700|Open+Sans:400,700&display=swap" rel="stylesheet">
<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'/>

<link rel="icon" type="image/png" href="<?php $favicon = get_theme_mod( 'ADKThemeDesign-Favicon' ); echo wp_get_attachment_url( $favicon ); ?>">
<meta name='theme-color' content='<?php echo get_theme_mod("ADKThemeDesign-ThemeColorHex"); ?>' />

<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

<!--Meta Info-->
<title><?php single_tag_title(); ?> Tag | Page <?php echo $paged; ?> | <?php echo get_bloginfo('name'); ?></title>
<meta name='description' content='<?php echo get_bloginfo("description"); ?>'>
<link rel='alternate' type='application/rss+xml' title='RSS' href='<?php echo get_bloginfo('rss2_url'); ?>' />
<meta name='language' content='English'>
<meta http-equiv="content-language" content="en-us">

<!--Facebook Meta Info-->
<meta property='og:title' content='<?php single_tag_title(); ?> Tag | Page <?php echo $paged; ?> | <?php echo get_bloginfo('name'); ?>'/>
<meta property='og:type' content='website'/>
<meta property='og:url' content='<?php echo esc_url( home_url( '/' ) ); ?>'/>
<meta property='og:description' content='<?php echo get_bloginfo("description"); ?>'/>

<!--Twitter Meta Info-->
<meta name='twitter:card' content='summary'/>
<meta name='twitter:url' content='<?php echo esc_url( home_url( '/' ) ); ?>'/>
<meta name='twitter:title' content='<?php single_tag_title(); ?> Tag | Page <?php echo $paged; ?> | <?php echo get_bloginfo('name'); ?>'>
<meta name='twitter:image' content='<?php echo get_bloginfo("description"); ?>'>

<!--Schema.org JSON Markup-->
<script type="application/ld+json">
{
	"@context" : "http://schema.org",
	"@type" : "Blog",
	"publisher" : {
		"@type" : "Organization",
		"name" : "<?php echo get_bloginfo('name'); ?>",
		"description" : "<?php echo get_bloginfo("description"); ?>",
		"url" : "<?php echo esc_url( home_url( '/' ) ); ?>",
		"logo" : {
			"@type": "ImageObject",
			"name": "<?php echo get_bloginfo('name'); ?> Logo",
			"width": "640",
			"height": "128",
			"url": "<?php $headerlogo = get_theme_mod( 'ADKThemeDesign-Header' ); echo wp_get_attachment_url( $headerlogo ); ?>"
			},
			"sameas" : [   
                <?php if (get_theme_mod( 'ADKThemeSocialMedia-Youtube' )) : ?>"https://youtube.com/<?php echo get_theme_mod( 'ADKThemeSocialMedia-Youtube' ); ?>",<?php endif; ?>
                <?php if (get_theme_mod( 'ADKThemeSocialMedia-Twitter' )) : ?>"https://twitter.com/<?php echo get_theme_mod( 'ADKThemeSocialMedia-Twitter' ); ?>",<?php endif; ?>
                <?php if (get_theme_mod( 'ADKThemeSocialMedia-Facebook' )) : ?>"https://facebook.com/<?php echo get_theme_mod( 'ADKThemeSocialMedia-Facebook' ); ?>",<?php endif; ?>
                <?php if (get_theme_mod( 'ADKThemeSocialMedia-Tumblr' )) : ?>"https://tumblr.com/<?php echo get_theme_mod( 'ADKThemeSocialMedia-Tumblr' ); ?>"<?php endif; ?>]
		}
}
</script>
<!--Breadcrumb Schema-->
<script type="application/ld+json">
{
	"@context" : "http://schema.org",
	"@type": "BreadcrumbList",
  		"itemListElement": [{
    		"@type": "ListItem",
    		"position": 1,
    		"name": "<?php echo get_bloginfo('name'); ?>",
   			"item": "<?php echo esc_url( home_url( '/' ) ); ?>" },
            { "@type": "ListItem",
    		"position": 2,
    		"name": "<?php single_tag_title(); ?>",
   			"item": "<?php echo get_tag_link( get_queried_object()->term_id ); ?>" }]
}
</script>

<!--Get Tag-->
<script type='text/javascript'>
    var PageTag = '<?php echo get_queried_object()->term_id; ?>';
    var PageType = 'tag';
</script>

<!--Custom Theme Code-->
<?php echo get_theme_mod('ADKThemeHeadCode-Additional'); ?>
