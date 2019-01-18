<?php ?>
<!DOCTYPE html>
<html>
<head>
	<?php get_header('post'); ?>
</head>
<body>
	<header>
		<a href='<?php echo esc_url( home_url( "/" ) ); ?>'>
			<?php $headerlogo = get_theme_mod( 'ADKThemeDesign-Header' ); ?>
			<img class='ADK-LogoImg' src='<?php echo wp_get_attachment_url( $headerlogo ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' />
		</a>
	</header>
	<main>
		<!--Wordpress Loop Code-->
		<?php $post = get_the_ID(); $primary = $post; ?>
			<?php $xdesktop = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'postx' ); ?>
			<?php $sdesktop = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'postl' ); ?>
			<?php $tablet = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'postm' ); ?>
			<?php $small = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'posts' ); ?>
		<picture>
			<source media='(max-width: 479px)' srcset='<?php echo $mobile[0] ?>'>
			<source media='(min-width: 480px) and (max-width: 639px)' srcset='<?php echo $tablet[0] ?>'>
			<source media='(min-width: 640px) and (max-width: 960px)' srcset='<?php echo $sdesktop[0] ?>'>
			<source media='(min-width: 960px)' srcset='<?php echo $xdesktop[0] ?>'>
			<img src='<?php echo $xdesktop[0] ?>' alt='<?php $thumbnail_id = get_post_thumbnail_id( $post->ID ); $img_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); echo $img_alt;  ?>'>
		</picture>
		<article>
			<h1><?php echo get_the_title(); ?></h1>
			<h2><?php echo(get_the_excerpt()); ?></h2>
			<section id='post-author'>
				<a href='<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>'><?php the_author(); ?></a> | <a href='https://www.twitter.com/<?php the_author_meta( twitter ); ?>'>@<?php the_author_meta( twitter ); ?></a>
				<time id='post-date'>
					<?php the_time("M j, Y"); ?>
				</time>
			</section>
			<!--Load Content-->
			<?php the_content(); ?>
			<!--Social media sharing link-->
			<section id='social-media'>
			<a href="http://twitter.com/share" onclick="TrackSocialShare('Twitter');" target='_blank'>
				<img src='<?php bloginfo('template_url'); ?>/social-icons/twitter.svg' class='social-image-share' alt='Twitter Logo' /></a>

			<a href='https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>' onclick="TrackSocialShare('Facebook');" target='_blank'>
				<img src='<?php bloginfo('template_url'); ?>/social-icons/facebook.svg' class='social-image-share' alt='Facebook Logo' /></a>

			<a href='https://plus.google.com/share?url=<?php the_permalink(); ?>' onclick="TrackSocialShare('Google Plus');" target='_blank'>
				<img src='<?php bloginfo('template_url'); ?>/social-icons/google_plus.svg' class='social-image-share' alt='Google Plus Logo' /></a>

			<a href='http://tumblr.com/widgets/share/tool?canonicalUrl=<?php echo get_the_permalink(); ?>' onclick="TrackSocialShare('Tumblr');" target='_blank'>
				<img src='<?php bloginfo('template_url'); ?>/social-icons/tumblr.svg' class='social-image-share' alt='Tumblr Logo' /></a>

			<a href='http://www.reddit.com/submit?url=<?php echo get_the_permalink(); ?>&title=<?php echo get_the_title(); ?>' onclick="TrackSocialShare('Reddit');" target='_blank'>
				<img src='<?php bloginfo('template_url'); ?>/social-icons/reddit.svg' class='social-image-share' alt='Reddit Logo' /></a>
			</section>
			<!--Category related articles-->
			<section class='related-category'>
				<?php $related = get_posts( array( 'category__in' => wp_get_post_categories($post), 'numberposts' => 3, 'post__not_in' => array($post), 'category__not_in' => 'Featured' ) ); ?>
				<?php if( $related ) foreach( $related as $post ) {?>
				<?php $post = get_the_ID(); ?>
				<?php $desktop = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = '16/9m' ); ?>
				<?php $tablet = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = '32/9m' ); ?>
				<?php $mobile = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = '32/9s' ); ?>
				<figure> 
							<!--<img class='ADK-PostSmallImage' src='<?php echo $thumb[0] ?>'/>-->
							<picture>
								<source media='(max-width: 479px)' srcset='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-srcset='<?php echo $mobile[0] ?>'>
								<source media='(min-width: 480px) and (max-width: 639px)' srcset='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-srcset='<?php echo $tablet[0] ?>'>
								<source media='(min-width: 640px)' srcset='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-srcset='<?php echo $desktop[0] ?>'>
								<img src='<?php echo $desktop[0] ?>' alt='<?php $thumbnail_id = get_post_thumbnail_id( $post->ID ); $img_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); echo $img_alt; ?>'>
							</picture>
							<figcaption>
								<h3><?php echo get_the_title(); ?></h3>
							</figcaption>
							<a href='<?php echo get_the_permalink(); ?>'></a>
						</figure>
				<?php } wp_reset_postdata(); ?>
			</section>
		</article>
		<aside>
			<div class='ADK-SidebarOther'></div>
			<div class='related-tag'>
					<?php wp_reset_query(); ?>
					<?php //for use in the loop, list 2 post titles related to first tag on current post
						$backup = $post;  // backup the current object
						$tags = wp_get_post_tags($post->ID);
						$tagIDs = array();
						if ($tags) {
							$tagcount = count($tags);
							for ($i = 0; $i < $tagcount; $i++) {
								$tagIDs[$i] = $tags[$i]->term_id;
							}
							$args=array(
								'tag__in' => $tagIDs,
								'post__not_in' => array($post->ID),
								'showposts'=> 2,
								'caller_get_posts'=>1
							);
							$my_query = new WP_Query($args);
							if( $my_query->have_posts() ) {
								while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = '' ); ?>
					<?php $desktop = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = '16/9s' ); ?>
					<?php $tablet = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = '16/9m' ); ?>
					<?php $mobile = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = '8/3s' ); ?>

					<figure>
						<picture>
							<source media="(max-width: 479px)" srcset='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-srcset='<?php echo $mobile[0] ?>'>
							<source media="(min-width: 480px) and (max-width: 959px)" srcset='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-srcset='<?php echo $tablet[0] ?>'>
							<source media="(min-width: 960px)" srcset='<?php echo $desktop[0] ?>'>
							<img src='<?php echo $thumb[0] ?>' alt='<?php $thumbnail_id = get_post_thumbnail_id( $post->ID ); $img_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); echo $img_alt;  ?>'>
						</picture>
						<figcaption>
						<h3><?php echo get_the_title(); ?></h3>
							</figcaption>
						<a href='<?php echo get_the_permalink(); ?>'>
					</a>
				</figure>				
					 <?php endwhile;
						} else { ?><!--Put Something Here-->
					<?php }
					}
					$post = $backup;  // copy it back
					wp_reset_query(); // to use the original query again
					?>
				</div>
			<div class='ADK-SidebarOther'></div>
		</aside>
	</main>
	<footer>
		<?php get_footer('post'); ?>
	</footer>
</body>
</html>
