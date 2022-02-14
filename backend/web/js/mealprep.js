function timedRefresh(timeoutPeriod) {
    setTimeout("location.reload(true);",timeoutPeriod);
}

//window.onload = timedRefresh(5000);

var coll = document.getElementsByClassName("collapsible");
var seta = document.getElementsByClassName("fa-arrow-down");
var i;

for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
            content.style.display = "none";
        } else {
            content.style.display = "block";
        }
    });
}

for (i = 0; i < seta.length; i++) {
    seta[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.classList;
        if (content.rotate === "180") {
            content.rotate = "-180";
        } else {
            content.rotate = "180";
        }
    });
}