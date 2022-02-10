let menu_C;

window.onload = function () {
    menu_C = document.getElementById("menu");
}

function shMenu() {
    if (menu_C.style.display == "none") {
        menu_C.style.display = "block";
    }
    else {
        menu_C.style.display = "none";
    }
}