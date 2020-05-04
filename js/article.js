//ADeanKelly Advertising Code Insertion Script
//Version 1.0
//Read Article for Total Character Count and Paragraph Count
const MAINARTICLE = document.getElementsByTagName('article')[0]; //Find the article element tag
const MAINSIDEBAR = document.getElementsByTagName('aside')[0]; //Find the aside element tag
const TOTALHEADERS = MAINARTICLE.getElementsByTagName('h3').length; //Get total subheads of the article
const TOTALSECTIONS = MAINSIDEBAR.getElementsByClassName('sidebar-advertising').length; //Get total sections in the sidebar

const INARTICLEMAP = [[[760, 0], [[728, 90], [728, 66], [468, 60], 'fluid']], [[480, 0], [[468, 60], [320, 100], 'fluid']], [[0, 0], [[320, 50], [320, 100], [300, 250], 'fluid']]];
const SIDEBARMAP = [[[1148, 0], [[300, 250], 'fluid']], [[760, 0], [[468, 60], [728, 90], 'fluid']], [[480, 0], [[320, 50], [468, 60], [320, 100], 'fluid']], [[0, 0], [[320, 50], [320, 100], [300, 250], [336, 280], 'fluid']]];

const BOUNDRY = 100;

let LoadedInArticleUnits = 0; //Set the starting number of loaded in article ad units
let LoadedSidebarUnits = 0; //Set the starting nu,ber of loaded sidebar ad units

let AdUnitList = [];

let ChannelList = [];
let setChannelList = "";

for ( let c = 0; c < CategoryList.length; c++) {
    if ( Object.keys( AdsenseChannels ).includes( CategoryList[c] ) ) {
        let TheCat = CategoryList[c];
        ChannelList.push( AdsenseChannels[TheCat] );
        //console.log( 'ChannelList = ' + ChannelList );
    }
}

for ( let a = 0; a < ChannelList.length; a++ ) {
    if ( a == ChannelList.length - 1 ) {
		setChannelList += ChannelList[a]; }
    else {
        setChannelList += ChannelList[a] + "+";
    }
    //console.log(setChannelList);
}

for ( let j = 0; j < TOTALHEADERS; j++) {
	//Generate random ID
	let SlotID = GenerateID();
    
    let AdUnit = document.createElement( 'div' ); //Create the Ad Unit
    AdUnit.setAttribute( 'class', 'leaderboard-adunit' ); //Set in-article ad unit type
    AdUnit.setAttribute( 'id', SlotID ); //Set unique ad unit id
    AdUnit.setAttribute( 'style', 'text-align:center' ); //Set ad unit styles
    
    let TheHeader = MAINARTICLE.getElementsByTagName( 'h3' )[j]; //Find ad unit insertion spot
    MAINARTICLE.insertBefore( AdUnit, TheHeader ); //Insert the ad unit
	//AdUnitList.push( AdUnit );
}

for ( let i = 0; i < TOTALSECTIONS; i++) {    
	let SlotID = GenerateID();
	
    let AdUnit = document.createElement( 'div' );
    AdUnit.setAttribute( 'class', 'sidebar-adunit' );
    AdUnit.setAttribute( 'id', SlotID );
    AdUnit.setAttribute( 'style', 'text-align:center;' );
            
    let TheSidebar = MAINSIDEBAR.getElementsByClassName('sidebar-advertising');
	TheSidebar[i].appendChild( AdUnit );
	//AdUnitList.push( AdUnit );
}

function CheckViewability( GLOBALADUNIT, ADUNITLIMIT, MAPPING, ADUNITCLASS, TARGETING, LOADEDUNITS ) {
	for ( let i = 0; i < ADUNITLIMIT; i++ ) {
        
		let AdUnit = document.getElementsByClassName( ADUNITCLASS )[i];
		let AdUnitBoundry = AdUnit.getBoundingClientRect();
        
		if ( AdUnitBoundry.top > -BOUNDRY && AdUnitBoundry.bottom < window.innerHeight + BOUNDRY && !AdUnit.classList.contains( 'loaded' ) ) {
			googletag.cmd.push(function() {
				
				let AMADUNIT = googletag.defineSlot( GLOBALADUNIT, ['fluid', [320, 50], [468, 60],[728, 66], [728, 90], [320, 100], [300, 250]], AdUnit.id )
					.defineSizeMapping( MAPPING )
					.setTargeting( TARGETING, i + 1 )
					.set( 'adsense_channel_ids', setChannelList )
					.addService( googletag.pubads() );

                
                googletag.display( AdUnit.id ); // Display has to be called before
                googletag.pubads().refresh([ AMADUNIT ]); // refresh and after the slot div is in the page.

              });
			if ( LOADEDUNITS == "InArticle" ) {
				LoadedInArticleUnits++;
			}
			if ( LOADEDUNITS == "Sidebar" ) {
				LoadedSidebarUnits++;
			}
            AdUnit.classList.add('loaded');
            break; //Why?
		}
	}
}

let CheckView = setInterval( function()
{
	CheckViewability( GlobalInArticle, TOTALHEADERS, INARTICLEMAP, 'leaderboard-adunit', 'slot', "InArticle" );
	CheckViewability( GlobalSidebar, TOTALSECTIONS, SIDEBARMAP, 'sidebar-adunit', 'position', "Sidebar" );

	//Check that all Ad Units have loaded
    if( LoadedInArticleUnits == TOTALHEADERS && LoadedSidebarUnits == TOTALSECTIONS ) { clearInterval(CheckView); }
}, 50); //Set interval for 0.05s


function GenerateID() {
	return Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
}