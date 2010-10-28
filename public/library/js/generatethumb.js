function generateThumbnail(thumb, src)
{
    var container = $('<div></div>');
    container.addClass('gallery-image-preview');
    container.addClass('rounded-5');
    container.css({
        'width'   : '90px',
        'height'  : '140px',
        'padding' : '5px',
        'margin'  : '5px',
        'position': 'relative',
        'float' : 'left',
        'border' : '1px solid #ccc'
    });
    var thumbnail = $('<img src="' + thumb + '" alt="Image" width="90" height="90" />');
    var link = $('<a href="#" data-image="' + src + '" class="delete-image"></a>');
    link.css({
        'position':'absolute',
        'top': '110px',
        'left' : '0',
        'width' : '100px',
        'height' : '40px',
        'display' : 'block'
    });
    var span = $('<span class="delete-image-container"></span>');
    span.css({
        'display' : 'block',
        'width' : '100px',
        'height' : '40px'
    });
    span.appendTo(link);
    link.appendTo(container);
    thumbnail.appendTo(container);
    return container;
}