<?php ?>
<!DOCTYPE html>
<html>
	<head>
		<?php get_template_part( 'header/header', 'home' ); ?>
	</head>
<body>
	<header>
		<a href='<?php echo esc_url( home_url( "/" ) ); ?>'>
			<?php if ( get_theme_mod( 'ADKThemeDesign-Header' )) : 
				// This is getting the image / url
				$headerlogo = get_theme_mod( 'ADKThemeDesign-Header' ); ?>
			<img class='ADK-LogoImg' src='<?php echo wp_get_attachment_url( $headerlogo ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' />
			<?php endif; ?>
		</a>
	</header>
    <main>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php $post = get_the_ID(); createPost($post->ID); ?>
        <?php endwhile; endif; ?>
    </main>
            <section id='load-more-section'>
            <button id='load-more' onclick='isLoading()'>Load More</button>
        </section>
    <footer>
        <?php get_template_part( 'footer/footer', 'home' ); ?>
        <?php get_template_part( 'footer/footer' ); ?>
    </footer>
	</body>
</html>