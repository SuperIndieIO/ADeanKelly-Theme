<?php ?>
<!DOCTYPE html>
<html>
<head>
	<?php get_template_part( 'header/header', 'post' ); ?>
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
		<?php $post = get_the_ID(); $primary = $post; $thumbid = get_post_thumbnail_id($post->ID); $thumbarray = array('postl','postm','posts'); $imgnum = array(); $imgtype = get_post_mime_type( $thumbid ); $imgtype = explode('/', $imgtype); $imgtype = $imgtype[1]; ?>
			<?php foreach ($thumbarray as $i) { $src = wp_get_attachment_image_src($thumbid, $i); $imgnum[] = $src[0];}; ?>
		<article>
			<picture>
				<source media='(max-width: 479px)' type='image/<?php echo $imgtype; ?>' srcset='<?php echo $imgnum[2] ?>'>
				<source media='(min-width: 480px) and (max-width: 639px)' srcset='<?php echo $imgnum[1] ?>'>
				<source media='(min-width: 640px) and (max-width: 960px)' srcset='<?php echo $imgnum[1] ?>'>
				<source media='(min-width: 960px)' srcset='<?php echo $imgnum[0] ?>'>
				<img src='<?php echo $imgnum[2] ?>' alt='<?php $img_alt = get_post_meta($thumbid, '_wp_attachment_image_alt', true); echo $img_alt;  ?>'>
			</picture>
			<h1><?php echo get_the_title(); ?></h1>
			<h2><?php echo(get_the_excerpt()); ?></h2>
			<section id='post-author'>
				<a href='<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>' rel='author'><?php the_author(); ?></a> | <a href='https://www.twitter.com/<?php the_author_meta( "twitter" ); ?>'>@<?php if(the_author_meta( 'twitter' )){the_author_meta( 'twitter' );}; ?></a>
				<time id='post-date'>
					<?php the_time("M j, Y"); ?>
				</time>
			</section>
			<!--Load Content-->
			<?php the_content(); ?>
			<!--Social media sharing link-->
			<section id='social-media'>
			<a href="https://twitter.com/intent/tweet" onclick="TrackSocialShare('Twitter');" target='_blank'>
				<img src='<?php bloginfo('template_url'); ?>/social-icons/twitter.svg' class='social-image-share' alt='Twitter Logo' /></a>

			<a href='https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>' onclick="TrackSocialShare('Facebook');" target='_blank'>
				<img src='<?php bloginfo('template_url'); ?>/social-icons/facebook.svg' class='social-image-share' alt='Facebook Logo' /></a>

			<a href='http://tumblr.com/widgets/share/tool?canonicalUrl=<?php echo get_the_permalink(); ?>' onclick="TrackSocialShare('Tumblr');" target='_blank'>
				<img src='<?php bloginfo('template_url'); ?>/social-icons/tumblr.svg' class='social-image-share' alt='Tumblr Logo' /></a>

			<a href='http://www.reddit.com/submit?url=<?php echo get_the_permalink(); ?>&title=<?php echo get_the_title(); ?>' onclick="TrackSocialShare('Reddit');" target='_blank'>
				<img src='<?php bloginfo('template_url'); ?>/social-icons/reddit.svg' class='social-image-share' alt='Reddit Logo' /></a>
			</section>
			<!--Category related articles-->
			<section class='related-category related-content'>
				<?php $related = get_posts( array( 'category__in' => wp_get_post_categories($post), 'numberposts' => 3, 'post__not_in' => array($post), 'category__not_in' => 'Featured' ) ); ?>
				<?php if( $related ) foreach( $related as $post ) {?>
				<?php $post = get_the_ID(); ?>
				<?php $large = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = '16/9s' ); ?>
				<?php $small = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = '8/3m' ); ?>
				<figure> 
							<!--<img class='ADK-PostSmallImage' src='<?php echo $thumb[0] ?>'/>-->
							<picture>
								<source media='(max-width: 640px)' srcset='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-srcset='<?php echo $small[0] ?>'>
								<source media='(min-width: 641px)' srcset='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-srcset='<?php echo $large[0] ?>'>
								<img src='<?php echo $desktop[0] ?>' alt='<?php $thumbnail_id = get_post_thumbnail_id( $post->ID ); $img_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); echo $img_alt; ?>'>
							</picture>
							<figcaption>
								<h5><?php echo get_the_title(); ?></h5>
							</figcaption>
							<a href='<?php echo get_the_permalink(); ?>'></a>
						</figure>
				<?php } wp_reset_postdata(); ?>
			</section>
		</article>
		<aside class='related-content'>
			<div class='sidebar-advertising'></div>
            <div class='related-tag'>
                <?php getRelatedPostsTag( $post->ID ); ?>
            </div>
			<div class='sidebar-advertising'></div>
		</aside>
	</main>
	<footer>
		<?php get_template_part( 'footer/footer', 'post' ); ?>
        <?php get_template_part( 'footer/footer' ); ?>
	</footer>
</body>
</html>
