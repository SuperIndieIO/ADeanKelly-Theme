<?php ?>
<!DOCTYPE html>
<html>
<head>
	<?php get_template_part( 'header/header', 'page' ); ?>
</head>
<body>
	<header>
		<a href='<?php echo esc_url( home_url( "/" ) ); ?>'>
			<?php $headerlogo = get_theme_mod( 'ADKThemeDesign-Header' ); ?>
			<img class='ADK-LogoImg' src='<?php echo wp_get_attachment_url( $headerlogo ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' />
		</a>
	</header>
	<main>
        <article>
            <?php $post = get_the_ID(); $primary = $post; $thumbid = get_post_thumbnail_id(); $thumbarray = array('postx','postl','postm','posts'); $i = 0; ?>
			<?php foreach ($thumbarray as $imgsize) { $imgnum[$i] = wp_get_attachment_url($thumbid, $imgsize); $i++; } ?>
            <picture>
				<source media='(max-width: 479px)' srcset='<?php echo $imgnum[3] ?>'>
				<source media='(min-width: 480px) and (max-width: 639px)' srcset='<?php echo $imgnum[2] ?>'>
				<source media='(min-width: 640px) and (max-width: 960px)' srcset='<?php echo $imgnum[1] ?>'>
				<source media='(min-width: 960px)' srcset='<?php echo $imgnum[0] ?>'>
				<img src='<?php echo $imgnum[0] ?>' alt='<?php $thumbnail_id = get_post_thumbnail_id( $post->ID ); $img_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); echo $img_alt;  ?>'>
			</picture>
			<h1><?php echo get_the_title(); ?></h1>
			<section id='post-author'>
				<a href='<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>' rel='author'><?php the_author(); ?></a> | <a href='https://www.twitter.com/<?php the_author_meta( "twitter" ); ?>'>@<?php if(the_author_meta( 'twitter' )){the_author_meta( 'twitter' );}; ?></a>
				<time id='post-date'>
					<?php the_time("M j, Y"); ?>
				</time>
			</section>
			<!--Load Content-->
			<?php the_content(); ?>
        </article>
    </main>
    <footer>
        <?php get_template_part( 'footer/footer', 'home' ); ?>
        <?php get_template_part( 'footer/footer' ); ?>
    </footer>
</body>
</html>