$(function(){
    $('.js-modal-open').on('click',function(){
        $('.js-modal').fadeIn();
        var post = $(this).after('post');
        var post_id = $(this).after('post_id');

        $('.modal_post').text(post);
        $('.modal_id').val(post_id);
        return false;
    });

    $('.js-modal-close').on('click',function(){
        $('.js-modal').fadeOut();
        return false;
    });
});