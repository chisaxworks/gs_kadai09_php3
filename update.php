<?php
// 関数ファイル呼び出し
require_once('funcs.php');

// POSTデータ取得
$sname = $_POST["sname"];
$url = $_POST["url"];
$mail = $_POST["mail"];
$plan = $_POST["plan"];
$payment = $_POST["payment"];
$note = $_POST["note"];
$color = $_POST["color"];
$id = $_POST['id'];

//OGP情報取得
  // キャッシュの初期化（このあとキャッシュには格納はするので）
  $ogpCache = [];

  // 実行（同上）
  $ogpImg = getOgpImg($url, $ogpCache);

// PHPからDB接続
$pdo = db_conn();

// データ更新SQL
$stmt = $pdo->prepare(
    'UPDATE gs_kadai_php2
        SET sname = :sname, url = :url, mail = :mail, plan = :plan, payment = :payment, note = :note, color = :color, ogpimg = :ogpimg, modifyDate = now()
            WHERE id = :id;'
);

// バインド変数
$stmt->bindValue(':sname', $sname, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
$stmt->bindValue(':plan', $plan, PDO::PARAM_STR);
$stmt->bindValue(':payment', $payment, PDO::PARAM_STR);
$stmt->bindValue(':note', $note, PDO::PARAM_STR);
$stmt->bindValue(':color', $color, PDO::PARAM_STR);
$stmt->bindValue(':ogpimg', $ogpImg, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

// 実行
$status = $stmt->execute();

//データ更新処理後
if ($status === false) {
    sql_error($stmt);
}

?>

<?php include("head.html");?>
<div class="reg_wrap">
    <h2>以下の内容で更新しました</h2>
      <div class="reg">
          <p><span>サービス名</span><?=$sname?></p>
          <p><span>サービスURL</span><?=$url?></p>
          <p><span>メール</span><?=$mail?></p>
          <p><span>利用プラン</span><?=$plan?></p>
          <p><span>支払有無</span><?=$payment?></p>
          <p><span>備考</span><?=$note?></p>
      </div>
    <a class="back_btn" href="index.php">戻る</a>
</div>
<?php include("foot.html");?>

<!-- 背景色処理 -->
<script>
  const bgColor = "<?php echo $color; ?>"
  $(".reg").addClass(bgColor);
</script>