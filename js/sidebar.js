var MainSidebar = document.getElementsByTagName('aside')[0];
var TotalSections = MainSidebar.getElementsByClassName('sidebar-advertising').length;

console.log('Sidebar-Advertising Length = ' + TotalSections);

var AdUnitNum = TotalSections;
var LoadedAdUnits = 0;
var PositionName = ["top","mid","bottom"]

for (var i=0; i<TotalSections; i++) {    
    var SideAdUnit = document.createElement('div');
    SideAdUnit.className = 'sidebar-adunit';
    SideAdUnit.setAttribute('id', PositionName[i]);
    SideAdUnit.setAttribute('style', 'text-align:center;');
    
    console.log('SideAdUnit = ' + SideAdUnit);
        
    var TheSidebar = MainSidebar.getElementsByClassName('sidebar-advertising');
    console.log(MainSidebar.getElementsByClassName('sidebar-advertising'));
    console.log(TheSidebar);
    MainSidebar.insertBefore(SideAdUnit, TheSidebar[i]);
}

function CheckSideViewability() {
    for (var k=0; k<TotalSections; k++) {
        var SideAdUnit = MainSidebar.getElementsByClassName('sidebar-adunit')[k];
        var SideAdUnitID = PositionName[k];
        var SideAdUnitBounds = SideAdUnit.getBoundingClientRect();
        
        if (SideAdUnitBounds.top > -100 && SideAdUnitBounds.bottom < window.innerHeight + 100 && !SideAdUnit.classList.contains('loaded')) {
            googletag.cmd.push(function() {

                console.log(SideAdUnitID);
                var sidebarmapping = googletag.sizeMapping().addSize([1153, 0], [[300, 250]]).addSize([760, 0], [[468, 60],[728, 90]]).addSize([480, 0],[[320, 50], [468, 60], [320, 100]]).addSize([0, 0], [[320, 50], [320, 100], [300, 250], [336, 280]]).build();
                var AMPosition = googletag.defineSlot( GlobalSidebar, [[320, 50], [468, 60], [728, 90], [320, 100], [300, 250], [336, 280]], SideAdUnitID).defineSizeMapping(sidebarmapping).setTargeting('position', PositionName[k] ).addService(googletag.pubads());
                
                googletag.display(SideAdUnitID);;
					googletag.pubads().refresh([AMPosition]);
				  });
				LoadedAdUnits++; //Increment total ad load number
                SideAdUnit.classList.add('loaded');
                break;
				if( LoadedAdUnits == AdUnitNum ) {clearInterval(CheckView); } //If there are not more units to be loaded, end the interval
			}
		}
    }

var CheckSideView = setInterval(function(Check)
{
    CheckSideViewability();
    if( LoadedAdUnits == AdUnitNum ) {clearInterval(CheckSideView); }
}, 50); //Set interval for 0.05s