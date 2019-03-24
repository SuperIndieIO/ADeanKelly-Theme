<!doctype HTML>
<html>
    <head>
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
        <link rel="stylesheet"  type="text/css" href='<?php bloginfo('template_url'); ?>/style-404.css'/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto:400, 900" rel="stylesheet">
        <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'/>

        <link rel="icon" type="image/png" href="<?php echo get_bloginfo( 'wpurl' ); ?>/images/favicon.png">
        <meta name='theme-color' content='<?php echo get_theme_mod("ADKThemeDesign-ThemeColorHex"); ?>' />

        <!--Meta Info-->
        <title>404 | <?php echo get_bloginfo('name'); ?></title>
        <meta name='description' content='<?php echo get_bloginfo("description"); ?>'>
        <link rel='alternate' type='application/rss+xml' title='RSS' href='<?php echo get_bloginfo('rss2_url'); ?>' />
        <meta name='language' content='English'>
        <meta http-equiv="content-language" content="en-us">

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
                        "https://twitter.com/<?php echo get_theme_mod( 'ADKThemeSocialMedia-Twitter' ); ?>",
                        "https://facebook.com/<?php echo get_theme_mod( 'ADKThemeSocialMedia-Facebook' ); ?>"
                        "https://tumblr.com/<?php echo get_theme_mod( 'ADKThemeSocialMedia-Tumblr' ); ?>"
                        ]
                }
        }
        </script>

        <!--Custom Theme Code-->
        <?php echo get_theme_mod('ADKThemeHeadCode-Additional'); ?>
        
    </head>
    <body>
        <header>
            <a href='<?php echo esc_url( home_url( "/" ) ); ?>'>
                <?php $headerlogo = get_theme_mod( 'ADKThemeDesign-Header' ); ?>
			<img class='ADK-LogoImg' src='<?php echo wp_get_attachment_url( $headerlogo ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' />
            </a>
        </header>
        <main>
            <h1>404</h1>
            <p>Sorry, We couldn't find the page you were looking for.</p>
            <p>Here are a few recent articles to check out.</p>
        </main>
        <footer>
            <?php get_footer(); ?>
        </footer>
    </body>
</html>