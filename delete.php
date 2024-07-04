<?php

//GETデータ取得
$id = $_GET['id'];

//DB接続します
require_once('funcs.php');
$pdo = db_conn();

//SQLでデータ取得
$stmt1 = $pdo->prepare('SELECT sname, color FROM gs_kadai_php2 WHERE id = :id');
$stmt1->bindValue(':id', $id, PDO::PARAM_INT);
$status1 = $stmt1->execute();
//データ取得処後
if ($status1 === false) {
    sql_error($stmt1);
} else {
    $result = $stmt1->fetch();
}

//データ削除SQL作成
$stmt2 = $pdo->prepare(
    'DELETE FROM gs_kadai_php2 WHERE id = :id;'
);

$stmt2->bindValue(':id', $id, PDO::PARAM_INT);
$status2 = $stmt2->execute(); //実行

//データ削除処理後
if ($status === false) {
    sql_error($stmt2);
}

?>

<?php include("head.html");?>
<div class="reg_wrap">
    <h2>以下のサービス情報を削除しました</h2>
      <div class="reg">
          <p><span>サービス名</span><?= $result['sname'] ?></p>
      </div>
    <a class="back_btn" href="index.php">戻る</a>
</div>
<?php include("foot_others.html");?>

<!-- 背景色処理 -->
<script>
  const bgColor = "<?= $result['color'] ?>"
  $(".reg").addClass(bgColor);
</script>