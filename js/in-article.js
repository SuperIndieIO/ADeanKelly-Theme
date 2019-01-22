$( document ).ready(function() {
    //ADeanKelly Advertising Code Insertion Script

    //Read Article for Total Character Count and Paragraph Count
    var TotalParagraphs = $("article").find("p").length; //Paragraph Count

    var TotalWordCount = 0;
    $('article > p').each(function(i) {
        //Check the total words in a paragraph
        var CurrentParagraph = $(this).text().split(' ').length;
        TotalWordCount += CurrentParagraph;
        });

    var blocked = false; //Announce that ad blocking is false
    
    var CurrentParagraph = 1; //Check the location of the first ad unit
	var n = 2; //Set the starting point of the Fibonacci Sequence
	var AdUnitNum = 0; //Set the starting number of ad units
  	var LoadedAdUnits = 0; //Set the starting number of loaded ad units

    var SlotNum = 1; //Set the slot number for the ad unit starting at 1
    var SlotName = '';

    //Function searches the article for all spots to place an ad unit
    $('article > p').each(function(i) {

  		//Check the paragraph number against the Fibonacci Sequence and load a unique ad unit
  		if (CurrentParagraph == fibonacci(n) && CurrentParagraph != 3 && CurrentParagraph < TotalParagraphs) {
  		  slot(); //Get the slot name
  			var TheAdUnit = "<!-- "+ GlobalInArticle +" --><div id='"+SlotName+"' class='leaderboard-adunit' style='text-align:center;'></div>"; //Create <DIV> for ad unit
  			$(this).after(TheAdUnit); //Insert <DIV> after Ad Unit
  			n++; //Increment Fibonacci after ad unit insertion
  			AdUnitNum++; //Increment the ad unit number
  		}
		
  		//Check if the paragraph number in order to add a skip to the Fibonacci Sequence
  		if(CurrentParagraph == 3) {
  			n++;
  		}
      CurrentParagraph++;
    });
		
	var CheckView = setInterval(function(CheckViewability)
    {
      var WindowBottom = $( window ).height() + $( window ).scrollTop(); //Check the height of the window and the distance to top beyond viewport
	  var WindowTop = $( window ).scrollTop();
      var ArticleBottom = $('article').height() + $('article').scrollTop(); //Check the height of the article and the distance to the top
		  var DocumentBottom = $( document ).height(); //Check the total height of the document

		  $('.leaderboard-adunit').each(function(j) {
			  var CurrentLeaderboard = "In-Article-" + (j + 1);
			  var CurrentLeaderboardHeight = $(this).offset().top;

			  if( ((WindowBottom + 100) >= CurrentLeaderboardHeight && (WindowTop - 100) <= CurrentLeaderboardHeight) && !$(this).hasClass('loaded')) {
				  $(this).addClass('loaded'); //Set class of ad unit as loaded
          			googletag.cmd.push(function() {
			
					var inarticlemapping = googletag.sizeMapping().addSize([760, 0], [[468, 60], [728, 90]]).addSize([480, 0], [[468, 60]]).addSize([0, 0], [[320, 50], [320, 100], [300, 250]]).build();
            		var AMSlot = googletag.defineSlot( GlobalInArticle, [[320, 50], [468, 60], [728, 90], [320, 100], [300, 250]], CurrentLeaderboard).defineSizeMapping(inarticlemapping).setTargeting('slot', j + 1 ).addService(googletag.pubads());

					// Display has to be called before
					// refresh and after the slot div is in the page.
					googletag.display(CurrentLeaderboard);
					googletag.pubads().refresh([AMSlot]);
				  });
				LoadedAdUnits++; //Increment total ad load number

				if( LoadedAdUnits == AdUnitNum ) {clearInterval(CheckView); } //If there are not more units to be loaded, end the interval
			}
		});
    }, 50); //Set interval for 0.05s

	//This function returns the fibonacci sequence in order starting at 1
	function fibonacci(num) {
	
		if (num <= 1) return 1;
  		return fibonacci(num - 1) + fibonacci(num - 2);
	}
	
	//This function creates and updates the slot name for the DFP ad unit
	function slot() {
	  SlotName = 'In-Article-' + SlotNum;
	  SlotNum++;
	  return SlotName;
	}
});