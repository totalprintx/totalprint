jQuery(function($) {
 
    var popup_zustand = false;
 
    $(".article_create").click(function() {
 
        if(popup_zustand == false) {
            $("#popup").fadeIn("normal");
            $("#hintergrund").css("opacity", "0.7");
            $("#hintergrund").fadeIn("normal");
            popup_zustand = true;
        }
 
    return false;
    });

    $(".article_edit").click(function() {
 
        if(popup_zustand == false) {
            $("#popup_edit").fadeIn("normal");
            $("#hintergrund_edit").css("opacity", "0.7");
            $("#hintergrund_edit").fadeIn("normal");
            popup_zustand = true;
        }
 
    return false;
    });
 
    $(".schliessen").click(function() {
 
        if(popup_zustand == true) {
            $("#popup").fadeOut("normal");
            $("#hintergrund").fadeOut("normal");
            popup_zustand = false;
        }
 
    });

    $(".schliessen_edit").click(function() {
 
        if(popup_zustand == true) {
            $("#popup_edit").fadeOut("normal");
            $("#hintergrund_edit").fadeOut("normal");
            popup_zustand = false;
        }
 
    });
 
});