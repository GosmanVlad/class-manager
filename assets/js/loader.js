var textLoader = window.setInterval( function() {
    var points = document.getElementById("points");
    if ( points.innerHTML.length > 3 ) 
        points.innerHTML = "";
    else 
        points.innerHTML += ".";
}, 260);