function ckeditorReplace(name){
    CKEDITOR.replace(name,{
        filebrowserBrowseUrl : '/library/editor/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : '/library/editor/ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl : '/library/editor/ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl : '/library/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : '/library/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : '/library/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
}
