function getHttpObject () {
    if ( window.ActiveXObject ) {
        return new ActiveXObject("Microsoft.XMLHTTP");
    } else if ( window.XMLHttpRequest ) {
        return new XMLHttpRequest();
    } else {
        alert("AJAX is not supported");
        return null;
    }
}

function doWork () {
    HttpObject = getHttpObject();
    if ( HttpObject == null ) return;
    HttpObject.open("GET", "processor.php?go="+document.getElementById("inputText").value+"&desire="+document.getElementById("desireText").value, true);
    HttpObject.onreadystatechange = function() {
        if ( this.readyState == 4 ) {
           document.getElementById("answer").innerHTML = this.responseText;
            console.log(this.responseText);
        }
    };
    HttpObject.send();
}
