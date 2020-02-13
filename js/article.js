//ADeanKelly Advertising Code Insertion Script
//Version 0.3
//Read Article for Total Character Count and Paragraph Count
var MainArticle = document.getElementsByTagName('article')[0]; //Find the article element tag
var MainSidebar = document.getElementsByTagName('aside')[0]; //Find the aside element tag
var TotalHeaders = MainArticle.getElementsByTagName('h3').length; //Get total subheads of the article
var TotalSections = MainSidebar.getElementsByClassName('sidebar-advertising').length; //Get total sections in the sidebar


var InArticleAdUnitNum = TotalHeaders; //Set the starting number of in article ad units
var SidebarAdUnitNum = TotalSections; //Set the starting number of sidebar ad units
var LoadedInArticleUnits = 0; //Set the starting number of loaded in article ad units
var LoadedSidebarUnits = 0; //Set the starting nu,ber of loaded sidebar ad units

var SlotNum = 1; //Set the slot number for the ad unit starting at 1
var SlotName = ''; //Set the slot name variable
var PositionName = ["top","mid","bottom"];

var ChannelList = [];
var setChannelList = "";

for (var c=0; c<CategoryList.length; c++) {
    if (Object.keys(AdsenseChannels).includes(CategoryList[c])) {
        var TheCat = CategoryList[c];
        ChannelList.push(AdsenseChannels[TheCat]);
        console.log('ChannelList = ' + ChannelList);
    }
}

for (var a=0; a<ChannelList.length; a++) {
    if (a == ChannelList.length - 1) {
    setChannelList += ChannelList[a]; }
    else {
        setChannelList += ChannelList[a] + "+";
    }
    console.log(setChannelList);
}

for (var j=0; j<TotalHeaders; j++) {
    SlotName = slot(); //Call to naming the slot function
    
    var AdUnit = document.createElement('div'); //Create the Ad Unit
    AdUnit.className = 'leaderboard-adunit'; //Set in-article ad unit type
    AdUnit.setAttribute('id', SlotName); //Set unique ad unit id
    AdUnit.setAttribute('style', 'text-align:center'); //Set ad unit styles
    
    var TheHeader = MainArticle.getElementsByTagName('h3')[j]; //Find ad unit insertion spot
    MainArticle.insertBefore(AdUnit, TheHeader); //Insert the ad unit
}

for (var i=0; i<TotalSections; i++) {    
    var SideAdUnit = document.createElement('div');
    SideAdUnit.className = 'sidebar-adunit';
    SideAdUnit.setAttribute('id', PositionName[i]);
    SideAdUnit.setAttribute('style', 'text-align:center;');
            
    var TheSidebar = MainSidebar.getElementsByClassName('sidebar-advertising');
    MainSidebar.insertBefore(SideAdUnit, TheSidebar[i]);
}

function CheckInArticleViewability() {
    for (var k=0; k<TotalHeaders; k++) {
        var AdUnit = MainArticle.getElementsByClassName('leaderboard-adunit')[k];
        var AdUnitID = 'In-Article-' + (k + 1);
        var AdUnitBounds = AdUnit.getBoundingClientRect();
        if (AdUnitBounds.top > -100 && AdUnitBounds.bottom < window.innerHeight + 100 && !AdUnit.classList.contains('loaded')) {
            googletag.cmd.push(function() {


                var inarticlemapping = googletag.sizeMapping().addSize([760, 0], [[728, 90], [728, 66], [468, 60]]).addSize([480, 0], [[468, 60], 'fluid']).addSize([0, 0], [[320, 50], [320, 100], [300, 250], 'fluid']).build();
                var AMSlot = googletag.defineSlot( GlobalInArticle, ['fluid', [320, 50], [468, 60],[728, 66], [728, 90], [320, 100], [300, 250]], AdUnitID).defineSizeMapping(inarticlemapping).setTargeting('slot', k + 1 ).set('adsense_channel_ids', setChannelList).addService(googletag.pubads());

                // Display has to be called before
                // refresh and after the slot div is in the page.
                googletag.display(AdUnitID);
                googletag.pubads().refresh([AMSlot]);
              });
            LoadedInArticleUnits++;
            AdUnit.classList.add('loaded');
            break;
        }
    }   
}

function CheckSideViewability() {
    for (var k=0; k<TotalSections; k++) {
        var SideAdUnit = MainSidebar.getElementsByClassName('sidebar-adunit')[k];
        var SideAdUnitID = PositionName[k];
        var SideAdUnitBounds = SideAdUnit.getBoundingClientRect();
        
        if (SideAdUnitBounds.top > -100 && SideAdUnitBounds.bottom < window.innerHeight + 100 && !SideAdUnit.classList.contains('loaded')) {
            googletag.cmd.push(function() {

                //console.log(SideAdUnitID);
                var sidebarmapping = googletag.sizeMapping().addSize([1153, 0], [[300, 250]]).addSize([760, 0], [[468, 60],[728, 90]]).addSize([480, 0],[[320, 50], [468, 60], [320, 100]]).addSize([0, 0], [[320, 50], [320, 100], [300, 250], [336, 280]]).build();
                var AMPosition = googletag.defineSlot( GlobalSidebar, [[320, 50], [468, 60], [728, 90], [320, 100], [300, 250], [336, 280]], SideAdUnitID).defineSizeMapping(sidebarmapping).set('adsense_channel_ids', setChannelList).setTargeting('position', PositionName[k] ).addService(googletag.pubads());
                
                googletag.display(SideAdUnitID);
					googletag.pubads().refresh([AMPosition]);
				  });
				LoadedSidebarUnits++; //Increment total ad load number
                SideAdUnit.classList.add('loaded');
			}
		}
    }

var CheckView = setInterval(function(Check)
{
    CheckInArticleViewability();
    if( LoadedInArticleUnits == InArticleAdUnitNum ) {clearInterval(CheckView); }
}, 50); //Set interval for 0.05s

var CheckSideView = setInterval(function(Check)
{
    CheckSideViewability();
    if( LoadedSidebarUnits == SidebarAdUnitNum ) {clearInterval(CheckSideView); }
}, 50); //Set interval for 0.05s

//Creates and update the slot name for the Google Ad Manager ad unit
function slot() {
  SlotName = 'In-Article-' + SlotNum;
  SlotNum++;
  return SlotName;
}