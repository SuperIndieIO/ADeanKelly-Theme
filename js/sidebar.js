$( document ).ready(function() {
    //Otaku Voice Sidebar Advertising Code Insertion Script

    //Read Page for Advertising Space
    var Sidebar = $('aside').find('.sidebar-advertising').length; //Advertising Location Space
	
	var AdUnitNum = 1;
	var LoadedAdUnits = 0;
	var PositionName = ["top","mid","bottom"]
	
	var AdUnit = "<ins class='adsbygoogle' style='display: block;' data-ad-client='ca-pub-8642963533812241' data-ad-slot='9190203971' data-ad-format='rectangle'></ins>"

    $('aside > .sidebar-advertising').each(function(i) {
		var TheAdUnit = "<!-- "+ GlobalSidebar +" --><div id='Sidebar-" + AdUnitNum + "' class='rectangle-adunit' style='text-align:center;'></div>";
        $(this).html(TheAdUnit);
		AdUnitNum++
        //console.log(i);
    });
	
	var CheckView = setInterval(function(CheckViewability)
    {
       	var WindowBottom = $( window ).height() + $( window ).scrollTop(); //Check the height of the window and the distance to top beyond viewport
        var ArticleBottom = $('aside').height() + $('aside').scrollTop(); //Check the height of the article and the distance to the top
		var DocumentBottom = $( document ).height(); //Check the total height of the document

		$('.rectangle-adunit').each(function(j) {
			var CurrentRectangle = "Sidebar-" + (j + 1);
			var CurrentRectangleHeight = $(this).offset().top;

			if( (WindowBottom + 100) >= CurrentRectangleHeight && !$(this).hasClass('loaded')) {
				$(this).addClass('loaded');
				googletag.cmd.push(function() {
			
					var sidebarmapping = googletag.sizeMapping().addSize([1153, 0], [[320, 100], [300, 250], [336, 280]]).addSize([760, 0], [[468, 60],[728, 90]]).addSize([480, 0],[[320, 50], [468, 60], [320, 100]]).addSize([0, 0], [[320, 50], [320, 100], [300, 250], [336, 280]]).build();
            		var AMPosition = googletag.defineSlot( GlobalSidebar, [[320, 50], [468, 60], [728, 90], [320, 100], [300, 250], [336, 280]], CurrentRectangle).defineSizeMapping(sidebarmapping).setTargeting('position', PositionName[j] ).addService(googletag.pubads());
					
					// Display has to be called before
					// refresh and after the slot div is in the page.
					googletag.display(CurrentRectangle);
					googletag.pubads().refresh([AMPosition]);
				  });
				LoadedAdUnits++; //Increment total ad load number

				if( LoadedAdUnits == AdUnitNum ) {clearInterval(CheckView); } //If there are not more units to be loaded, end the interval
			}
		});
    }, 50); //Set interval for 0.1s
	
});