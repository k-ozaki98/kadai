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

        <section class="product is-show">
          <h2 class="product__ttl">本体構成</h2>
          <div class="product__wrap">
            <section class="os">
              <h3>OS</h3>
            </section>
            <section class="office">
              <h3>オフィスソフト</h3>
            </section>
            <section class="security">
              <h3>セキュリティソフト</h3>
            </section>
            <section class="cpu">
              <h3>CPU</h3>
            </section>
            <section class="fan">
              <h3>CPUファン</h3>
            </section>
            <section class="grease">
              <h3>CPUグリス</h3>
            </section>
            <section class="graphic">
              <h3>グラフィック機能</h3>
            </section>
            <section class="power">
              <h3>電源</h3>
            </section>
            <section class="memory">
              <h3>メモリ</h3>
            </section>
            <section class="ssd">
              <h3>SSD</h3>
            </section>
            <section class="harddisk">
              <h3>ハードディスク/SSD</h3>
            </section>
            <section class="addhard">
              <h3>ハードディスク/SSD</h3>
            </section>
            <section class="drive">
              <h3>光学ドライブ</h3>
            </section>
            <section class="sound">
              <h3>サウンド</h3>
            </section>
            <section class="case">
              <h3>ケース</h3>
            </section>
            <section class="rear">
              <h3>リアケースファン</h3>
            </section>
            <section class="topfront">
              <h3>トップケースファン前部</h3>
            </section>
            <section class="toprear">
              <h3>トップケースファン後部</h3>
            </section>
            <section class="lan">
              <h3>LAN</h3>
            </section>
            <section class="wireless">
              <h3>無線LAN</h3>
            </section>
          </div>
          <div id="total-price" class="total">
            <div class="confirm-btn">
              <p href="">確認</p>
            </div>
            <p>商品合計:<span></span></p>
            <button class="order-btn" type="submit">注文確認</button>

          </div>
        </section>

        <section class="product">
          周辺機器
        </section>
        <section class="product">
          サービス
        </section>
        <section class="product">
          内容確認
        </section>

        <section class="confirm">
          <div class="confirm__layer">
            <div class="confirm__contents">
              <h3 class="confirm__ttl">カスタマイズ内容の確認</h3>
            </div>
          </div>
        </section>

        <div class="modal" id="myModal">
          <div class="confirm__contents">
            <span class="close" id="closeModal">&times;</span>
            <!-- ダイアログのコンテンツをここに追加 -->
          </div>
        </div>
        <div class="overlay" id="overlay"></div>


    </div> 
  </form>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="/js/ajax.js"></script>
</body>
</html>
  
