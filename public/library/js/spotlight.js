$(document).ready(function(){
    $("ul#navigation li").hover(function(){
        if(!$(this).hasClass('separator'))
            $(this).animate({backgroundColor:'#d3d3d3'}, 200);
    }, function(){
        if(!$(this).hasClass('separator'))
            $(this).animate({backgroundColor:'#f5f5f5'}, 200);
    });
});