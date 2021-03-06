<?php /*
Template Name: Long Article Template w/ Image
Template Post Type: post
*/
?>
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
		<?php $post = get_the_ID(); $primary = $post; $thumbid = get_post_thumbnail_id($post->ID); $thumbarray = array('postxl','postm','posts'); $imgnum = array(); ?>
			<?php foreach ($thumbarray as $i) { $src = wp_get_attachment_image_src($thumbid, $i); $imgnum[] = $src[0];}; ?>
        <picture>
				<source media='(max-width: 479px)' srcset='<?php echo $imgnum[2] ?>'>
				<source media='(min-width: 480px) and (max-width: 960px)' srcset='<?php echo $imgnum[1] ?>'>
				<source media='(min-width: 960px)' srcset='<?php echo $imgnum[0] ?>'>
				<img src='<?php echo $imgnum[2] ?>' alt='<?php $img_alt = get_post_meta($thumbid, '_wp_attachment_image_alt', true); echo $img_alt;  ?>'>
			</picture>
        <article>
			<h1><?php echo get_the_title(); ?></h1>
			<h2><?php echo(get_the_excerpt()); ?></h2>
			<section id='post-author'>
				<p><a href='<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>' rel='author'><?php the_author(); ?></a> | <a href='https://www.twitter.com/<?php the_author_meta( "twitter" ); ?>'>@<?php if(the_author_meta( 'twitter' )){the_author_meta( 'twitter' );}; ?></a></p>
				<time id='post-date'>
					<?php the_time("M j, Y"); ?>
				</time>
			</section>
			<!--Load Content-->
			<?php the_content(); ?>
			<!--Social media sharing link-->
			<section id='social-media'>
			<a href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&url=<?php echo the_permalink(); ?>" onclick="TrackSocialShare('Twitter');" target='_blank'>
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
                <?php getRelatedPostsCategory( $post ); ?>
			</section>
		</article>
		<aside class='large-sidebar related-content'>
			<div class='sidebar-advertising'>
				<div class='related-tag'>
					<?php getRelatedPostsTag( $post->ID, 0 ); ?>
				</div>
			</div>
			<div class='sidebar-advertising'>
				<div class='related-tag'>
					<?php getRelatedPostsTag( $post->ID, 2 ); ?>
				</div>
			</div>
		</aside>
	</main>
	<footer>
		<?php get_template_part( 'footer/footer', 'post' ); ?>
        <?php get_template_part( 'footer/footer' ); ?>
	</footer>
</body>
</html>