<?php ?>
<!DOCTYPE html>
<html>
	<head>
		<?php get_header('home'); ?>
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
	<?php $postnumber = 0; ?>
	<?php $classname = array('ADK-TopArticle', 'ADK-SmallArticle ADK-ArticleB', 'ADK-SmallArticle ADK-ArticleC', 'ADK-ADK-SmallArticle ADK-ArticleD', 'ADK-MidArticle ADK-ArticleE align-left', 'ADK-SmallArticle ADK-ArticleF img-adjst', 'ADK-SmallArticle ADK-ArticleG img-adjst', 'ADK-MidArticle ADK-ArticleH align-right', 'ADK-SmallArticle ADK-ArticleI', 'ADK-SmallArticle ADK-ArticleJ', 'ADK-SMallArticle ADK-ArticleK'); ?>
	<?php $imagesizesxlarge = array('8/3-xlarge', '16/9-small', '16/9-small', '16/9-small', '32/9-large', '16/9-medium', '16/9-medium', '32/9-large', '16/9-medium', '16/9-medium', '16/9-medium'); ?>
	<?php $imagesizeslarge = array ('8/3-large', '32/9-medium', '32/9-medium', '32/9-medium', '32/9-medium', '32/9-medium', '32/9-medium', '32/9-medium', '32/9-medium', '32/9-medium', '32/9-medium'); ?>
	<?php $imagesizesmedium = array ('8/3-medium', '16/9-medium', '16/9-medium', '16/9-medium', '8/3-medium', '16/9-medium', '8/3-medium', '8/3-medium', '32/9-medium', '32/9-medium', '32/9-medium', '32/9-medium'); ?>
	<?php $imagesizessmall = array ('16/9-small'); ?>
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
<?php get_footer('home'); ?>
	</body></html>