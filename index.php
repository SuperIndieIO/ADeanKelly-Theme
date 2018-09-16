<?php get_header('home'); ?>
<main>
	<?php $postnumber = 0; ?>
	<?php $classname = array('ADK-8x3Article', 'ADK-7x10Article', 'ADK-7x10Article', 'ADK-7x10Article', ); ?>
	<?php $imagesizesxlarge = array('8/3-xlarge', '2/3-large', '2/3-large', '2/3-large'); ?>
	<?php $imagesizeslarge = array ('8/3-large'); ?>
	<?php $imagesizesmedium = array ('16/9-medium'); ?>
	<?php $imagesizessmall = array ('16/9-small'); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php $post = get_the_ID(); ?>
		<?php $xdesktop = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $imagesizesxlarge[$postnumber] ); ?>
		<?php $sdesktop = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $imagesizeslarge[$postnumber] ); ?>
		<?php $tablet = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $imagesizesmedium[$postnumber] ); ?>
		<?php $mobile = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $imagesizessmall[$postnumber] ); ?>
		<a href='<?php echo get_the_permalink(); ?>'>
			<div class='<?php echo $classname[$postnumber]; ?> img-background'>
				<picture>
					<source media="(min-width: 992px)" srcset='<?php echo $xdesktop[0] ?>'>
					<source media="(min-width: 640px) and (max-width: 991px)" srcset='<?php echo $sdesktop[0] ?>'>
					<source media="(max-width: 639px) and (min-width: 480px)" srcset='<?php echo $tablet[0] ?>'>
					<source media="(max-width: 479px)" srcset='<?php echo $mobile[0] ?>'>
					<img class='ADK-PostLargeImage' src='<?php echo $mobile[0] ?>'>
				</picture>
				<div class='ADK-Headline'>
					<h2 class='ADK-PostLargeHeadline'><?php echo get_the_title(); ?></h2>
					<h3 class='ADK-PostLargeSubHeadline italics'><?php echo(get_the_excerpt()); ?></h3>
				</div>
			</div>
		</a>
	<?php $posttype++ ?>
	<?php endwhile; endif; ?>
</main>
<?php get_footer('home'); ?>