//var PostClass = ['ADK-MidArticle', 'ADK-SmallArticle', 'ADK-SmallArticle', 'ADK-SmallArticle', 'ADK-MidArticle', 'ADK-SmallArticle', 'ADK-SmallArticle', 'ADK-SmallArticle', 'ADK-SmallArticle'];
var PostClass = 'ADK-Article';
var DocumentMain = document.getElementsByTagName('main');
var LoadingPosts = false;
var loadMorePostsFunction;
DocumentMain = DocumentMain[0];

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
    var ajaxhttp = new XMLHttpRequest();
    ajaxhttp.open('POST', ajaxurl, true);
    ajaxhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    
    switch (PageType) {
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
        }
    };

}

function AddPosts(posts) {
    
    for(i=0;i<Object.keys(posts).length;i++) {
    
        var PostInfo = posts[i];
        var NewPost = document.createElement('figure');
        var NewHeadline = document.createElement('figcaption');
        var NewHeadlineText = document.createElement('h3');
        var NewCategory = document.createElement('span');
        var NewCategoryText = document.createElement('p');
        var NewPostLink = document.createElement('a');
        var NewPicture = document.createElement('picture');
        var NewImg = document.createElement('img');

        NewPost.className = PostClass;
        NewHeadlineText.textContent = decodeHTML(PostInfo.headline);
        NewPostLink.href = PostInfo.url;
        NewCategoryText.textContent = PostInfo.category;
        NewImg.src = PostInfo.imgsrc[0];
        NewImg.alt = PostInfo.imgalt;

        NewPicture.appendChild(NewImg);
        NewHeadline.appendChild(NewHeadlineText);
        NewCategory.appendChild(NewCategoryText);

        NewPost.appendChild(NewPicture);
        NewPost.appendChild(NewCategory);
        NewPost.appendChild(NewHeadline);
        NewPost.appendChild(NewPostLink);

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