$(document).ready(function(){

    var loading = $('<img src="/images/ajax-loader.gif" />');
    $("a.ajax").click(function(e){
        e.preventDefault();
        $("div#bugview").empty().html(loading);
        $.post(
            $(this).attr('href'),
            function(data){
                $("div#bugview").empty().html(data);
            }
        ); 
    });

});

