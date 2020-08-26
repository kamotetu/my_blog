window.onload = function(){
    
    //アクセス時のtitleのvalueをプレビューに表示する処理
    var article_title_value = document.getElementById("article_create_title_input_form").value;
    if(article_title_value !== undefined){
        var article_view_title_value = article_title_value.replace(/\n/g, '<br>');
        var article_view_title = document.getElementById('article_view_title');
        article_view_title.insertAdjacentHTML('afterbegin', '<h5>' + article_view_title_value + '</h5>');
    }
    //アクセス時のtagのvalueをプレビューに表示する処理
    var article_tag_value = document.getElementById('article_create_tag_input_form').value;
    if(article_title_value !== undefined){
        var article_view_tag = document.getElementById('article_view_tag');
        var article_view_title_value = article_tag_value.replace(/\s|　|,|、/g, ' ');
        var article_view_title_value = article_view_title_value.replace(/([^\s]+)/g, '<span class="article_view_tag_color">' + '$1' + '</span>');
        article_view_tag.insertAdjacentHTML('afterbegin', article_view_title_value);
    }

    //タイトル入力フォームの自動伸縮処理(ライブラリ)
    $('textarea#article_create_title_input_form').autoExpand();

    //titleのvalueを入力したときにプレビュー表示する処理
    $('#article_create_title_input_form').on('keyup keyup', function (){
        var input_value = $(this).val();
        
        $('#article_view_title').html('<h5>' +input_value.replace(/\n/g, '<br>') + '</h5>');
    });

    //tagのvalueを入力した時にプレビュー表示する処理
    $('#article_create_tag_input_form').on('keyup', function (){
        var input_value = $('#article_create_tag_input_form').val();
        var input_value = input_value.replace(/\s|　|,|、/g, " ");
        var input_value = input_value.replace(/([^\s]+)/g, '<span class="article_view_tag_color">' + '$1' + '</span>');
        $('#article_view_tag').html(input_value);
    });

    //articleの入力フォームの自動伸縮処理(ライブラリ)
    $('#article_create_article_input_form').autoExpand();

    //articleのvalueを入力した時にプレビューに表示する処理
    $('#article_create_article_input_form').on('keyup', function (){
        var input_value = $(this).val();
        // var input_value = input_value.replace(/\n/g, '<br>');
        var input_value = marked(input_value);
        $('#article_view_article').html(input_value);
    });
};