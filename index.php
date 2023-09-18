<?php
session_start(); // セッションを開始

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 選択内容をセッションに保存
    $_SESSION['selected_options'] = $_POST;
}
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
  <form action="/confirm/confirm.php/" method="POST">
  <div class="l-inner">
  <ul class="product__list">
      <li class="product__item is-active">本体構成</li>
      <li class="product__item">周辺機器</li>
      <li class="product__item">サービス</li>
      <li class="product__item">内容確認</li>
    </ul>

  <?php

    // JSONデータを読み込む
    $data = file_get_contents('data.json');

    if ($data === false) {
        // ファイル読み込みエラーの処理
        die('JSONデータの読み込みに失敗しました。');
    }

    // JSONデータを配列に変換
    $optionsData = json_decode($data, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        // JSONデータの解析エラーの処理
        die('JSONデータの解析に失敗しました。');
    }

    foreach ($optionsData['optionNames'] as $optionName => $sectionTitle) {
      generateOptions($optionsData[$optionName . 'Options'], $optionName, $optionName, $sectionTitle);
    }

   // HTMLを生成
  function generateOptions($optionData, $sectionClassName, $inputName, $sectionTitle) {
    echo "<section class='$sectionClassName'>";
    echo "<h3>$sectionTitle</h3>"; // セクションのタイトルを表示

    // 最初のラジオボタンにチェックを入れるためのフラグ
    $firstRadio = true;

    foreach ($optionData as $option) {
      echo "<div class='{$sectionClassName}__{$option['id']}'>";
      echo "<input type='radio' id='{$option['id']}' name='$inputName' value='{$option['id']}' data-price='{$option['price']}'";
  
      // セッションから選択内容を取得し、選択されている場合はチェックを入れる
      if (isset($_SESSION['selected_options'][$inputName]) && $_SESSION['selected_options'][$inputName] === $option['id']) {
          echo " checked";
      }
  
      echo ">";
      echo "<label for='{$option['id']}'>";
      echo "{$option['name']} <span class='plusprice'>+ {$option['price']}円</span>";
      echo "</label>";
      echo "</div>";
  }
    echo "</section>";
  }

  ?>
 


    <!-- 注文確認ボタン -->
    <button class="order-btn">注文確認</button>

    <!-- 確認画面表示用の要素 -->
    <div class="confirm" style="display: none;">
        <div class="confirm__layer">
            <div class="confirm__contents">
                <!-- 確認内容はここに表示 -->
            </div>
        </div>
    </div>

  </div> 
</form>
</body>
</html>