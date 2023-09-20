<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    // 選択内容保存
    $_SESSION['selected_options'] = $_POST;
    header("Location: /confirm/confirm.php"); 
    exit();
}
?>


<?php
    $data = file_get_contents('data.json');

    if ($data === false) {
        // エラー処理
        die('JSONデータの読み込みに失敗しました。');
    }

    // 配列に変換
    $optionsData = json_decode($data, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        die('JSONデータの解析に失敗しました。');
    }
    
  ?>

  <?php
    require_once('lib/function.php');
  ?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>  
  <form action="/confirm/confirm.php" method="POST">
  <div class="l-inner">
  <ul class="product__list">
      <li class="product__item is-active">本体構成</li>
      <li class="product__item">周辺機器</li>
      <li class="product__item">サービス</li>
      <li class="product__item">内容確認</li>
    </ul>

  

  <section class="os">
    <h3>OS</h3>
    <?php
      $firstRadioOs = true;
      generateRadioOptions($optionsData['osOptions'], $_SESSION['selected_options'], 'os');
    ?>
  </section>
  <section class="office">
    <h3>オフィスソフト</h3>
    <?php
      $firstRadioOs = true;
      generateRadioOptions($optionsData['officeOptions'], $_SESSION['selected_options'], 'office');
    ?>
  </section>
  <section class="security">
    <h3>セキュリティソフト</h3>
    <?php
      $firstRadioOs = true;
      generateRadioOptions($optionsData['securityOptions'], $_SESSION['selected_options'], 'security');
    ?>
  </section>
  <section class="cpu">
    <h3>CPU</h3>
    <?php
      $firstRadioOs = true;
      generateRadioOptions($optionsData['cpuOptions'], $_SESSION['selected_options'], 'cpu');
    ?>
  </section>
  <section class="fan">
    <h3>CPUファン</h3>
    <?php
      $firstRadioOs = true;
      generateRadioOptions($optionsData['fanOptions'], $_SESSION['selected_options'], 'fan');
    ?>
  </section>
  <section class="grease">
    <h3>CPUグリス</h3>
    <?php
      $firstRadioOs = true;
      generateRadioOptions($optionsData['greaseOptions'], $_SESSION['selected_options'], 'grease');
    ?>
  </section>
  <section class="graphic">
    <h3>グラフィック機能</h3>
    <?php
      $firstRadioOs = true;
      generateRadioOptions($optionsData['graphicOptions'], $_SESSION['selected_options'], 'graphic');
    ?>
  </section>
  <section class="power">
    <h3>電源</h3>
    <?php
      $firstRadioOs = true;
      generateRadioOptions($optionsData['powerOptions'], $_SESSION['selected_options'], 'power');
    ?>
  </section>
  <section class="memory">
    <h3>メモリ</h3>
    <?php
      $firstRadioOs = true;
      generateRadioOptions($optionsData['memoryOptions'], $_SESSION['selected_options'], 'memory');
    ?>
  </section>
  <section class="ssd">
    <h3>SSD</h3>
    <?php
      $firstRadioOs = true;
      generateRadioOptions($optionsData['ssdOptions'], $_SESSION['selected_options'], 'ssd');
    ?>
  </section>
  <section class="harddisk">
    <h3>ハードディスク</h3>
    <?php
      $firstRadioOs = true;
      generateRadioOptions($optionsData['harddiskOptions'], $_SESSION['selected_options'], 'harddisk');
    ?>
  </section>
  <section class="addhard">
    <h3>追加ストレージ</h3>
    <?php
      $firstRadioOs = true;
      generateRadioOptions($optionsData['addhardOptions'], $_SESSION['selected_options'], 'addhard');
    ?>
  </section>
  <section class="drive">
    <h3>光学ドライブ</h3>
    <?php
      $firstRadioOs = true;
      generateRadioOptions($optionsData['driveOptions'], $_SESSION['selected_options'], 'drive');
    ?>
  </section>
  <section class="sound">
    <h3>サウンド</h3>
    <?php
      $firstRadioOs = true;
      generateRadioOptions($optionsData['soundOptions'], $_SESSION['selected_options'], 'sound');
    ?>
  </section>
  <section class="case">
    <h3>ケース</h3>
    <?php
      $firstRadioOs = true;
      generateRadioOptions($optionsData['caseOptions'], $_SESSION['selected_options'], 'case');
    ?>
  </section>
  <section class="rear">
    <h3>リアケースファン</h3>
    <?php
      $firstRadioOs = true;
      generateRadioOptions($optionsData['rearOptions'], $_SESSION['selected_options'], 'rear');
    ?>
  </section>
  <section class="topfront">
    <h3>トップケースファン前部</h3>
    <?php
      $firstRadioOs = true;
      generateRadioOptions($optionsData['topfrontOptions'], $_SESSION['selected_options'], 'topfront');
    ?>
  </section>
  <section class="toprear">
    <h3>トップケースファン後部</h3>
    <?php
      $firstRadioOs = true;
      generateRadioOptions($optionsData['toprearOptions'], $_SESSION['selected_options'], 'toprear');
    ?>
  </section>
  <section class="lan">
    <h3>LAN</h3>
    <?php
      $firstRadioOs = true;
      generateRadioOptions($optionsData['lanOptions'], $_SESSION['selected_options'], 'lan');
    ?>
  </section>
  <section class="wireless">
    <h3>無線LAN</h3>
    <?php
      $firstRadioOs = true;
      generateRadioOptions($optionsData['wirelessOptions'], $_SESSION['selected_options'], 'wireless');
    ?>
  </section>

  <button class="order-btn" type="submit">注文確認</button>

</div> 
</form>
</body>
</html>
  
