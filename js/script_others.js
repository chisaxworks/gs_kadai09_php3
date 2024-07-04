// 色選択した時の動作
// 新規登録エリア
$(".colors .color").on("click", function () {
    // 選択したもの以外は半透明にする
    $('.colors .color').css('opacity', '0.6');
    $(this).css('opacity', '1.0');
});

// レコード削除時アラート
$(".delete_btn").on("click", function () {

    if(!confirm("削除してもよろしいですか？")){
        return false;
    }
});