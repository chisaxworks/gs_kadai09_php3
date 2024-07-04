// 新規登録ボタンtoggle
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

// 色選択した時の動作
// 新規登録エリア
$(".colors .color").on("click", function () {
    // 選択したもの以外は半透明にする
    $('.colors .color').css('opacity', '0.6');
    $(this).css('opacity', '1.0');
});

// 絞り込みエリア
$(".search_colors .color").on("click", function () {
    // 選択したもの以外は半透明にする
    $('.search_colors .color').css('opacity', '0.6');
    $(this).css('opacity', '1.0');
});

// itemクリックしたときの動作
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

// 絞り込みクリアボタン
$(".clear_btn").on("click", function () {
    $("#searchname").val("");
    $("#s_pink").val("");
    $("#s_yellow").val("");
    $("#s_green").val("");
    $("#s_blue").val("");
    $("#s_purple").val("");
    $("#s_gray").val("");
});

// 絞り込みボタンtoggle
$(".sw_btn").on("click", function () {

    if($('.sw_btn').hasClass('active')){
        $('.search_wrap').slideUp(1000);
        $('.sw_btn').removeClass('active');
        $('.sw_btn').html('絞り込み');
    }else{
        $('.search_wrap').slideDown(1000);
        $('.sw_btn').addClass('active');
        $('.sw_btn').html('閉じる');
    };

});

// 絞り込みの値が入っている時は絞り込みエリアオープン
if(searchname != "" || searchcolor != "" ){
    console.log("リロード時オープン確認");
    $('.search_wrap').css('display','block');
    $('.sw_btn').addClass('active');
    $('.sw_btn').html('閉じる');
}

// 色絞り込みした時の選択状態を保持（見た目上）
if(searchcolor == "pink"){
    $('.search_colors .color').css('opacity', '0.6');
    $('.search_colors .pink').css('opacity', '1.0');
}

if(searchcolor == "yellow"){
    $('.search_colors .color').css('opacity', '0.6');
    $('.search_colors .yellow').css('opacity', '1.0');
}

if(searchcolor == "green"){
    $('.search_colors .color').css('opacity', '0.6');
    $('.search_colors .green').css('opacity', '1.0');
}

if(searchcolor == "blue"){
    $('.search_colors .color').css('opacity', '0.6');
    $('.search_colors .blue').css('opacity', '1.0');
}

if(searchcolor == "purple"){
    $('.search_colors .color').css('opacity', '0.6');
    $('.search_colors .purple').css('opacity', '1.0');
}

if(searchcolor == "gray"){
    $('.search_colors .color').css('opacity', '0.6');
    $('.search_colors .gray').css('opacity', '1.0');
}