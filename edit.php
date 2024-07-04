<?php
//GETでid取得
$id = $_GET['id'];

//DB接続
require_once('funcs.php');
$pdo = db_conn();

//Select
$stmt = $pdo->prepare('SELECT * FROM gs_kadai_php2 WHERE id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //バインド変数
$status = $stmt->execute();

//データ表示
$view = '';
if ($status === false) {
    sql_error($stmt);
} else {
    $result = $stmt->fetch();
}
?>

<?php include("head.html");?>

<!-- 編集画面  -->
<div class="edit_wrap">
    <h2>契約情報編集・削除</h2>
    <form action="update.php" method="post" class="input_form">
        <div class="input_item">
            <label for="sname">サービス名</label>
            <input type="text" name="sname" id="sname" class="inputarea" value="<?= $result['sname'] ?>">
        </div>
        <div class="input_item">
            <label for="url">サービスURL</label>
            <input type="url" name="url" id="url" class="inputarea" value="<?= $result['url'] ?>">
        </div>
        <div class="input_item">
            <label for="mail">メールアドレス</label>
            <input type="email" name="mail" id="mail" class="inputarea" value="<?= $result['mail'] ?>">
        </div>
        <div class="input_item">
            <label for="plan">利用プラン</label>
            <input type="text" name="plan" id="plan" class="inputarea" value="<?= $result['plan'] ?>">
        </div>
        <div class="input_item">
            <label for="payment">支払有無</label>
            <select name="payment" id="payment" class="inputarea">
                <option value="無料" <?php if( $result['payment'] == "無料") echo "selected" ?>>無料</option>
                <option value="月払い" <?php if( $result['payment'] == "月払い") echo "selected" ?>>月払い</option>
                <option value="年払い" <?php if( $result['payment'] == "年払い") echo "selected" ?>>年払い</option>
                <option value="その他" <?php if( $result['payment'] == "その他") echo "selected" ?>>その他</option>
            </select>
        </div>
        <div class="input_item">
            <label for="note">補足</label>
            <input type="text" name="note" id="note" class="inputarea" value="<?= $result['note'] ?>">
        </div>
        <div class="input_item testradio">
            <div>色選択</div>
            <div class="colors">
                <input type="radio" name="color" id="pink" value="pink" <?php if( $result['color'] == "pink"){echo 'checked';}else{echo 'class="db_unchecked"';} ?>>
                <label for="pink"><span class="color pink"></span></label>
                <input type="radio" name="color" id="yellow" value="yellow" <?php if( $result['color'] == "yellow"){echo 'checked';}else{echo 'class="db_unchecked"';} ?>>
                <label for="yellow"><span class="color yellow"></span></label>
                <input type="radio" name="color" id="green" value="green" <?php if( $result['color'] == "green"){echo 'checked';}else{echo 'class="db_unchecked"';} ?>>
                <label for="green"><span class="color green"></span></label>
                <input type="radio" name="color" id="blue" value="blue" <?php if( $result['color'] == "blue"){echo 'checked';}else{echo 'class="db_unchecked"';} ?>>
                <label for="blue"><span class="color blue"></span></label>
                <input type="radio" name="color" id="purple" value="purple" <?php if( $result['color'] == "purple"){echo 'checked';}else{echo 'class="db_unchecked"';} ?>>
                <label for="purple"><span class="color purple"></span></label>
                <input type="radio" name="color" id="gray" value="gray" <?php if( $result['color'] == "gray"){echo 'checked';}else{echo 'class="db_unchecked"';} ?>>
                <label for="gray"><span class="color gray"></span></label>
            </div>
        </div>
        <div>
            <!-- 更新とキーになるidを渡す/表示は隠す-->
            <input type="hidden" name="id" value="<?= $result['id'] ?>">
            <input type="submit" value="更新" class="submit_btn">
        </div>
        <div class="otherbtn_wrap">
            <a href="delete.php?id=<?= $result['id'] ?>" class="delete_btn">削除</a>
            <a class="back_btn2" href="index.php">戻る</a>
        </div>
    </form>
</div>

<?php include("foot_others.html");?>