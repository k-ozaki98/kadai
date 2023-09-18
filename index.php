<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 選択内容保存
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

    foreach ($optionsData['optionNames'] as $optionName => $sectionTitle) {
      generateOptions($optionsData[$optionName . 'Options'], $optionName, $sectionTitle);
    }

    // HTMLを生成
    function generateOptions($optionData, $optionName, $sectionTitle) {
      echo "<section class='$optionName'>";
      echo "<h3>$sectionTitle</h3>";
  
      $firstRadio = true;
  
      foreach ($optionData as $option) {
          echo "<div class='{$optionName}__{$option['id']}'>";
          echo "<input type='radio' id='{$option['id']}' name='$optionName' value='{$option['id']}' data-price='{$option['price']}' required";
  
          if (isset($_SESSION['selected_options'][$optionName]) && $_SESSION['selected_options'][$optionName] === $option['id']) {
              echo " checked";
              $firstRadio = false;
          } elseif ($firstRadio) {
              echo " checked";
              $firstRadio = false;
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
 

    <button class="order-btn">注文確認</button>

  </div> 
</form>
</body>
</html>