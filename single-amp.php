<!doctype HTML>
<html amp lang="en">
<?php get_header('amp'); ?>
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
        <?php $array = explode("</p>", $text); $slot = 1; ?>
        <?php $my_tags = get_the_tags(); foreach ( $my_tags as $tag ) { $tag_names[] = urlencode($tag->name); } $the_tags = json_encode($tag_names); $the_tags = str_replace('+', '_', $the_tags); ?>
        <?php for($i = 0; $i < sizeof($array); $i++) { 
            $targeting = array('slot'=>$slot, 'tag'=>$the_tags);
            if (in_array($i, array(1,4,7,10,16,21,27)) && $i < sizeof($array)) {
                echo $array[$i].'</p>
                <amp-ad layout="responsive" width=320 height=100
                    type="doubleclick"
                    data-slot="'; echo get_theme_mod("ADKThemeAdUnits-InArticle");
                    echo '" data-multi-size="320x50,300x250"
                    data-multi-size-validation="false"
                    json= {"targeting":{"slot":"'.$slot.'","tag":'; echo $the_tags; ', "category":'; echo '}}>
                    <div placeholder></div>
                    <div fallback></div>
                </amp-ad>';
                $slot++;
            } else { echo $array[$i]."</p>";}}?>

        <!--Social media sharing link-->
            <div id='OV-PostSocialMedia'>
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
        <aside>
        </aside>
    </main>
    <footer>
        <!--Custom Theme Code-->
        <?php echo get_theme_mod('ADKThemeAMPCode-Before'); ?>
        
        <section id='footer-section'>
        <?php $menuparams = array(
          'menu'            => 'footer-menu',
          'container'       => '',
          'items_wrap'      => '<nav id="%1$s" class="%2$s">%3$s</nav>',
          'depth'           => 0,
        ); ?>
        <?php wp_nav_menu( $menuparams ); ?>
        
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
            
            <amp-img id='alt-logo' src='<?php $footerlogo = get_theme_mod( 'ADKThemeDesign-Footer' ); echo wp_get_attachment_url( $footerlogo ); ?>'/>
        </section>
        
        <!--Custom Theme Code-->
        <?php echo get_theme_mod('ADKThemeAMPCode-After'); ?>
    </footer>
                <!--Analytics-->

</body>
</html>