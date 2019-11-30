<!--Custom Theme Code-->
<?php echo get_theme_mod('ADKThemeFooterCode-Before'); ?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110231473-2"></script>
<script>
    var UAID = '<?php echo get_theme_mod('ADKThemeHeadCode-GoogleAnalytics'); ?>';
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', UAID);
</script>

<!--Load More Articles-->
<script src='<?php bloginfo('template_url'); ?>/js/load-more.js'></script>
<script>
    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    var offset = <?php $page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1; $ppp = get_option( 'posts_per_page' ); $offset = $page * $ppp; $offset++; echo $offset; ?>;
    var posts_per_page = 9;
</script>


<!--Custom Theme Code-->
<?php echo get_theme_mod('ADKThemeFooterCode-After'); ?>