$('.fa-align-justify').on('click', function(){
    $('.left_side_content').toggleClass('active');
    $('.fa-align-justify').toggleClass('hide');
    $('.fa-angle-left').toggleClass('icon_active');
});
$('.fa-angle-left').on('click', function(){
    $('.left_side_content').removeClass('active');
    $('.fa-align-justify').removeClass('hide');
    $('.fa-angle-left').removeClass('icon_active');
});