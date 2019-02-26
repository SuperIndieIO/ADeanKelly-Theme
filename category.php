<?php ?>
<!DOCTYPE html>
<html>
	<head>
		<?php get_header('category'); ?>
	</head>
	<body>
		<header>
			<a href='<?php echo esc_url( home_url( "/" ) ); ?>'>
				<?php $headerlogo = get_theme_mod( 'ADKThemeDesign-Header' ); ?>
				<img class='ADK-LogoImg' src='<?php echo wp_get_attachment_url( $headerlogo ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' />
			</a>
		</header>
		<main>
		<?php $postnumber = 0; ?>
		<?php $classname = array('ADK-TopArticle', 'ADK-SmallArticle', 'ADK-SmallArticle', 'ADK-SmallArticle', 'ADK-MidArticle', 'ADK-SmallArticle', 'ADK-SmallArticle', 'ADK-MidArticle', 'ADK-SmallArticle', 'ADK-SmallArticle', 'ADK-SmallArticle'); ?>
		<?php $imagesizesxlarge = array('8/3x', '16/9s', '16/9s', '16/9s', '32/9l', '16/9m', '16/9m', '32/9l', '16/9m', '16/9m', '16/9m'); ?>
		<?php $imagesizeslarge = array ('8/3l', '16/9m', '16/9m', '16/9m', '32/9m', '16/9m', '16/9m', '32/9m', '16/9m', '16/9m', '16/9m'); ?>
		<?php $imagesizesmedium = array ('16/9m', '8/3m', '8/3m', '8/3m', '16/9m', '8/3m', '8/3m', '16/9m', '8/3m', '8/3m', '8/3m', '8/3m'); ?>
		<?php $imagesizessmall = array ('16/9s', '8/3s', '8/3s', '8/3s', '16/9s', '8/3s', '8/3s', '16/9s', '8/3s', '8/3s', '8/3s', '8/3s'); ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php $post = get_the_ID(); ?>
			<?php $xdesktop = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $imagesizesxlarge[$postnumber] ); ?>
			<?php $sdesktop = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $imagesizeslarge[$postnumber] ); ?>
			<?php $tablet = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $imagesizesmedium[$postnumber] ); ?>
			<?php $mobile = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $imagesizessmall[$postnumber] ); ?>
			<figure class='<?php echo $classname[$postnumber]; ?>'>
				<picture>
					<source media="(min-width: 961px)" srcset='<?php echo $xdesktop[0] ?>'>
					<source media="(min-width: 640px) and (max-width: 960px)" srcset='<?php echo $sdesktop[0] ?>'>
					<source media="(max-width: 639px) and (min-width: 480px)" srcset='<?php echo $tablet[0] ?>'>
					<source media="(max-width: 479px)" srcset='<?php echo $mobile[0] ?>'>
					<img class='ADK-PostLargeImage' src='<?php echo $mobile[0] ?>' alt=''>
				</picture>
				<figcaption>
					<h3><?php echo get_the_title(); ?></h3>
					<p><?php echo(get_the_excerpt()); ?></p>
				</figcaption>
				<a href='<?php echo get_the_permalink(); ?>'>
				</a>
			</figure>
			<?php $postnumber++ ?>
		<?php endwhile; endif; ?>
		</main>
		<section id='page-nav'><?php numeric_posts_nav(); ?></section>
		<footer>
			<?php get_footer('home'); ?>
			<?php get_footer(); ?>
		</footer>
	</body>
</html>