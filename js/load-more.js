//var PostClass = ['ADK-MidArticle', 'ADK-SmallArticle', 'ADK-SmallArticle', 'ADK-SmallArticle', 'ADK-MidArticle', 'ADK-SmallArticle', 'ADK-SmallArticle', 'ADK-SmallArticle', 'ADK-SmallArticle'];
const PostClass = 'ADK-Article';
const DocumentMain = document.getElementsByTagName('main')[0];
let LoadingPosts = false;
var loadMorePostsFunction;

function isLoading() {
    if (!LoadingPosts) {
        AjaxLoadMore(ajaxurl);
    }
    else if (LoadingPosts) {
        return;
    }
}

function AjaxLoadMore(ajaxurl) {
    
    LoadingPosts = true;
    console.log('Loading Ajax');
    console.log('Offset = ' + offset);
    
    if (offset == null) {
        console.log('No more articles to load.');
        
        return;
    }

    //Creating AJAX Request
    //Setting Request Headers
    let ajaxhttp = new XMLHttpRequest();
    ajaxhttp.open('POST', ajaxurl, true);
    ajaxhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    
    switch ( PageType ) {
        case 'tag':
            //Sending AJAX Request
            ajaxhttp.send('action=load_more_posts&offset='+offset+'&posts_per_page='+posts_per_page+'&tag='+PageTag);
            break;
        case 'home':
            //Sending AJAX Request
            ajaxhttp.send('action=load_more_posts&offset='+offset+'&posts_per_page='+posts_per_page);
            break;
        case 'category':
            //Sending AJAX Request
            ajaxhttp.send('action=load_more_posts&offset='+offset+'&posts_per_page='+posts_per_page+'&category='+PageCategory);
            console.log('Load from Category');
            console.log(PageCategory);
            break;
        case 'archive':
            //Sending AJAX Request
            ajaxhttp.send('action=load_more_posts&offset='+offset+'&posts_per_page='+posts_per_page);
            break;
        default:
            //Sending AJAX Request
            ajaxhttp.send('action=load_more_posts&offset='+offset+'&posts_per_page='+posts_per_page);
    }

    //Checking AJAX Request State
    ajaxhttp.onreadystatechange = function() {
        if (ajaxhttp.readyState == 3) {
            console.log('Loading');
        }
        if (ajaxhttp.readyState == 4) {
            console.log('Finished');
            console.log(ajaxhttp);
            var ajaxResponse = JSON.parse(ajaxhttp.responseText);
            console.log(Object.keys(ajaxResponse));

            offset = ajaxResponse.data.offset;
            console.log('Offset = ' + offset);
            AddPosts(ajaxResponse.data.post);
            LoadingPosts = false;
            
            if( offset == null ){
                var LoadMore = document.getElementById('load-more');
                LoadMore.innerText = 'No More Articles';
            }
        }
    };

}

function AddPosts(posts) {
    
    for( let i = 0; i < Object.keys( posts ).length; i++ ) {
    
        var PostInfo = posts[i];
        var NewPost = document.createElement('figure');
        var NewHeadline = document.createElement('figcaption');
        var NewHeadlineText = document.createElement('h3');
        let NewHeadlineTextSpan = document.createElement('span')
        var NewCategoryTextSpan = document.createElement('span');
        var NewCategoryText = document.createElement('p');
        var NewPostLink = document.createElement('a');
        var NewPicture = document.createElement('picture');
        var NewImg = document.createElement('img');

        NewPost.className = PostClass;
        NewHeadlineTextSpan.textContent = decodeHTML(PostInfo.headline);
        NewCategoryTextSpan.textContent = PostInfo.category;
        NewHeadlineTextSpan.setAttribute( 'class', 'post-title' );
        NewCategoryTextSpan.setAttribute( 'class', 'post-categories' );
        
        NewPostLink.href = PostInfo.url;
        
        NewImg.src = PostInfo.imgsrc[0];
        NewImg.alt = PostInfo.imgalt;

        NewPicture.appendChild(NewImg);
        NewHeadlineText.appendChild(NewHeadlineTextSpan);
        NewCategoryText.appendChild(NewCategoryTextSpan);
        NewHeadline.appendChild( NewCategoryText );
        NewHeadline.appendChild( NewHeadlineText );
        
        

        NewPost.appendChild(NewPicture);
        NewPost.appendChild(NewHeadline);
        NewPost.appendChild(NewPostLink);
        
        NewPost.addEventListener('touchstart', function() { this.classList.add('touch'); } );
        NewPost.addEventListener('touchend', function() { this.classList.remove('touch'); });

        console.log(NewPost);
        console.log(PostInfo.headline);
        DocumentMain.appendChild(NewPost);
    }

}

function decodeHTML(html) {
    var txt = document.createElement("textarea");
    txt.innerHTML = html;
    return txt.value;
}