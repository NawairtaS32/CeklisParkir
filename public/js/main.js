
$(window).bind("load resize", function () {
    if ($(this).width() < 720) { //buat ukuran smartphone
        $(".navbottom .nav-pills").show();
        $(".navbar .image").show();
        $(".carousel").show();
        $(".img720p").hide();
        $(".ukuran-latop").hide();
    } else { //buat ukuran Latop
        $(".navbottom .nav-pills").hide();
        $(".navbar .image").hide();
        $(".carousel").hide();
        $(".img720p").show();
        $(".ukuran-latop").show();
    }

    // dropdown menu slidebar

    $(".offcanvas .offcanvas-header .subJudul .profil").click(function(){
        $(".menu-profil").slideToggle("slow");
        $(".rotate-profil").toggleClass("rotate");
    });

    $(".offcanvas .menu-item .item .mobil").click(function(){
        $(".mobil-show").slideToggle("slow");
        $(".rotate-mobil").toggleClass("rotate");
    });

    $(".offcanvas .menu-item .item .motor").click(function(){
        $(".motor-show").slideToggle("slow");
        $(".rotate-motor").toggleClass("rotate");
    });
    
    //End dropdown menu slidebar
});

