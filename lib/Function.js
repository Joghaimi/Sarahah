function lovepost(post) {
    url = "actions/lovepost.php";
    tosend = "lovepost=" + post;
    html_id = 'msg';
    id = '';
    ajax_fn(tosend, url, html_id);
}

function showliked() {
    url = "include/showlikedmsgs.php"
    tosend = "showloved=" + 1;
    html_id = 'containers';
    ajax_fn(tosend, url, html_id);
    document.getElementById("showliked").setAttribute("class", " col-lg-4 padding-zero icon active")
    document.getElementById("getmsg").setAttribute("class", " col-lg-4 padding-zero icon ")
    document.getElementById("send").setAttribute("class", " col-lg-4 padding-zero icon ")

}

function showsendmsgs() {
    url = "include/showsendmsgs.php"
    tosend = "showsendmsgs";
    html_id = 'containers';
    ajax_fn(tosend, url, html_id);
    document.getElementById("showliked").setAttribute("class", " col-lg-4 padding-zero icon ")
    document.getElementById("getmsg").setAttribute("class", " col-lg-4 padding-zero icon ")
    document.getElementById("send").setAttribute("class", " col-lg-4 padding-zero icon active")


}