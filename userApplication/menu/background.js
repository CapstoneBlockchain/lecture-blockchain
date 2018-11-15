$(document).ready(function () {
    function background() {
        var sel = document.getElementById("background");

        sel.style.backgroundColor = sel.value;
    }

    window.background = background;
});
