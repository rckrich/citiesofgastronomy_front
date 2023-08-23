//require('./bootstrap');
$(document).ready(function () {
    
    //sets navbar collapse button behavior
    var menuToggle = document.getElementById('navbarNav')
    var bsCollapse = new bootstrap.Collapse(menuToggle, {toggle:false})
    $("#OpenMenu").on("click", function(){bsCollapse.toggle()})
    $(".nav-link").on("click", function(){
        $(".nav-link.active").removeClass("active");
        $(".nav-item.active").removeClass("active");
        $(this).addClass("active");
        $(this).parent().addClass("active");
        bsCollapse.hide()
    });  

});