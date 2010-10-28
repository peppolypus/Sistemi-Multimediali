$(document).ready(function(){
    $("ul.subnav").parent().append("<span></span>");

    $("ul#topnav li span").click(function(){
        $(this).parent().find("ul.subnav").slideDown('fast').show();

        $(this).parent().hover(function(){

        }, function(){
            $(this).parent().find("ul.subnav").slideUp('slow');
        });
    }).hover(function(){
        $(this).addClass("subhover");
    }, function(){
        $(this).removeClass("subhover");
    });

    $("ul.subnav li").hover(function(){
        $(this).animate({backgroundColor: '#d3d3d3'}, 200);
        $(this).find("a").animate({color: '#000'}, 200);
    }, function(){
        $(this).animate({backgroundColor: '#333'}, 200);
        $(this).find("a").animate({color: '#fff'}, 200);
    });
});