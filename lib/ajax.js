function ajaxob(meth, url) {
    //create object
    if (window.XMLHttpRequest) {
        ajax = new XMLHttpRequest();
    } else {
        ajax = new ActiveXobject('Microsoft.XMLHttp');
    }
    ajax.open(meth, url, true);
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    return ajax;
}

function ajaxreturn(use_ajaxs) {

    if (use_ajaxs.readyState == 4 && use_ajaxs.status == 200) {

        return true;
    }
}
//call part (we well use thin inside the page we wont [cut & pest])
function ajax_fn(tosend, url, id) {
    // alert("ahmad_said");
    var use_ajax = ajaxob('POST', url);
    use_ajax.onreadystatechange = function() {

        if (ajaxreturn(use_ajax)) {
            // action
            if (
                url != "include/showlikedmsgs.php" &&
                url != "include/showsendmsgs.php"

            ) {
                document.getElementById(id).innerHTML += use_ajax.responseText;
            } else {
                document.getElementById(id).innerHTML = use_ajax.responseText;
            }

        }
    }
    use_ajax.send(tosend);

}