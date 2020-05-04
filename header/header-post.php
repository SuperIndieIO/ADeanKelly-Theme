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
<link rel="stylesheet"  type="text/css" href='<?php bloginfo('template_url'); ?>/style/style-post.css'/>
<link rel="stylesheet"  type="text/css" href='<?php bloginfo('template_url'); ?>/style/style-gutenberg.css'/>


<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'/>   
<meta name='theme-color' content='<?php echo get_theme_mod("ADKThemeDesign-ThemeColorHex"); ?>' />

<link rel="icon" type="image/png" href="<?php $favicon = get_theme_mod( 'ADKThemeDesign-Favicon' ); echo wp_get_attachment_url( $favicon ); ?>">
<link href="https://fonts.googleapis.com/css?family=Arimo:400,700|Open+Sans:400,700&display=swap" rel="stylesheet">

<!--Meta Info-->
<?php the_post(); ?><!--Gather Post Excerpt Information for Meta Tags-->  
<?php 
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'postx' );
    $thumbtype = wp_check_filetype( $thumb[0] );
?>
<title><?php echo get_the_title(); ?> | <?php echo get_bloginfo('name'); ?></title>
<meta name='title' content="<?php echo get_the_title(); ?> | <?php echo get_bloginfo('name'); ?>">
<meta name='description' content="<?php echo(get_the_excerpt()); ?>">
<meta name='section' content='<?php echo getCatList( ', ' ); ?>'/>
<meta name='keywords' content='<?php echo getTagList(', '); ?>'>
<meta name='language' content='English'>
<meta http-equiv="content-language" content="en-us">

<!--AMP and Permalink Info-->
<link rel='canonical' href='<?php echo get_the_permalink(); ?>'>
<?php if ( post_supports_amp( $post ) ) { echo "<link rel='amphtml' href='"; echo get_the_permalink(); echo "amp/'>"; } ?>


<!--OG Graph Info-->
<meta property='og:type' content='article'>
<meta property='og:title' content='<?php echo get_the_title(); ?>'>
<meta property='og:site_name' content='<?php echo get_bloginfo('name'); ?>'>
<meta property='og:url' content='<?php echo get_the_permalink(); ?>'>
<meta property='og:description' content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>">

<meta property='og:image' content='<?php echo $thumb[0]; ?>'>
<meta property='og:image:secure_url' content='<?php echo $thumb[0]; ?>'>
<meta property='og:image:width' content='<?php echo $thumb[1]; ?>'>
<meta property='og:image:height' content='<?php echo $thumb[2]; ?>'>
<meta property='og:image:type' content='image/<?php echo $thumbtype['ext']; ?>'>

<meta property='article:section' content='<?php echo getCatList( ', ' ); ?>'>
<meta property='article:tag' content='<?php echo getTagList(', '); ?>'>
<meta property="article:published_time" content='<?php the_time("c"); ?>'>
<meta property='article:modified_time' content='<?php the_modified_time("c");?>'>
<meta property='fb:app_id' content='585600295152171'>

<!--Twitter Meta Info-->
<meta name='twitter:card' content='summary_large_image'>
<meta name='twitter:url' content='<?php echo get_the_permalink(); ?>'>
<meta name='twitter:title' content='<?php echo get_the_title(); ?>'>
<meta name='twitter:image' content='<?php echo $thumb[0] ?>'>
<meta name='twitter:description' content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>">
<meta name='twitter:site' content='@<?php if(get_theme_mod('ADKThemeSocialMedia-Twitter')) {echo get_theme_mod( 'ADKThemeSocialMedia-Twitter' );}; ?>'>
<meta name='twitter:creator' content='@<?php if(the_author_meta( 'twitter' )){the_author_meta( 'twitter' );}; ?>'>

<!--Article Schema Markup-->
<script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "Article",
  "headline" : "<?php echo get_the_title(); ?>",
  "description" : "<?php echo(get_the_excerpt()); ?>",
  "author" : {
    "@type" : "Person",
    "name" : "<?php echo get_the_author_meta( 'user_nicename' ); ?>",
    "sameas" : "https://twitter.com/<?php the_author_meta( 'twitter' ); ?>"
    },
  "datePublished" : "<?php the_time("M j, Y"); ?>",
  "dateModified" : "<?php the_time("M j, Y"); ?>",
  "image" : {
    "@type" : "ImageObject",
    "url" : "<?php echo $thumb[0] ?>",
    "width" : "<?php echo $thumb[1] ?>",
    "height" : "<?php echo $thumb[2] ?>"
  },
  "articleSection" : "<?php echo getCatList(', '); ?>",
  "keywords" : "<?php echo getTagList(', '); ?>",
  "url" : "<?php echo get_the_permalink(); ?>",
  "mainEntityOfPage" : {
     "@type": "WebPage",
     "@id": "<?php echo get_the_permalink(); ?>"
    },
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
        "sameas" : [ <?php if (get_theme_mod( 'ADKThemeSocialMedia-Youtube' )) : ?>"https://youtube.com/<?php echo get_theme_mod( 'ADKThemeSocialMedia-Youtube' ); ?>",<?php endif; ?><?php if (get_theme_mod( 'ADKThemeSocialMedia-Twitter' )) : ?>"https://twitter.com/<?php echo get_theme_mod( 'ADKThemeSocialMedia-Twitter' ); ?>",<?php endif; ?><?php if (get_theme_mod( 'ADKThemeSocialMedia-Facebook' )) : ?>"https://facebook.com/<?php echo get_theme_mod( 'ADKThemeSocialMedia-Facebook' ); ?>",<?php endif; ?><?php if (get_theme_mod( 'ADKThemeSocialMedia-Tumblr' )) : ?>"https://tumblr.com/<?php echo get_theme_mod( 'ADKThemeSocialMedia-Tumblr' ); ?>"<?php endif; ?>]
    }
}
</script>
<!--Breadcrumb Schema Markup-->
<script type="application/ld+json">
{
	"@context" : "http://schema.org",
	"@type": "BreadcrumbList",
        "name": "Breadcrumb List",
  		"itemListElement": [{
    		"@type": "ListItem",
    		"position": 1,
    		"name": "<?php echo get_bloginfo('name'); ?>",
   			"item": "<?php echo esc_url( home_url( '/' ) ); ?>" },
            { "@type": "ListItem",
    		"position": 2,
    		"name": "<?php echo get_the_title(); ?>",
   			"item": "<?php echo get_the_permalink(); ?>" }]
}
</script>

<!--Enable Advertising-->
<script type="application/javascript">
    var ArticleAdvertising = true;
    var SidebarAdvertising = true;
    var CategoryList = ["<?php echo getCatList('", "'); ?>"];
    var TagList = ["<?php echo getTagList('", "'); ?>"];
</script>

<!--Custom Theme Code-->
<?php echo get_theme_mod('ADKThemeHeadCode-Additional'); ?>