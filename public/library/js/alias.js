function addAliasListener(elementId, inputId)
{
    $("#" + elementId).bind('blur', function(){
        var headline = $(this).val();
        headline = headline.replace(/ /gi, "-");
        headline = headline.replace(/\W+/g, "-");
        headline = headline.toLowerCase();
        $("#" + inputId).val(headline);
    });
}