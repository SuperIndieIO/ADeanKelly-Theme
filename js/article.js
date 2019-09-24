//ADeanKelly Advertising Code Insertion Script
//Version 0.2
//Read Article for Total Character Count and Paragraph Count
var MainArticle = document.getElementsByTagName('article')[0];
var TotalHeaders = MainArticle.getElementsByTagName('h3').length; //Get total subheads of the article

var AdUnitNum = TotalHeaders; //Set the starting number of ad units
var LoadedAdUnits = 0; //Set the starting number of loaded ad units

var SlotNum = 1; //Set the slot number for the ad unit starting at 1
var SlotName = ''; //Set the slot name variable

for (var j=0; j<TotalHeaders; j++) {
    SlotName = slot(); //Call to naming the slot function
    
    var AdUnit = document.createElement('div'); //Create the Ad Unit
    AdUnit.className = 'leaderboard-adunit'; //Set in-article ad unit type
    AdUnit.setAttribute('id', SlotName); //Set unique ad unit id
    AdUnit.setAttribute('style', 'text-align:center'); //Set ad unit styles
    
    TheHeader = MainArticle.getElementsByTagName('h3')[j]; //Find ad unit insertion spot
    MainArticle.insertBefore(AdUnit, TheHeader); //Insert the ad unit
}

function CheckViewability() {
    for (var k=0; k<TotalHeaders; k++) {
        var AdUnit = MainArticle.getElementsByClassName('leaderboard-adunit')[k];
        var AdUnitID = 'In-Article-' + (k + 1);
        var AdUnitBounds = AdUnit.getBoundingClientRect();
        if (AdUnitBounds.top > -100 && AdUnitBounds.bottom < window.innerHeight + 100 && !AdUnit.classList.contains('loaded')) {
            googletag.cmd.push(function() {

                console.log(AdUnitID);
                var inarticlemapping = googletag.sizeMapping().addSize([760, 0], [[728, 66], [728, 90], [468, 60]]).addSize([480, 0], [[468, 60]]).addSize([0, 0], [[320, 50], [320, 100], [300, 250]]).build();
                var AMSlot = googletag.defineSlot( GlobalInArticle, [[320, 50], [468, 60],[728, 66], [728, 90], [320, 100], [300, 250]], AdUnitID).defineSizeMapping(inarticlemapping).setTargeting('slot', k + 1 ).addService(googletag.pubads());

                // Display has to be called before
                // refresh and after the slot div is in the page.
                googletag.display(AdUnitID);
                googletag.pubads().refresh([AMSlot]);
              });
            AdUnit.classList.add('loaded');
            LoadedAdUnits++;
        }
    }
}

var CheckView = setInterval(function(Check)
{
    CheckViewability();
    if( LoadedAdUnits == AdUnitNum ) {clearInterval(CheckView); }
}, 50); //Set interval for 0.05s

//Creates and update the slot name for the Google Ad Manager ad unit
function slot() {
  SlotName = 'In-Article-' + SlotNum;
  SlotNum++;
  return SlotName;
}