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
<div id='social-media-follow'>
    
    <?php if (get_theme_mod( 'ADKThemeSocialMedia-Youtube' )) : ?>
    <a href="https://youtube.com/<?php echo get_theme_mod( 'ADKThemeSocialMedia-Youtube' ); ?>" onclick="TrackSocialFollow('Youtube');" target='_blank' >
	<img src='<?php bloginfo('template_url'); ?>/social-icons/youtube.svg' class='social-image-follow' alt='Youtube Follow Logo'/></a>
    <?php endif; ?>
    
    <?php if (get_theme_mod( 'ADKThemeSocialMedia-Twitter' )) : ?>
	<a href="https://twitter.com/<?php echo get_theme_mod( 'ADKThemeSocialMedia-Twitter' ); ?>" onclick="TrackSocialFollow('Twitter');" target="_blank">
    <img src='<?php bloginfo('template_url'); ?>/social-icons/twitter.svg' class='social-image-follow' alt='Twitter Follow Logo'/></a>
    <?php endif; ?>
	
    <?php if (get_theme_mod( 'ADKThemeSocialMedia-Facebook' )) : ?>
    <a href="https://facebook.com/<?php echo get_theme_mod( 'ADKThemeSocialMedia-Facebook' ); ?>" onclick="TrackSocialFollow('Facebook');" target='_blank'>
    <img src='<?php bloginfo('template_url'); ?>/social-icons/facebook.svg' class='social-image-follow' alt='Facebook Follow Logo'/></a>	
	<?php endif; ?>
    
    <?php if (get_theme_mod( 'ADKThemeSocialMedia-Tumblr' )) : ?>
	<a href="https://tumblr.com/<?php echo get_theme_mod( 'ADKThemeSocialMedia-Tumblr' ); ?>" onclick="TrackSocialFollow('Tumblr');" target='_blank' >
	<img src='<?php bloginfo('template_url'); ?>/social-icons/tumblr.svg' class='social-image-follow' alt='Tumblr Follow Logo'/></a>
    <?php endif; ?>
    
</div>	

</section>