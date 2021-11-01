document.getElementById("div_create_categoria").style.display = "none";

function hideShowCategoria() {
    var x = document.getElementById("div_create_categoria");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}