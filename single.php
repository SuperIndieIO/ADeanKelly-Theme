<?php get_header('post'); ?>
<main>
	<!--Wordpress Loop Code-->
	<?php $post = get_the_ID();  
		$primary = $post; ?>
	<?php $xdesktop = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-xlarge' ); ?>
	<?php $sdesktop = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-large' ); ?>
	<?php $tablet = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-medium' ); ?>
	<?php $small = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-small' ); ?>}
	<picture id='ADK-Image'>
		<source media='(max-width: 479px)' srcset='<?php echo $mobile[0] ?>'>
		<source media='(min-width: 480px) and (max-width: 639px)' srcset='<?php echo $tablet[0] ?>'>
		<source media='(min-width: 640px) and (max-width: 960px)' srcset='<?php echo $sdesktop[0] ?>'>
		<source media='(min-width: 960px)' srcset='<?php echo $xdesktop[0] ?>'>
		<img id='ADK-PostImage' src='<?php echo $xdesktop[0] ?>' alt='<?php $thumbnail_id = get_post_thumbnail_id( $post->ID ); $img_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); echo $img_alt;  ?>'>
	</picture>
	<article id='ADK-PostBody'>
		<h1 id='ADK-PostHeadline' itemprop='headline'><?php echo get_the_title(); ?></h1>
		<h2 id='ADK-PostSubHeadline'><?php echo(get_the_excerpt()); ?></h2>
		<div id='ADK-PostAuthor' itemprop='author'><a href='<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>'><?php the_author(); ?></a> | <a href='https://www.twitter.com/<?php the_author_meta( twitter ); ?>'>@<?php the_author_meta( twitter ); ?></a> <div id='ADK-PostDate' itemprop='datePublished'><?php the_time("M j, Y"); ?></div></div>
		<!--Load Content-->
		<?php the_content(); ?>
		<!--Social media sharing link-->
		<div id='ADK-PostSocialMedia'>
		<a href="http://twitter.com/share" onclick="TrackSocialShare('Twitter');" target='_blank'>
			<img src='<?php echo get_template_directory_uri(); ?>/social-icons/twitter.svg' class='social-image' alt='Twitter Logo' /></a>

		<a href='https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>' onclick="TrackSocialShare('Facebook');" target='_blank'>
			<img src='<?php echo get_template_directory_uri(); ?>/social-icons/facebook.svg' class='social-image' alt='Facebook Logo' /></a>

		<a href='https://plus.google.com/share?url=<?php the_permalink(); ?>' onclick="TrackSocialShare('Google Plus');" target='_blank'>
			<img src='<?php echo get_template_directory_uri(); ?>/social-icons/google_plus.svg' class='social-image' alt='Google Plus Logo' /></a>

		<a href='http://tumblr.com/widgets/share/tool?canonicalUrl=<?php echo get_the_permalink(); ?>' onclick="TrackSocialShare('Tumblr');" target='_blank'>
			<img src='<?php echo get_template_directory_uri(); ?>/social-icons/tumblr.svg' class='social-image' alt='Tumblr Logo' /></a>

		<a href='http://www.reddit.com/submit?url=<?php echo get_the_permalink(); ?>&title=<?php echo get_the_title(); ?>' onclick="TrackSocialShare('Reddit');" target='_blank'>
			<img src='<?php echo get_template_directory_uri(); ?>/social-icons/reddit.svg' class='social-image' alt='Reddit Logo' /></a>
		</div>

		<!--Category related articles-->
		<div id='ADK-RelatedCategory'>
			<?php $related = get_posts( array( 'category__in' => wp_get_post_categories($post), 'numberposts' => 3, 'post__not_in' => array($post), 'category__not_in' => 'Featured' ) ); ?>
			<?php if( $related ) foreach( $related as $post ) {?>
			<?php $post = get_the_ID(); ?>
			<?php $desktop = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = '16/9-medium' ); ?>
			<?php $tablet = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = '32/9-medium' ); ?>
			<?php $mobile = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = '32/9-small' ); ?>
				<a href='<?php echo get_the_permalink(); ?>'>
					<div class='ADK-PostSmall img-background'> 
						<!--<img class='ADK-PostSmallImage' src='<?php echo $thumb[0] ?>'/>-->
						<picture>
							<source media='(max-width: 479px)' srcset='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-srcset='<?php echo $mobile[0] ?>'>
							<source media='(min-width: 480px) and (max-width: 639px)' srcset='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-srcset='<?php echo $tablet[0] ?>'>
							<source media='(min-width: 640px)' srcset='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-srcset='<?php echo $desktop[0] ?>'>
							<img class='ADK-PostSmallImage' src='<?php echo $desktop[0] ?>' alt='<?php $thumbnail_id = get_post_thumbnail_id( $post->ID ); $img_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); echo $img_alt; ?>'>
						</picture>
						<h3 class='ADK-PostSmallText'><?php echo get_the_title(); ?></h3>
					</div>
			</a>
			<?php } wp_reset_postdata(); ?>
		</div>
	</article>
</main>