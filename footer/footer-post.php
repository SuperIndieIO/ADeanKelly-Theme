<!--Custom Theme Code-->
<?php echo get_theme_mod('ADKThemeFooterCode-Before'); ?>

<!--Ad Blocking Test Script-->
<script>
    let blocking = document.createElement('ins');
	let GABlocking;

    blocking.className = 'adsbygoogle';
    blocking.id = 'GoogleAdsense';
    blocking.style.display = 'block';
    blocking.style.position = 'absolute';
    blocking.style.top = '-1px';
    blocking.style.height = '1px';

    document.body.appendChild( blocking );
    let isBlockingEnabled = !blocking.clientHeight;
    document.body.removeChild( blocking );
    console.log( isBlockingEnabled );
    
    if( isBlockingEnabled ) {
        console.log('Blocking Enabled')
		GABlocking = 'True'
    } else {
        console.log('Blocking Disabled');
		GABlocking = 'False'
    }
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script>
    let UAID = '<?php echo get_theme_mod('ADKThemeHeadCode-GoogleAnalytics'); ?>';
    let gaURL = 'https://www.googletagmanager.com/gtag/js?id=' + UAID;
    let gaScript = document.createElement('script');    
    
    gaScript.async = true;
    gaScript.src = gaURL;
    document.getElementsByTagName('head')[0].appendChild( gaScript );
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
	
	gtag('set', {'content_group1': '<?php echo getCatList('/'); ?>'});
    
  gtag('config', UAID,  { 'custom_map': {'dimension1': 'Ad Blocking'}});
  gtag('event', 'ad_blocking', {'Ad Blocking': GABlocking});
</script>


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
<script async="async" src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
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
    
    //Send Category and Tags back to Ad Manager
    var ContentCategory = ['<?php echo getCatList( "', '"); ?>'];
    var ContentTag = ['<?php echo getTagList("', '"); ?>'];
    var ContentAuthor = '<?php echo get_the_author_meta( 'ID' ) ?>';
    googletag.cmd.push(function() {
            googletag.pubads().setTargeting('category', ContentCategory);
            googletag.pubads().setTargeting('tag', ContentTag);
            googletag.pubads().setTargeting('author', ContentAuthor);
            googletag.pubads().setTargeting('page', 'postpage');
        });
  </script>

<!--Load Page Analytics -->
<script src='<?php bloginfo('template_url'); ?>/js/page.min.js'></script>

<!--Load Ad Unit Variable Settings from Customizer-->
<script>
	let GlobalInArticle = '<?php echo get_theme_mod("ADKThemeAdvertising-InArticle"); ?>';
	let GlobalSidebar = '<?php echo get_theme_mod("ADKThemeAdvertising-Sidebar"); ?>';
    let AdsenseChannels = <?php echo get_theme_mod("ADKThemeAdvertising-AdsenseChannels"); ?>;
</script>

<!--Bot Detection Script-->
<script src='<?php bloginfo('template_url'); ?>/js/batman.min.js'></script>

<script>
	botDetect.onUser(function() {
        let script = document.createElement('script');    
        script.src = '<?php bloginfo('template_url'); ?>/js/article.min.js';
        document.getElementsByTagName('head')[0].appendChild(script);
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