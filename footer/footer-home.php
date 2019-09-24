<!--Custom Theme Code-->
<?php echo get_theme_mod('ADKThemeFooterCode-Before'); ?>
<script src='<?php bloginfo('template_url'); ?>/js/load-more.js'></script>
<script>
    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    var offset = '<?php echo get_option( 'posts_per_page' ); ?>';
    var posts_per_page = 9;
</script>


<!--Custom Theme Code-->
<?php echo get_theme_mod('ADKThemeFooterCode-After'); ?>