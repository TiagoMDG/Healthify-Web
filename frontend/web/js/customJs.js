// Tabbed Menu
function openMenu(evt, menuName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("menu");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
    }
    document.getElementById(menuName).style.display = "block";
    evt.currentTarget.firstElementChild.className += " w3-dark-grey";
}
document.getElementById("myLink").click();

function onLinkClick(id) {
    switch (id) {
        case "homeButton":
            document.getElementById("home").scrollIntoView();
            break;

        case "aboutButton":
            document.getElementById("about").scrollIntoView();
            break;

        case "menuButton":
            document.getElementById("menu").scrollIntoView();
            break;

        case "contactButton":
            document.getElementById("where").scrollIntoView();
            break;

        default:
            break;
    }
}