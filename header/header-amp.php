<head>
    <!--AMP Information-->
    <title><?php echo get_the_title(); ?> | <?php echo get_bloginfo('name'); ?></title>
    <meta charset="utf-8">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <script async custom-element="amp-font" src="https://cdn.ampproject.org/v0/amp-font-0.1.js"></script>
    <script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
    <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
    <script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>

    <!--Styles-->
    <link rel="icon" type="image/png" href="<?php $favicon = get_theme_mod( 'ADKThemeDesign-Favicon' ); echo wp_get_attachment_url( $favicon ); ?>">
    <link href="https://fonts.googleapis.com/css?family=Arimo:400,700|Open+Sans:400,700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"> 
    <meta name='theme-color' content='<?php echo get_theme_mod("ADKThemeDesign-ThemeColorHex"); ?>' />
    <link rel="canonical" href='<?php echo get_the_permalink(); ?>'>
    
	<!--AMP Styles-->
    <style amp-custom>
        :root {
		--text-bgc-alpha: <?php echo get_theme_mod("ADKThemeDesign-TextBackgroundColorAlpha"); ?>;
		--text-bgc-beta: <?php echo get_theme_mod("ADKThemeDesign-TextBackgroundColorBeta"); ?>;
		--text-bgc-omega: <?php echo get_theme_mod("ADKThemeDesign-TextBackgroundColorOmega"); ?>;
        }
        html, body {
            background-color: <?php echo get_theme_mod("ADKThemeDesign-BackgroundHex"); ?>;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Arimo', sans-serif;
        }
        p, a, time {
            font-family: 'Open Sans', sans-serif;
        }
        a {
            height: 0;
            text-decoration: none;
            color: #484848;
        }
        main {
            margin: 0 auto;
            max-width: 760px;
            display: grid;
            grid-template-columns: 1fr;
        }
        article {
            margin: 0 16px;
        }
        h1 {
            margin: 12px 0 4px 0;
            color: #333333;
            font-size: 2em;
            line-height: 1em;
            font-family: 'Arimo', sans-serif;
        }
        h2 {
            margin: 8px 0;
            color: #757575;
            font-size: 18px;
            font-weight: 400;
            font-family: 'Arimo', sans-serif;
        }
        #post-author {
            margin: 16px 0;
            padding: 6px 0;
            border-top: #757575 1px solid;
            border-bottom: #757575 1px solid;
            font-weight: 600;
        }
        #post-author > a {
            color: #484848;
            text-decoration: none;
            }
        #post-date {
            margin: 0;
            color: #484848;
            float: right;
        }
        article {
            color: #484848;
            font-weight: 400;
        }
        #OV-PostSocialMedia {
            display: inline-block;
            padding: 8px 0 1px 0;
            margin: 0 0 16px 0;
            width: 100%;
            text-align: center;
            }
        .OV-RelatedCategoryIMG {
            border-radius: 4px;
        }
        .OV-RelatedCategoryText {
            margin: 8px 0 16px 0;
            color: #757575;
            font-size: 20px;
            font-weight: 700;
            
        }
        /*Footer IDs */
        footer {
            display: grid;
            width: 100%;
            margin: 16px 0 0 0;
            padding: 16px 0;
            min-height: 32px;
            grid-template-columns: 1fr minmax(auto, 760px) 1fr;
            background: -moz-linear-gradient(90deg, var(--text-bgc-alpha, #0F2027) 0%, var(--text-bgc-beta, #203A43) 50%, var(--text-bgc-omega, #2c5364) 100%);
            background: -webkit-linear-gradient(90deg, var(--text-bgc-alpha, #0F2027) 0%, var(--text-bgc-beta, #203A43) 50%, var(--text-bgc-omega, #2c5364) 100%);
            background: linear-gradient(90deg, var(--text-bgc-alpha, #0F2027) 0%, var(--text-bgc-beta, #203A43) 50%, var(--text-bgc-omega, #2c5364) 100%);
        }
        #footer-section {
            display: grid;
            grid-column: 2;
            grid-template-columns: auto auto auto;
            grid-gap: 32px;
            justify-content: end;
            align-content: center;
        }
        nav#menu-footer-menu {
            display: grid;
            grid-auto-columns: max-content;
            grid-column-gap: 16px;
            grid-template-rows: auto auto auto;
            grid-auto-flow: column dense;
        }
        #alt-logo {
            max-height: 64px;
        }
        .menu-item {
            list-style-type: none;
            font-size: 0.8em;
            font-family: 'Open Sans', sans-serif;
            line-height: 1.6em;
        }
        .menu-item a {
            color: #ffffff;
            text-decoration: none;
            }
        #social-media-follow {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
        .social-image-follow {
            display: inline-block;
            width: 24px;
            height: 24px;
            margin: 0 6px;
            border-radius: 50%;
            }
        #footer-social {
            display: grid;
            grid-template-columns: 1fr 1fr;
            width: 100%;
            text-align: center;
            }
        .header-logo {
            margin: 0 auto;
            display: block;
        }
        .featured-image {
            border-radius: 4px;
        }
        /*Social Media Classes*/
        .social-image {
            display: inline-block;
            width: 32px;
            height: 32px;
            margin: 0 6px;
            border-radius: 50%;
            }
        .social-image-follow {
            display: inline-block;
            width: 32px;
            height: 32px;
            margin: 0 6px;
            border-radius: 50%;
            }
        /*Embed-Container*/
        .embed-container, .wp-embed-aspect-16-9, .wp-block-embed-youtube {
            position: relative;
            margin: 1em 0 1em 0;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            max-width: 100%;
        }
        .embed-container iframe, .embed-container object, .embed-container embed, .wp-block-embed-youtube iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
    <style amp-boilerplate> body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
	
	<?php the_post(); ?><!--Gather Post Excerpt Information for Meta Tags-->  
	<?php $post = get_the_ID(); ?>
    <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-amp' ); ?> 
	
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
	  "image" : "<?php echo $thumb[0] ?>",
	  "articleSection" : "<?php echo getCatList(', '); ?>",
	  "keywords" : "<?php echo getTagList(', '); ?>",
	  "url" : "<?php echo get_the_permalink(); ?>",
	  "mainEntityOfPage": {
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
			"sameas" : [   
                <?php if (get_theme_mod( 'ADKThemeSocialMedia-Youtube' )) : ?>"https://youtube.com/<?php echo get_theme_mod( 'ADKThemeSocialMedia-Youtube' ); ?>",<?php endif; ?>
                <?php if (get_theme_mod( 'ADKThemeSocialMedia-Twitter' )) : ?>"https://twitter.com/<?php echo get_theme_mod( 'ADKThemeSocialMedia-Twitter' ); ?>",<?php endif; ?>
                <?php if (get_theme_mod( 'ADKThemeSocialMedia-Facebook' )) : ?>"https://facebook.com/<?php echo get_theme_mod( 'ADKThemeSocialMedia-Facebook' ); ?>",<?php endif; ?>
                <?php if (get_theme_mod( 'ADKThemeSocialMedia-Tumblr' )) : ?>"https://tumblr.com/<?php echo get_theme_mod( 'ADKThemeSocialMedia-Tumblr' ); ?>"<?php endif; ?>]
		}
	}
	</script>
</head>