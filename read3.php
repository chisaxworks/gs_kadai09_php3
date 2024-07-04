<?php
//DB接続
require_once('funcs.php');
$pdo = db_conn();

//POST情報
$oriname = $_POST["searchname"];
$searchname = '%'.$_POST["searchname"].'%';
// echo $searchname;
$oricolor = $_POST["searchcolor"];
$searchcolor = '%'.$_POST["searchcolor"].'%';
// echo $searchcolor;

//SQLでデータ取得
$stmt = $pdo->prepare("SELECT * FROM gs_kadai_php2 WHERE sname LIKE :searchname AND color LIKE :searchcolor");
$stmt->bindValue(':searchname', $searchname, PDO::PARAM_STR);
$stmt->bindValue(':searchcolor', $searchcolor, PDO::PARAM_STR);
$status = $stmt->execute();

//データ表示
$view="";
if ($status==false) {
    sql_error($stmt);

}else{
    $resultCount = 0; // 結果のカウント用変数

    //whileで1件ずつ取得
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $resultCount++;

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

    // 結果が0件だった場合のメッセージ表示
    if ($resultCount == 0) {
        $view = "表示する契約情報がありません";
    }
}
?>

<div class="display_wrap">
    <h2>契約一覧</h2>
    <div class="sw_btn">絞り込み</div>
    <form action="index.php" method="post" class="search_wrap">
        <div class="search_item">
            <label for="searchname">ワードで絞り込み (部分一致)</label>
            <input type="text" name="searchname" id="searchname" class="inputarea" value="<?= $oriname ?>">
        </div>
        <div class="search_item">
            <p>色で絞り込み (1色)</p>
            <div class="search_colors">
                <input type="radio" name="searchcolor" id="s_pink" value="pink">
                <label for="s_pink"><span class="color pink"></span></label>
                <input type="radio" name="searchcolor" id="s_yellow" value="yellow">
                <label for="s_yellow"><span class="color yellow"></span></label>
                <input type="radio" name="searchcolor" id="s_green" value="green">
                <label for="s_green"><span class="color green"></span></label>
                <input type="radio" name="searchcolor" id="s_blue" value="blue">
                <label for="s_blue"><span class="color blue"></span></label>
                <input type="radio" name="searchcolor" id="s_purple" value="purple">
                <label for="s_purple"><span class="color purple"></span></label>
                <input type="radio" name="searchcolor" id="s_gray" value="gray">
                <label for="s_gray"><span class="color gray"></span></label>
            </div>
        </div>
        <div class="search_btn_wrap">
            <input type="submit" value="絞り込み" class="search_btn">
            <button class="clear_btn">クリア</button>
        </div>
    </form>
    <div class="item_wrap">
        <?= $view ?>
    </div>
</div>

<script>
    // jsに値を渡すための記述
    let searchname = "<?= $oriname?>";
    let searchcolor ="<?= $oricolor?>";
    console.log(searchname,"searchname");
    console.log(searchcolor,"searchcolor");
</script>