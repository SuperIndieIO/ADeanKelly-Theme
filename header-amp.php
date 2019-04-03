<head>
    <!--AMP Information-->
    <meta charset="utf-8">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <script async custom-element="amp-font" src="https://cdn.ampproject.org/v0/amp-font-0.1.js"></script>
    <script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
    <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
	<script async custom-element="amp-auto-ads" src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js"></script>
    <script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>

    <!--Styles-->
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-96x96.ico" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"> 
    <meta name='theme-color' content='#00796B' />
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
            font-family: 'Roboto';
        }
        p, a {
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
        #OV-AMPHeader > img {
            margin: 8px auto;
            background-color: #00796B;
        }
        #OV-AMPHeader-IMG {
            margin: 8px 8px 3px 8px;
        }
        #OV-PostBody {
            margin: 0 16px;
        }
        #OV-PostHeadline {
            margin: 16px 0;
            color: #484848;
            font-weight: 900;
        }
        #OV-PostSubHeadline {
            margin: 8px 0;
            color: #757575;
            font-size: 20px;
            font-weight: 700;
            font-style: italic;
        }
        #OV-PostAuthor {
            margin: 16px 0;
            padding: 6px 0;
            border-top: #757575 1px solid;
            border-bottom: #757575 1px solid;
            font-weight: 600;
        }
        #OV-PostAuthor > a {
            color: #484848;
            text-decoration: none;
            }
        #OV-PostDate {
            margin: 0;
            color: #484848;
            float: right;
        }
        #OV-BodyText {
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
        #OV-FooterLogo {
            display: block;
            margin: 8px auto;
            }
        #OV-FooterInfo {
            display: table;
            margin: 8px auto;
            }
        #OV-FooterInfo > a {
            display: inline-table;
            margin: 0 8px;
            color: #484848;
            text-decoration: none;
            font-family: 'Open Sans', sans-serif;
            }
        #OV-FooterSocialIcons {
            display: inline-block;
            padding: 8px 0 1px 0;
            width: 100%;
            text-align: center;
            }
        .header-logo {
            height: 72px;
            width: 360px;
            margin: 16px auto;
            display: block;
        }
        .featured-image {
            margin: 0 8px;
            border-radius: 4px;
        }
        .embed-container {
            height: 0;
            padding-bottom: 56.25%;
        }
        .embed-container amp-iframe {
            height: 0;
            padding-bottom: 56.25%;
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
		"sameas" : "https://twitter.com/<?php the_author_meta( twitter ); ?>"
		},
	  "datePublished" : "<?php the_time("M j, Y"); ?>",
	  "dateModified" : "<?php the_time("M j, Y"); ?>",
	  "image" : "<?php echo $thumb[0] ?>",
	  "articleSection" : "<?php $catList = ''; foreach((get_the_category()) as $cat) { $catID = get_cat_ID( $cat->cat_name ); if(!empty($catList)) { $catList .= ', '; } $catList .= $cat->cat_name; } echo $catList; ?>",
	  "keywords" : "<?php $my_tags = get_the_tags(); if ( $my_tags ) { foreach ( $my_tags as $tag ) { $tag_names[] = $tag->name; } echo implode( ', ', $tag_names ); }?>",
	  "url" : "<?php echo get_the_permalink(); ?>",
	  "mainEntityOfPage": {
         "@type": "WebPage",
         "@id": "<?php echo get_the_permalink(); ?>"
      	},
	  "publisher" : {
	  	"@type" : "Organization",
    	"name" : "Otaku Voice",
		"url" : "https://otakuvoice.com",
		"logo" : {
            "@type": "ImageObject",
            "name": "Otaku Voice Logo",
            "width": "64",
            "height": "64",
            "url": "<?php echo get_template_directory_uri(); ?>/img/ov-logo-64.png"
        	},
		"sameas" : [
			"https://twitter.com/OtakuVoice",
			"https://facebook.com/TheOtakuVoice",
			"https://theotakuvoice.tumblr.com"
  			]
		}
	}
	</script>
</head>