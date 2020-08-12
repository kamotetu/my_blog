$(function(){

    var $textarea = $('#article_create_article_input_form');
    var lineHeight = parseInt($textarea.css('lineHeight'));

    $textarea.on('input', function(e){
        var lines = ($(this).val() + '\n').match(/\n/g).length;
        if(lines >= 10){
            $(this).height(lineHeight * lines);
        }
    });

    $('textarea.article_create_title_input_form').autoExpand();

    $('.article_create_title_input_form').on('keyup keyup', function (){
        var input_value = $(this).val();
        
        $('.article_view_title').html('<h5>' +input_value.replace(/\n/g, '<br>') + '</h5>');
    });

    $('.article_create_tag_input_form').on('keyup', function (){
        var input_value = $('.article_create_tag_input_form').val();
        var input_value = input_value.replace(/\s|　|,|、/g, " ");
        var input_value = input_value.replace(/([^\s]+)/g, '<span class="article_view_tag_color">' + '$1' + '</span>');
        $('.article_view_tag').html(input_value);
    });

    $('#article_dreate_article_input_form').autoExpand();

    $('#article_create_article_input_form').on('keyup', function (){
        var input_value = $(this).val();
        var input_value = input_value.replace(/\n/g, '<br>');
        $('.article_view_article').html(input_value);
    });

    $('#input_article_submit').on('click', function (){
        $(form).submit();
    })
});