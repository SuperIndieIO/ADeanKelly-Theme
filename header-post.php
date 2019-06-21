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
<link rel="stylesheet"  type="text/css" href='<?php bloginfo('template_url'); ?>/style-post.css'/>
<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto:400, 900" rel="stylesheet">
<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'/>   

<link rel="icon" type="image/png" href="<?php $favicon = get_theme_mod( 'ADKThemeDesign-Favicon' ); echo wp_get_attachment_url( $favicon ); ?>">
<meta name='theme-color' content='<?php echo get_theme_mod("ADKThemeDesign-ThemeColorHex"); ?>' />

<!--Meta Info-->
<?php the_post(); ?><!--Gather Post Excerpt Information for Meta Tags-->  
<?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'postx' ); ?> 
<title><?php echo get_the_title(); ?> | <?php echo get_bloginfo('name'); ?></title>
<meta name='title' content='<?php echo get_the_title(); ?> | <?php echo get_bloginfo('name'); ?>'>
<meta name='description' content='<?php echo(get_the_excerpt()); ?>'>
<meta name='section' content='<?php $catList = ''; foreach((get_the_category()) as $cat) { $catID = get_cat_ID( $cat->cat_name ); if(!empty($catList)) { $catList .= ', '; } $catList .= $cat->cat_name; } echo $catList; ?>'>
<meta name='keywords' content='<?php $my_tags = get_the_tags(); if ( $my_tags ) { foreach ( $my_tags as $tag ) { $tag_names[] = $tag->name; } echo implode( ', ', $tag_names ); }?>'>
<meta name='language' content='English'>
<meta http-equiv="content-language" content="en-us">

<!--AMP and Permalink Info-->
<link rel='canonical' href='<?php echo get_the_permalink(); ?>'>
<?php if ( post_supports_amp($post) ) { echo "<link rel='amphtml' href='"; echo get_the_permalink(); echo "amp/'>"; } ?>


<!--Facebook Meta Info-->
<meta property='og:type' content='article'>
<meta property='og:title' content='<?php echo get_the_title(); ?>'>
<meta property='og:url' content='<?php echo get_the_permalink(); ?>'>
<meta property='og:image:secure_url' content='<?php echo $thumb[0] ?>'>
<meta property='og:description' content='<?php get_the_excerpt(); ?>'>
<meta property='article:section' content='<?php echo $catList; ?>'>
<meta property='article:tag' content='<?php echo implode( ', ', $tag_names ); ?>'>
<meta property="article:published_time" content='<?php the_time("c"); ?>'>
<meta property='article:modified_time' content='<?php the_modified_time("c");?>'>
<meta property='og:site_name' content='<?php echo get_bloginfo('name'); ?>'>
<!--TBD: <meta property='fb:app_id' content='585600295152171'>-->

<!--Twitter Meta Info-->
<meta name='twitter:card' content='summary_large_image'>
<meta name='twitter:url' content='<?php echo get_the_permalink(); ?>'>
<meta name='twitter:title' content='<?php echo get_the_title(); ?>'>
<meta name='twitter:image' content='<?php echo $thumb[0] ?>'>
<meta name='twitter:description' content='<?php echo strip_tags(get_the_excerpt($post->ID)); ?>'>
<!--TBD: <meta name='twitter:site' content='@OtakuVoice'>-->
<meta name='twitter:creator' content='@<?php if(the_author_meta( 'twitter' )){the_author_meta( 'twitter' );}; ?>'>

<!--Schema.org JSON Markup-->
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
    "width" : "1280",
    "height" : "720"
  },
  "articleSection" : "<?php echo $catList; ?>",
  "keywords" : "<?php echo implode( ', ', $tag_names ); ?>",
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

<!--Custom Theme Code-->
<?php echo get_theme_mod('ADKThemeHeadCode-Additional'); ?>