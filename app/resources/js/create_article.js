$(function(){

    var $textarea = $('#article_create_article_input_form');
    var lineHeight = parseInt($textarea.css('lineHeight'));

    $textarea.on('input', function(e){
        var lines = ($(this).val() + '\n').match(/\n/g).length;
        if(lines >= 10){
            $(this).height(lineHeight * lines);
        }
    });

    var $textareatitle = $('.article_create_title_input_form');
    var lineHeightTitle = parseInt($textareatitle.css('lineHeight'));

    $textareatitle.on('input', function(e) {
        var linestitle = ($(this).val() + '\n').match(/\n/g).length;
        if(linestitle >= 1){
            $(this).height(lineHeightTitle * linestitle);
        }
    });

    $('.article_create_title_input_form').on('keyup', function (){
        var input_value = $(this).val();
        
        $('.article_view_title').html('<h5>' +input_value.replace(/\n/g, '<br>') + '</h5>');
    });

    $('.article_create_tag_input_form').on('keyup', function (){
        var input_value = $('.article_create_tag_input_form').val();
        var input_value = input_value.replace(/\s|　|,|、/g, " ");

        $('.article_view_tag').html(input_value);
    });

    $('#article_create_article_input_form').on('keyup', function (){
        var input_value = $(this).val();
        var input_value = input_value.replace(/\n/g, '<br>');
        $('.article_view_article').html(input_value);
    });

    $('#input_article_submit').on('click', function (){
        $(form).submit();
    })
});