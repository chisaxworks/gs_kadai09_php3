<?php


//DB接続
require_once('funcs.php');
$pdo = db_conn();

//SQLでデータ取得
$stmt = $pdo->prepare('SELECT * FROM gs_kadai_php2');
$status = $stmt->execute();

//データ表示
$view="";
$arr=[];
if ($status==false) {
    sql_error($stmt);

}else{
    //whileで1件ずつ取得
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){

        $view .= '<div id="';
        $view .= $result['id'];
        $view .= '" class="item ';
        $view .= $result['color'];
        $view .= '">';
        $view .= '<p class="sname">';
        $view .= $result['sname'];
        $view .= '</p>';
        $view .= '<img class="ogpImg" src="';
        $view .= $result['ogpimg'];
        $view .= '" alt="">';
        $view .= '<div class="details"><p><span>プラン</span>';
        $view .= $result['plan'];
        $view .= '</p><p><span>メール</span>';
        $view .= $result['mail'];
        $view .= '</p><p><span>支払有無</span>';
        $view .= $result['payment'];
        $view .= '</p><p><span>補足</span>';
        $view .= $result['note'];
        $view .= '</p><div class="btn_wrap"><a href="edit.php?id=';
        $view .= $result['id'];
        $view .= '" class="edit_btn">編集・削除</a><a href="';
        $view .= $result['url'];
        $view .= '" target="_blank" class="open_btn">開く</a></div></div></div>';
    }
}
?>

<div class="display_wrap">
    <h2>契約一覧</h2>
    <div class="item_wrap">
        <?= $view ?>
    </div>
</div>