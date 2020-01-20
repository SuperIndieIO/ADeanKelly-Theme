<!doctype HTML>
<html amp lang="en">
<?php get_template_part( 'header/header', 'amp' ); ?>
<body>
    <!--Wordpress loop code-->
        <?php $post = get_the_ID(); ?>
        <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), '16/9x' ); ?>
        <?php $alt_text = get_post_meta($post->ID, '_wp_attachment_image_alt', true); ?>
    <header>
        <a href='<?php echo esc_url( home_url( "/" ) ); ?>'>
            <?php $headerlogo = get_theme_mod( 'ADKThemeDesign-Header' ); ?>
            <amp-img class='header-logo' src='<?php echo wp_get_attachment_url( $headerlogo ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' height='48' width='270'/>
        </a>
    </header>
    <main>
        <!--Article Image-->
        <article>
        <amp-img src='<?php echo $thumb[0] ?>' width="16" height="9" layout="responsive" class='featured-image'></amp-img>
        <!--Article content-->
        <h1><?php echo get_the_title(); ?></h1>
        <h2><?php echo(get_the_excerpt()); ?></h2>
        <section id='post-author'>
            <a href='<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>' rel='author'><?php the_author(); ?></a> | <a href='https://www.twitter.com/<?php the_author_meta( "twitter" ); ?>'>@<?php if(the_author_meta( 'twitter' )){the_author_meta( 'twitter' );}; ?></a>
            <time id='post-date'>
                <?php the_time("M j, Y"); ?>
            </time>
        </section>        
        <?php $text = $this->get( 'post_amp_content' ); ?>
        <?php $array = explode("<h3>", $text); $slot = 1; ?>
        <?php $apost = "'"; ?>
        <?php $my_tags = get_the_tags(); foreach ( $my_tags as $tag ) { $tag_names[] = $tag->name; } $the_tags = json_encode($tag_names, JSON_HEX_AMP); ?>
        <?php $my_cat = get_the_category(); foreach ( $my_cat as $cat ) { $cat_names[] = $cat->name; } $the_cats = json_encode( $cat_names, JSON_HEX_AMP ); ?>
        <?php for($i = 0; $i < sizeof($array); $i++) { 
            $targeting = array('slot'=>$slot, 'tag'=>$the_tags);
                echo $array[$i].'
                <amp-ad layout="responsive" width=320 height=100
                    type="doubleclick"
                    data-slot="'; echo get_theme_mod("ADKThemeAdUnits-InArticle");
                    echo '" data-multi-size="320x50,300x250"
                    data-multi-size-validation="false"
                    json='.$apost.'{"targeting":{"slot":"'.$slot.'","tag":'.$the_tags.',"category":'.$the_cats.'}}'.$apost.'>
                    <div placeholder></div>
                    <div fallback></div>
                </amp-ad><h3>';
                $slot++; }?>
            
        <!--Social media sharing link-->
            <div id='ADK-PostSocialMedia'>
            <a href="http://twitter.com/share" target='_blank'>
                <amp-img src='<?php echo get_template_directory_uri(); ?>/social-icons/twitter.svg' class='social-image' layout='fixed' height='32' width='32'/></a>

            <a href='https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>' target='_blank'>
                <amp-img src='<?php echo get_template_directory_uri(); ?>/social-icons/facebook.svg' class='social-image' layout='fixed' height='32' width='32'/></a>

            <a href='http://tumblr.com/widgets/share/tool?canonicalUrl=<?php echo get_the_permalink(); ?>' target='_blank'>
                <amp-img src='<?php echo get_template_directory_uri(); ?>/social-icons/tumblr.svg' class='social-image' layout='fixed' height='32' width='32'/></a>

            <a href='http://www.reddit.com/submit?url=<?php echo get_the_permalink(); ?>&title=<?php echo get_the_title(); ?>' target='_blank'>
                <amp-img src='<?php echo get_template_directory_uri(); ?>/social-icons/reddit.svg' class='social-image' layout='fixed' height='32' width='32'/></a>
            </div>
        </article>
    </main>
    <footer>
        <!--Custom Theme Code-->
        <?php echo get_theme_mod('ADKThemeAMPCode-Before'); ?>
        
        <section id='footer-section'>
        <?php 
            $menuone = array(
                'theme_location'  => 'footer-menu-1',
                'container'       => '',
                'items_wrap'      => '<nav id="%1$s" class="%2$s">%3$s</nav>',
                'depth'           => 0 );
            $menutwo = array(
                'theme_location'  => 'footer-menu-2',
                'container'       => '',
                'items_wrap'      => '<nav id="%1$s" class="%2$s">%3$s</nav>',
                'depth'           => 0 );
            $menuthree = array(
                'theme_location'  => 'footer-menu-3',
                'container'       => '',
                'items_wrap'      => '<nav id="%1$s" class="%2$s">%3$s</nav>',
                'depth'           => 0 );
        ?>
        <?php wp_nav_menu( $menuone ); wp_nav_menu( $menutwo ); wp_nav_menu( $menuthree ); ?>
        
        <section id='footer-social'>
            <?php if (get_theme_mod( 'ADKThemeSocialMedia-Youtube' )) : ?>
            <a href="https://youtube.com/<?php echo get_theme_mod( 'ADKThemeSocialMedia-Youtube' ); ?>" target='_blank'>
            <amp-img src='<?php echo get_template_directory_uri(); ?>/social-icons/youtube.svg' class='social-image-follow' layout='fixed' height='24' width='24'/></a>
            <?php endif; ?>
            
            <?php if (get_theme_mod( 'ADKThemeSocialMedia-Twitter' )) : ?>
            <a href="https://twitter.com/<?php echo get_theme_mod( 'ADKThemeSocialMedia-Twitter' ); ?>" target='_blank'>
            <amp-img src='<?php echo get_template_directory_uri(); ?>/social-icons/twitter.svg' class='social-image-follow' layout='fixed' height='24' width='24'/></a>
            <?php endif; ?>
                
            <?php if (get_theme_mod( 'ADKThemeSocialMedia-Facebook' )) : ?>
            <a href="https://facebook.com/<?php echo get_theme_mod( 'ADKThemeSocialMedia-Facebook' ); ?>" target='_blank'>
            <amp-img src='<?php echo get_template_directory_uri(); ?>/social-icons/facebook.svg' class='social-image-follow' layout='fixed' height='24' width='24'/></a>
            <?php endif; ?>
                
            <?php if (get_theme_mod( 'ADKThemeSocialMedia-Tumblr' )) : ?>
            <a href="https://tumblr.com/<?php echo get_theme_mod( 'ADKThemeSocialMedia-Tumblr' ); ?>" target='_blank'>
            <amp-img src='<?php echo get_template_directory_uri(); ?>/social-icons/tumblr.svg' class='social-image-follow' layout='fixed' height='24' width='24'/></a>
            <?php endif; ?>
            </section>
        </section>
        
        <!--Custom Theme Code-->
        <?php echo get_theme_mod('ADKThemeAMPCode-After'); ?>
    </footer>
                <!--Analytics-->
    <amp-analytics type="googleanalytics">
        <script type="application/json">
            {
              "vars": {
                "account": "UA-110231473-2"
              },
              "triggers": {
                "trackPageview": {
                  "on": "visible",
                  "request": "pageview" }, 
                "scrollArticle": {
                    "on": "scroll",
                    "scrollSpec": {
                        "verticalBoundaries": [95] },
                        "vars" : {
                            "eventCategory" : "Reading",
                            "eventAction" : "Page Read",
                            "eventLabel" : "<?php echo get_the_title(); ?> | <?php echo get_bloginfo('name'); ?>"
                        },
                        "request": "event" } } }                 
            </script>
        </amp-analytics>

</body>
</html>