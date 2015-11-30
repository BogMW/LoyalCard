$(".tab-search").on('click', function(){
        $('.tab-search').addClass('active-tab');
        $('.tab-add').removeClass('active-tab');
        $('.view-container').css('display', 'block')
        $('.add-container').css('display', 'none')
});

$(".tab-add").on('click', function(){
    $('.tab-add').addClass('active-tab');
    $('.tab-search').removeClass('active-tab');
    $('.view-container').css('display', 'none')
    $('.add-container').css('display', 'block')
});

