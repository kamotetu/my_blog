$(function(){
    var $textarea = $('#article_create_article_input_form');
    var lineHeight = parseInt($textarea.css('lineHeight'));

    $textarea.on('input', function(e){
        var lines = ($(this).val() + '\n').match(/\n/g).length;
        if(lines >= 10){
            $(this).height(lineHeight * lines);
        }
    });
});