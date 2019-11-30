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

<!--Custom Theme Code-->
<?php echo get_theme_mod('ADKThemeFooterCode-After'); ?>