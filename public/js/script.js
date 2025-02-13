// toggle
document.getElementById("menu-toggle").addEventListener("click", function () {
    document.getElementById("mobile-sidebar").classList.remove("hidden");
});
document.getElementById("close-menu").addEventListener("click", function () {
    document.getElementById("mobile-sidebar").classList.add("hidden");
});
