$(document).ready(function(){
    $("a#save").click(function(e){
        e.preventDefault();
        $("form").submit();
    });
});
