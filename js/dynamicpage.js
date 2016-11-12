$(function() {

    var newHash      = "",
        $mainContent = $("#content"),
        $wrapper    = $("#wrapper"),
        baseHeight   = 0,
        $el;
        
    $wrapper.height($wrapper.height());
    baseHeight = $wrapper.height() - $mainContent.height();
    
    $("#navi").delegate("a", "click", function() {
        window.location.hash = $(this).attr("href");
        return false;
    });
    
    $(window).bind('hashchange', function(){
    
        newHash = window.location.hash.substring(1);
        
        if (newHash) {
            $mainContent
                .find("#content_inner")
                .fadeOut(200, function() {
                    $mainContent.hide().load(newHash + " #content_inner", function() {
                        $mainContent.fadeIn(200, function() {
                            $wrapper.animate({
                                height: baseHeight + $mainContent.height() + "px"
                            });
                        });
                        $("#navi a").removeClass("current");
                        $("#navi a[href="+newHash+"]").addClass("current");
                    });
                });
        };
        
    });
    
    $(window).trigger('hashchange');

});