function myHamburger(x) {
    x.classList.toggle("change");
    document.getElementById("topnav").classList.toggle('topnav-change');
    document.getElementById("side-header").classList.toggle('side-change');
    document.getElementById("side-menu").classList.toggle('side-menu-change');
    document.getElementById("app").classList.toggle('dashboardContent-change');
}
function myDropdwonSide(x){
    document.getElementById("list"+x).classList.toggle('dropdown-hiddenSide');
}

function rightDropDown(){
    if($( window ).width() <1100 ){
        document.getElementById('navbarRight').classList.toggle('navbar-dropdown-change');
        document.getElementById('textRightNav').classList.toggle('navbar-text-right-change');
        document.getElementById('logoRightNav').classList.toggle('navbar-text-logo-change');
    }

}