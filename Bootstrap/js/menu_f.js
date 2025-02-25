document.getElementById('menu-toggle').addEventListener('click', function () {
     var navbarLinks = document.getElementById('navbar-links');
     navbarLinks.classList.toggle('active');
});

function openSidebar() {
     document.getElementById("mySidebar").style.left = "0";
}

function closeSidebar() {
     document.getElementById("mySidebar").style.left = "-250px";
}
