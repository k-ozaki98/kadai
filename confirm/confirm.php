<?php
session_start(); // セッションを開始

// 選択内容をセッションから取得
if (isset($_SESSION['selected_options'])) {
    $selectedOptions = $_SESSION['selected_options'];
} else {
    // セッションにデータがない場合の処理
    // 何も選択されていない場合のデフォルト値を設定するなど
}

// 以下、選択内容を表示するコード
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
  <div class="l-inner">
    <h2 class="sec-ttl">注文確認</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // フォームからのデータを処理し、選択した項目とタイトルを表示
      $data = file_get_contents('../data.json');
      $optionsData = json_decode($data, true);

      $_SESSION['selected_options'] = $_POST;

      foreach ($_POST as $key => $value) {
        if (isset($optionsData[$key . 'Options'])) {
          $optionData = $optionsData[$key . 'Options'];
          $sectionTitle = $optionsData['optionNames'][$key]; // セクションのタイトルを取得

          echo "<h3>{$sectionTitle}</h3>";
          foreach ($optionData as $option) {
            if ($option['id'] === $value) {
              echo "<p class='confirm-name'>{$option['name']} ({$option['price']}円)</p>";
            }
          }
          echo "</ul>";
        }
      }
    }
    ?>
    <div class="confirm-total">
      <h3>合計金額:</h3>
      <p>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // 合計金額を計算して表示
          $totalPrice = 0;
          $data = file_get_contents('../data.json');
          $optionsData = json_decode($data, true);
  
          foreach ($_POST as $key => $value) {
            if (isset($optionsData[$key . 'Options'])) {
              $optionData = $optionsData[$key . 'Options'];
              foreach ($optionData as $option) {
                if ($option['id'] === $value) {
                  $totalPrice += $option['price'];
                }
              }
            }
          }
  
          $formattedTotalPrice = number_format($totalPrice);
          echo $formattedTotalPrice . "円";
        }
        ?>
      </p>

    </div>

    <div class="btn-wrap">
      <div class="prev-btn">
        <a href="/">戻る</a>
      </div>
      <div class="complete-btn">
        <a href="/">発注する</a>
      </div>
    </div>
  </div>
</body>
</html>