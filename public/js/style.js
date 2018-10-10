function myHamburger(x) {
    x.classList.toggle("change");
    document.getElementById("topnav").classList.toggle('topnav-change');
    document.getElementById("side-header").classList.toggle('side-change');
    document.getElementById("side-menu").classList.toggle('side-menu-change');
    document.getElementById("mainDashboard").classList.toggle('dashboardContent-change');
}
function myDropdwonSide(x){
    document.getElementById("list"+x).classList.toggle('dropdown-hiddenSide');
}