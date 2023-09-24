<?php
session_start(); 

$data = file_get_contents('../data.json');
$optionsData = json_decode($data, true);
// 選択内容保存

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
    <form action="../order/order.php" method="POST">

    
        <h2 class="sec-ttl">基本情報</h2>
        <div class="basic-info">
          <label for="fullname">氏名</label>
          <input type="text" id="fullname" name="fullname" required>
        </div>
        <div class="basic-info">
          <label for="email">メールアドレス</label>
          <input type="text" id="email" name="email" required>
        </div>
        <div class="basic-info">
          <label for="tel">TEL</label>
          <input type="tel" id="tel" name="tel" required>
        </div>
        <h2 class="sec-ttl">注文確認</h2>

        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          confirmOptions($selectedOptions, $optionsData);

        }
        ?>
        <div class="confirm-total">
          <h3>合計金額:</h3>
          <p>
            <?php
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $selectedOptions = $_POST;
                $totalPrice = calculateTotalPrice($selectedOptions, $optionsData);
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
            <input type="submit" value="発注する">
          </div>
        </div>
    </form>
  </div>
</body>
</html>