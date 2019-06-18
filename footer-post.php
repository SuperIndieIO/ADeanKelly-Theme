<!--Custom Theme Code-->
<?php echo get_theme_mod('ADKThemeFooterCode-Before'); ?>

<!--Defer Image Load JS-->
<script>
	function init() {
		var imgDefer = document.getElementsByTagName('source');
		for (var i=0; i<imgDefer.length; i++) {
			if(imgDefer[i].getAttribute('data-srcset')) {
			imgDefer[i].setAttribute('srcset',imgDefer[i].getAttribute('data-srcset'));
		} } }
	window.onload = init;
</script>

<!--Load Google Ad Manager Code-->
<script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
<script>
	var googletag = googletag || {};
	googletag.cmd = googletag.cmd || [];
</script>
<script>
	googletag.cmd.push(function() {
		googletag.pubads().enableSingleRequest();
		googletag.pubads().collapseEmptyDivs();
		googletag.pubads().disableInitialLoad();
		googletag.enableServices();
	});
</script>

<!--URL Query Ad Manager Key-Value Script-->
<script>
	//Search the URL for the query string
	var queryString = window.location.search;
	queryString = queryString.substring(1); //Index starts at 0. Set index to 1.

	//Insert the queryString into the Variable to be edited
	//Call to LoadKeyValues function
	var KeyValuePairs = LoadKeyValues(queryString);

	function LoadKeyValues( queryString ) {
	  var params = {}, queries, temp, i, l;

	  // Split into key/value pairs
	  queries = queryString.split("&");

	  // Convert the array of strings into an object
	  for ( i = 0, l = queries.length; i < l; i++ ) {
		  temp = queries[i].split('=');
		  params[temp[0]] = temp[1];
	  }
	  return params;
	};

	//Send key-value pairs to Ad Manager
	googletag.cmd.push(function() {
	  for ( i = 0, l = Object.keys(KeyValuePairs).length; i < l; i++ ) {
		var Key = Object.keys(KeyValuePairs)[i];
		var Value = KeyValuePairs[Object.keys(KeyValuePairs)[i]];
		googletag.pubads().setTargeting(Key, Value);
	  }});
  </script>

<!--Load jQuery CDN-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>

<!--Load Page Analytics -->
<script src='<?php bloginfo('template_url'); ?>/js/page.js'></script>

<!--Load Ad Unit Variable Settings from Customizer-->
<script>
	var GlobalInArticle = '<?php echo get_theme_mod("ADKThemeAdUnits-InArticle"); ?>';
	var GlobalSidebar = '<?php echo get_theme_mod("ADKThemeAdUnits-Sidebar"); ?>';
</script>

<!--Bot Detection Script-->
<script src='<?php bloginfo('template_url'); ?>/js/batman.min.js'></script>

<script>
	botDetect.onUser(function() {
	  console.log('User is not a bot');
	  var script = document.createElement('script');
	  script.src = '<?php bloginfo('template_url'); ?>/js/in-article.js';
	  document.getElementsByTagName("head")[0].appendChild(script);
	  var script2 = document.createElement('script');
	  script2.src = '<?php bloginfo('template_url'); ?>/js/sidebar.js';
	  document.getElementsByTagName("head")[0].appendChild(script2);
	});
</script>

<!--Track Outbound Links-->
<script>
    var TrackSocialFollow = function(platform) {
        gtag('event', platform + ' follow', {'event_category' : 'Social Follow', 'event_label' : platform, 'value' : '1'});
    }
    var TrackSocialShare = function(platform) {
        gtag('event', platform + ' share', {'event_category' : 'Social Share', 'event_label' : platform, 'value' : '1'});
    }
</script>

<!--Custom Theme Code-->
<?php echo get_theme_mod('ADKThemeFooterCode-After'); ?>