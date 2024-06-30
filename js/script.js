// toggle

$('.add_btn').click(function () {

    if($('.add_btn').hasClass('active')){
        $('.input_wrap').slideUp(1000);
        $('.add_btn').removeClass('active');
        $('.add_btn').html('情報登録');
    }else{
        $('.input_wrap').slideDown(1000);
        $('.add_btn').addClass('active');
        $('.add_btn').html('閉じる');
    };

});

//色選択した時の動作
$(".color").on("click", function () {

    //選択したもの以外は半透明にする
    $('.color').css('opacity', '0.6');
    $(this).css('opacity', '1.0');
});

//itemクリックしたときの動作
$(".item").on("click", function (event) {

    //toggleはaタグの時以外
    if (!$(event.target).is('a')) {
        $(this).find('.ogpImg').toggle();
        $(this).find('.details').toggle();
    }

    //aタグの時は親イベントが動かないように
    $('.edit_btn, .open_btn').on('click', function(event) {
        event.stopPropagation();
    });
});

// 削除時アラート
$(".delete_btn").on("click", function () {

    if(!confirm("削除してもよろしいですか？")){
        return false;
    }
});