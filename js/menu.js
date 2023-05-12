if(window.history.replaceState){
    window.history.replaceState(null, null, window.location.href);
}
var side_menu = document.getElementById("menu_side");
var navItems = document.querySelectorAll('nav .nav-item');
var toggle = document.querySelector('.menu__side .toggle');


toggle.addEventListener('click', () => {
        if (side_menu.className === 'menu__side')
            side_menu.classList.add("open");
        else
            side_menu.classList.remove("open");
});

    navItems.forEach(navItem => {

        navItem.addEventListener('click', () => {
    
            navItems.forEach(navItem => {
                navItem.classList.remove('active');
            });
    
            navItem.classList.add('active');
    
        });
    
    });


if (window.innerWidth < 760){
    body.classList.add("body_move");
    side_menu.classList.add("open");
}


window.addEventListener("resize", function(){

    if (window.innerWidth > 760){
        body.classList.remove("body_move");
    }

    if (window.innerWidth < 760){

        body.classList.add("body_move");
        side_menu.classList.add("open");
    }
});



// $(document).ready(function () {
//     $('#example').DataTable();
// });