//Check time spent on page
var ReadStart = false;
var ContentRead = false;
var PageRead = false;

var ReadTime = 0;
var StartReadTime = 0;
var FinishReadTime = 0;

var PageTitle = document.title;
var Article = document.getElementsByTagName('article')[0];
gtag( 'event', 'Article Load', {'event_category': 'Reading', 'event_label': PageTitle, 'value': true });

setInterval(function(FinishedReading) {
    var WindowBottom = window.innerHeight + window.scrollY;
    var DocumentBottom = document.body.clientHeight;
    var ArticleBottom = Article.clientHeight + Article.getBoundingClientRect().top + window.scrollY;
    
    if( window.scrollY > 0 && !ReadStart) {
        StartReadTime = ReadTime;
        ReadStart = true;
        gtag( 'event', 'Time Before Reading', {'event_category': 'Reading', 'event_label': PageTitle, 'value': StartReadTime });
    }
    
    if( WindowBottom >= ArticleBottom && !ContentRead) {
        FinishReadTime = ReadTime - StartReadTime;
        ContentRead = true;
        gtag( 'event', 'Article Read', {'event_category': 'Reading', 'event_label': PageTitle, 'value': true });
        gtag( 'event', 'Time Read', {'event_category': 'Reading', 'event_label': PageTitle, 'value': FinishReadTime });
    }
    
    if( WindowBottom >= DocumentBottom && !PageRead) {
        PageRead = true;
        gtag( 'event', 'Page Read', {
            'event_category': 'Reading',
            'event_label': PageTitle,
            'value': true
        });
    }
    
} , 100);

setInterval(function(AddTime) {
    if( !ContentRead || !PageRead) {
        ReadTime += 1;
    }
}, 1000);

window.onbeforeunload = function (ReadingExit) {
    if(ReadStart) {
        gtag('event', 'Page Exit', {
        'event_label': 'Exited Page',
        'event_category': 'Reading',
        'value' : true
        });
    }
};