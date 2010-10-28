$(document).ready(function(){
    
    $("div.placeholder").hide();

    $("a#addtextfield").click(function(e){
        $.post(
            $(this).attr('href'),
            {type: 'textfield'},
            function(data)
            {
                $("#form").append(data);
            }
        )
        e.preventDefault();
        /*
        var content = $("div#textfield").html();
        var element = $('<div class="element" style="padding: 10px; margin: 10px; border: 1px solid black;"></div>').html(content).hide();
        $("form#application dl.zend_form").append(element);
        element.fadeIn('slow');*/
    });

    $("a.remove").live('click', function(e)
    {
        console.log("Clicked");
        e.preventDefault();
        $(this).parent().parent().remove();
    });
    
    $("form#application").live('submit', function(e){
        // Impedisci al form di inviare i dati
        e.preventDefault();
        // Mostra la barra di caricamento
        var loading = $('<img class="loading" src="/images/ajax-loader.gif" />');
        $("#preview").empty().html(loading);
        $("form.adminform").each(function(){
            var data = $(this).serializeArray();
            $.post(
                "/backend/async/preview",
                {
                    data: data
                },
                function(result){
                    $(".loading").remove();
                    $("#preview").append(result);
                }
            );
        });
        /*
        // Mostra la barra di caricamento
        var loading = $('<img src="/images/ajax-loader.gif" />');
        $("div#preview").empty().html(loading);
        // Serializza i dati in formato JSON
        var serialized = $(this).serializeArray();
        $.post(
            "/backend/async/preview",
            {
                data: serialized
            },
            function(data){
                var html = "";
                $("#preview").empty().html(data);
            }//, 'json'
        );*/
    });
    
});



