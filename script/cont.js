var start = 1;
function LoadMore() {

    var LoadMore = new XMLHttpRequest();
    LoadMore.onreadystatechange = function () {
        if (LoadMore.status === 200 && LoadMore.readyState === 4) {
            
            document.getElementById('baseContainer').insertAdjacentHTML('beforeend', this.responseText);
        }
    }
    LoadMore.open("POST", "videoCont.php?start=" + start, true);
    LoadMore.send();
    start++;
}

LoadMore();


document.addEventListener('scroll', function () {

    var maxHeight = window.document.documentElement.scrollHeight - (window.innerHeight + 100);
    if (window.pageYOffset > maxHeight) {
        LoadMore();
    }
})
 