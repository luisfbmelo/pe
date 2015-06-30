/**
 * Created by Luis Melo on 21-02-2014.
 */
$(document).ready(function(){
    /*
    FIX INDEX SECTORS HEIGHT
     */
    if ($(".sectors .row .thumbnail p").length>0){
        $.each($(".sectors .row .thumbnail p"),function(){
            var setHeight = $(this).height();
            $(this).css({
                "height" : setHeight+"px",
                "margin-top" : "-"+(setHeight/2)+"px"
            });
        });
    }

    //on resize
    window.onresize = function() {
        if ($(".sectors .row .thumbnail p").length>0){
            $.each($(".sectors .row .thumbnail p"),function(){
                setHeight = $(this).height();
                $(this).css({
                    "height" : setHeight+"px",
                    "margin-top" : "-"+(setHeight/2)+"px"
                });
            });
        }
    }

    if ($(".statusBox").length>0){
        $(".statusBox").delay(5000).fadeOut(500,function(){
            $(".statusBox").css("display","none");
        });
    }

});
