<?php
session_start(); 

$data = file_get_contents('../data.json');
$optionsData = json_decode($data, true);
// 選択内容保存
$_SESSION['selected_options'] = $_POST;

// 選択内容を取得
if (isset($_SESSION['selected_options'])) {
    $selectedOptions = $_SESSION['selected_options'];
} 

require_once('../lib/function.php');

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
      $selectedOptions = $_POST;
      confirmOptions($selectedOptions, $optionsData);

    }
    ?>
    <div class="confirm-total">
      <h3>合計金額:</h3>
      <p>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // 合計金額の計算
          $totalPrice = 0;
  
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