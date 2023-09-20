<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    // 選択内容保存
    $_SESSION['selected_options'] = $_POST;
    header("Location: /confirm/confirm.php"); 
    exit();
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
  <form action="/confirm/confirm.php" method="POST">
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
    
  ?>

  <section class="os">
    <h3>OS</h3>
    <?php
      if (isset($optionsData['osOptions'])) {
        $osOptions = $optionsData['osOptions'];
        $firstRadio = true;
    
        foreach((array)$osOptions as $osOption) {
          echo "<div class='{$osOption['id']}'>";
          echo "<input type='radio' id='{$osOption['id']}' name='os' value='{$osOption['id']}' data-price='{$osOption['price']}' required";
    
          // セッションに保存された選択がある場合、それと比較してチェックを入れる
            if (isset($_SESSION['selected_options']['os']) && $_SESSION['selected_options']['os'] == $osOption['id']) {
                echo " checked";
            }
    
          echo ">";
          echo "<label for='{$osOption['id']}'>";
          echo "{$osOption['name']} <span class='plusprice'>+ {$osOption['price']}円</span>";
          echo "</label>";
          echo "</div>";
        }
      }
    ?>
  </section>
  <section class="office">
    <h3>オフィスソフト</h3>
    <?php
      if (isset($optionsData['officeOptions'])) {
        $officeOptions = $optionsData['officeOptions'];
        $firstRadio = true;
    
        foreach((array)$officeOptions as $officeOption) {
          echo "<div class='{$officeOption['id']}'>";
          echo "<input type='radio' id='{$officeOption['id']}' name='office' value='{$officeOption['id']}' data-price='{$officeOption['price']}' required";
    
          // セッションに保存された選択がある場合、それと比較してチェックを入れる
            if (isset($_SESSION['selected_options']['office']) && $_SESSION['selected_options']['office'] == $officeOption['id']) {
                echo " checked";
            }
    
          echo ">";
          echo "<label for='{$officeOption['id']}'>";
          echo "{$officeOption['name']} <span class='plusprice'>+ {$officeOption['price']}円</span>";
          echo "</label>";
          echo "</div>";
        }
      }
    ?>
  </section>
  <section class="security">
    <h3>セキュリティソフト</h3>
    <?php
      if (isset($optionsData['securityOptions'])) {
        $securityOptions = $optionsData['securityOptions'];
        $firstRadio = true;
    
        foreach((array)$securityOptions as $securityOption) {
          echo "<div class='{$securityOption['id']}'>";
          echo "<input type='radio' id='{$securityOption['id']}' name='security' value='{$securityOption['id']}' data-price='{$securityOption['price']}' required";
    
          // セッションに保存された選択がある場合、それと比較してチェックを入れる
            if (isset($_SESSION['selected_options']['security']) && $_SESSION['selected_options']['security'] == $securityOption['id']) {
                echo " checked";
            }
    
          echo ">";
          echo "<label for='{$securityOption['id']}'>";
          echo "{$securityOption['name']} <span class='plusprice'>+ {$securityOption['price']}円</span>";
          echo "</label>";
          echo "</div>";
        }
      }
    ?>
  </section>
  <section class="cpu">
    <h3>CPU</h3>
    <?php
      if (isset($optionsData['cpuOptions'])) {
        $cpuOptions = $optionsData['cpuOptions'];
        $firstRadio = true;
    
        foreach((array)$cpuOptions as $cpuOption) {
          echo "<div class='{$cpuOption['id']}'>";
          echo "<input type='radio' id='{$cpuOption['id']}' name='cpu' value='{$cpuOption['id']}' data-price='{$cpuOption['price']}' required";
    
          // セッションに保存された選択がある場合、それと比較してチェックを入れる
            if (isset($_SESSION['selected_options']['cpu']) && $_SESSION['selected_options']['cpu'] == $cpuOption['id']) {
                echo " checked";
            }
    
          echo ">";
          echo "<label for='{$cpuOption['id']}'>";
          echo "{$cpuOption['name']} <span class='plusprice'>+ {$cpuOption['price']}円</span>";
          echo "</label>";
          echo "</div>";
        }
      }
    ?>
  </section>
  <section class="fan">
    <h3>CPUファン</h3>
    <?php
      if (isset($optionsData['fanOptions'])) {
        $fanOptions = $optionsData['fanOptions'];
        $firstRadio = true;
    
        foreach((array)$fanOptions as $fanOption) {
          echo "<div class='{$fanOption['id']}'>";
          echo "<input type='radio' id='{$fanOption['id']}' name='fan' value='{$fanOption['id']}' data-price='{$fanOption['price']}' required";
    
          // セッションに保存された選択がある場合、それと比較してチェックを入れる
            if (isset($_SESSION['selected_options']['fan']) && $_SESSION['selected_options']['fan'] == $fanOption['id']) {
                echo " checked";
            }
    
          echo ">";
          echo "<label for='{$fanOption['id']}'>";
          echo "{$fanOption['name']} <span class='plusprice'>+ {$fanOption['price']}円</span>";
          echo "</label>";
          echo "</div>";
        }
      }
    ?>
  </section>
  <section class="grease">
    <h3>CPUグリス</h3>
    <?php
      if (isset($optionsData['greaseOptions'])) {
        $greaseOptions = $optionsData['greaseOptions'];
        $firstRadio = true;
    
        foreach((array)$greaseOptions as $greaseOption) {
          echo "<div class='{$greaseOption['id']}'>";
          echo "<input type='radio' id='{$greaseOption['id']}' name='grease' value='{$greaseOption['id']}' data-price='{$greaseOption['price']}' required";
    
          // セッションに保存された選択がある場合、それと比較してチェックを入れる
            if (isset($_SESSION['selected_options']['grease']) && $_SESSION['selected_options']['grease'] == $greaseOption['id']) {
                echo " checked";
            }
    
          echo ">";
          echo "<label for='{$greaseOption['id']}'>";
          echo "{$greaseOption['name']} <span class='plusprice'>+ {$greaseOption['price']}円</span>";
          echo "</label>";
          echo "</div>";
        }
      }
    ?>
  </section>
  <section class="graphic">
    <h3>グラフィック機能</h3>
    <?php
      if (isset($optionsData['graphicOptions'])) {
        $graphicOptions = $optionsData['graphicOptions'];
        $firstRadio = true;
    
        foreach((array)$graphicOptions as $graphicOption) {
          echo "<div class='{$graphicOption['id']}'>";
          echo "<input type='radio' id='{$graphicOption['id']}' name='graphic' value='{$graphicOption['id']}' data-price='{$graphicOption['price']}' required";
    
          // セッションに保存された選択がある場合、それと比較してチェックを入れる
            if (isset($_SESSION['selected_options']['graphic']) && $_SESSION['selected_options']['graphic'] == $graphicOption['id']) {
                echo " checked";
            }
    
          echo ">";
          echo "<label for='{$graphicOption['id']}'>";
          echo "{$graphicOption['name']} <span class='plusprice'>+ {$graphicOption['price']}円</span>";
          echo "</label>";
          echo "</div>";
        }
      }
    ?>
  </section>
  <section class="power">
    <h3>電源</h3>
    <?php
      if (isset($optionsData['powerOptions'])) {
        $powerOptions = $optionsData['powerOptions'];
        $firstRadio = true;
    
        foreach((array)$powerOptions as $powerOption) {
          echo "<div class='{$powerOption['id']}'>";
          echo "<input type='radio' id='{$powerOption['id']}' name='power' value='{$powerOption['id']}' data-price='{$powerOption['price']}' required";
    
          // セッションに保存された選択がある場合、それと比較してチェックを入れる
            if (isset($_SESSION['selected_options']['power']) && $_SESSION['selected_options']['power'] == $powerOption['id']) {
                echo " checked";
            }
    
          echo ">";
          echo "<label for='{$powerOption['id']}'>";
          echo "{$powerOption['name']} <span class='plusprice'>+ {$powerOption['price']}円</span>";
          echo "</label>";
          echo "</div>";
        }
      }
    ?>
  </section>
  <section class="memory">
    <h3>メモリ</h3>
    <?php
      if (isset($optionsData['memoryOptions'])) {
        $memoryOptions = $optionsData['memoryOptions'];
        $firstRadio = true;
    
        foreach((array)$memoryOptions as $memoryOption) {
          echo "<div class='{$memoryOption['id']}'>";
          echo "<input type='radio' id='{$memoryOption['id']}' name='memory' value='{$memoryOption['id']}' data-price='{$memoryOption['price']}' required";
    
          // セッションに保存された選択がある場合、それと比較してチェックを入れる
            if (isset($_SESSION['selected_options']['memory']) && $_SESSION['selected_options']['memory'] == $memoryOption['id']) {
                echo " checked";
            }
    
          echo ">";
          echo "<label for='{$memoryOption['id']}'>";
          echo "{$memoryOption['name']} <span class='plusprice'>+ {$memoryOption['price']}円</span>";
          echo "</label>";
          echo "</div>";
        }
      }
    ?>
  </section>
  <section class="ssd">
    <h3>SSD</h3>
    <?php
      if (isset($optionsData['ssdOptions'])) {
        $ssdOptions = $optionsData['ssdOptions'];
        $firstRadio = true;
    
        foreach((array)$ssdOptions as $ssdOption) {
          echo "<div class='{$ssdOption['id']}'>";
          echo "<input type='radio' id='{$ssdOption['id']}' name='ssd' value='{$ssdOption['id']}' data-price='{$ssdOption['price']}' required";
    
          // セッションに保存された選択がある場合、それと比較してチェックを入れる
            if (isset($_SESSION['selected_options']['ssd']) && $_SESSION['selected_options']['ssd'] == $ssdOption['id']) {
                echo " checked";
            }
    
          echo ">";
          echo "<label for='{$ssdOption['id']}'>";
          echo "{$ssdOption['name']} <span class='plusprice'>+ {$ssdOption['price']}円</span>";
          echo "</label>";
          echo "</div>";
        }
      }
    ?>
  </section>
  <section class="harddisk">
    <h3>ハードディスク</h3>
    <?php
      if (isset($optionsData['harddiskOptions'])) {
        $harddiskOptions = $optionsData['harddiskOptions'];
        $firstRadio = true;
    
        foreach((array)$harddiskOptions as $harddiskOption) {
          echo "<div class='{$harddiskOption['id']}'>";
          echo "<input type='radio' id='{$harddiskOption['id']}' name='harddisk' value='{$harddiskOption['id']}' data-price='{$harddiskOption['price']}' required";
    
          // セッションに保存された選択がある場合、それと比較してチェックを入れる
            if (isset($_SESSION['selected_options']['harddisk']) && $_SESSION['selected_options']['harddisk'] == $harddiskOption['id']) {
                echo " checked";
            }
    
          echo ">";
          echo "<label for='{$harddiskOption['id']}'>";
          echo "{$harddiskOption['name']} <span class='plusprice'>+ {$harddiskOption['price']}円</span>";
          echo "</label>";
          echo "</div>";
        }
      }
    ?>
  </section>
  <section class="addhard">
    <h3>追加ストレージ</h3>
    <?php
      if (isset($optionsData['addhardOptions'])) {
        $addhardOptions = $optionsData['addhardOptions'];
        $firstRadio = true;
    
        foreach((array)$addhardOptions as $addhardOption) {
          echo "<div class='{$addhardOption['id']}'>";
          echo "<input type='radio' id='{$addhardOption['id']}' name='addhard' value='{$addhardOption['id']}' data-price='{$addhardOption['price']}' required";
    
          // セッションに保存された選択がある場合、それと比較してチェックを入れる
            if (isset($_SESSION['selected_options']['addhard']) && $_SESSION['selected_options']['addhard'] == $addhardOption['id']) {
                echo " checked";
            }
    
          echo ">";
          echo "<label for='{$addhardOption['id']}'>";
          echo "{$addhardOption['name']} <span class='plusprice'>+ {$addhardOption['price']}円</span>";
          echo "</label>";
          echo "</div>";
        }
      }
    ?>
  </section>
  <section class="drive">
    <h3>光学ドライブ</h3>
    <?php
      if (isset($optionsData['driveOptions'])) {
        $driveOptions = $optionsData['driveOptions'];
        $firstRadio = true;
    
        foreach((array)$driveOptions as $driveOption) {
          echo "<div class='{$driveOption['id']}'>";
          echo "<input type='radio' id='{$driveOption['id']}' name='drive' value='{$driveOption['id']}' data-price='{$driveOption['price']}' required";
    
          // セッションに保存された選択がある場合、それと比較してチェックを入れる
            if (isset($_SESSION['selected_options']['drive']) && $_SESSION['selected_options']['drive'] == $driveOption['id']) {
                echo " checked";
            }
    
          echo ">";
          echo "<label for='{$driveOption['id']}'>";
          echo "{$driveOption['name']} <span class='plusprice'>+ {$driveOption['price']}円</span>";
          echo "</label>";
          echo "</div>";
        }
      }
    ?>
  </section>
  <section class="sound">
    <h3>サウンド</h3>
    <?php
      if (isset($optionsData['soundOptions'])) {
        $soundOptions = $optionsData['soundOptions'];
        $firstRadio = true;
    
        foreach((array)$soundOptions as $soundOption) {
          echo "<div class='{$soundOption['id']}'>";
          echo "<input type='radio' id='{$soundOption['id']}' name='sound' value='{$soundOption['id']}' data-price='{$soundOption['price']}' required";
    
          // セッションに保存された選択がある場合、それと比較してチェックを入れる
            if (isset($_SESSION['selected_options']['sound']) && $_SESSION['selected_options']['sound'] == $soundOption['id']) {
                echo " checked";
            }
    
          echo ">";
          echo "<label for='{$soundOption['id']}'>";
          echo "{$soundOption['name']} <span class='plusprice'>+ {$soundOption['price']}円</span>";
          echo "</label>";
          echo "</div>";
        }
      }
    ?>
  </section>
  <section class="case">
    <h3>ケース</h3>
    <?php
      if (isset($optionsData['caseOptions'])) {
        $caseOptions = $optionsData['caseOptions'];
        $firstRadio = true;
    
        foreach((array)$caseOptions as $caseOption) {
          echo "<div class='{$caseOption['id']}'>";
          echo "<input type='radio' id='{$caseOption['id']}' name='case' value='{$caseOption['id']}' data-price='{$caseOption['price']}' required";
    
          // セッションに保存された選択がある場合、それと比較してチェックを入れる
            if (isset($_SESSION['selected_options']['case']) && $_SESSION['selected_options']['case'] == $caseOption['id']) {
                echo " checked";
            }
    
          echo ">";
          echo "<label for='{$caseOption['id']}'>";
          echo "{$caseOption['name']} <span class='plusprice'>+ {$caseOption['price']}円</span>";
          echo "</label>";
          echo "</div>";
        }
      }
    ?>
  </section>
  <section class="rear">
    <h3>リアケースファン</h3>
    <?php
      if (isset($optionsData['rearOptions'])) {
        $rearOptions = $optionsData['rearOptions'];
        $firstRadio = true;
    
        foreach((array)$rearOptions as $rearOption) {
          echo "<div class='{$rearOption['id']}'>";
          echo "<input type='radio' id='{$rearOption['id']}' name='rear' value='{$rearOption['id']}' data-price='{$rearOption['price']}' required";
    
          // セッションに保存された選択がある場合、それと比較してチェックを入れる
            if (isset($_SESSION['selected_options']['rear']) && $_SESSION['selected_options']['rear'] == $rearOption['id']) {
                echo " checked";
            }
    
          echo ">";
          echo "<label for='{$rearOption['id']}'>";
          echo "{$rearOption['name']} <span class='plusprice'>+ {$rearOption['price']}円</span>";
          echo "</label>";
          echo "</div>";
        }
      }
    ?>
  </section>
  <section class="topfront">
    <h3>トップケースファン前部</h3>
    <?php
      if (isset($optionsData['topfrontOptions'])) {
        $topfrontOptions = $optionsData['topfrontOptions'];
        $firstRadio = true;
    
        foreach((array)$topfrontOptions as $topfrontOption) {
          echo "<div class='{$topfrontOption['id']}'>";
          echo "<input type='radio' id='{$topfrontOption['id']}' name='topfront' value='{$topfrontOption['id']}' data-price='{$topfrontOption['price']}' required";
    
          // セッションに保存された選択がある場合、それと比較してチェックを入れる
            if (isset($_SESSION['selected_options']['topfront']) && $_SESSION['selected_options']['topfront'] == $topfrontOption['id']) {
                echo " checked";
            }
    
          echo ">";
          echo "<label for='{$topfrontOption['id']}'>";
          echo "{$topfrontOption['name']} <span class='plusprice'>+ {$topfrontOption['price']}円</span>";
          echo "</label>";
          echo "</div>";
        }
      }
    ?>
  </section>
  <section class="toprear">
    <h3>トップケースファン後部</h3>
    <?php
      if (isset($optionsData['toprearOptions'])) {
        $toprearOptions = $optionsData['toprearOptions'];
        $firstRadio = true;
    
        foreach((array)$toprearOptions as $toprearOption) {
          echo "<div class='{$toprearOption['id']}'>";
          echo "<input type='radio' id='{$toprearOption['id']}' name='toprear' value='{$toprearOption['id']}' data-price='{$toprearOption['price']}' required";
    
          // セッションに保存された選択がある場合、それと比較してチェックを入れる
            if (isset($_SESSION['selected_options']['toprear']) && $_SESSION['selected_options']['toprear'] == $toprearOption['id']) {
                echo " checked";
            }
    
          echo ">";
          echo "<label for='{$toprearOption['id']}'>";
          echo "{$toprearOption['name']} <span class='plusprice'>+ {$toprearOption['price']}円</span>";
          echo "</label>";
          echo "</div>";
        }
      }
    ?>
  </section>
  <section class="lan">
    <h3>LAN</h3>
    <?php
      if (isset($optionsData['lanOptions'])) {
        $lanOptions = $optionsData['lanOptions'];
        $firstRadio = true;
    
        foreach((array)$lanOptions as $lanOption) {
          echo "<div class='{$lanOption['id']}'>";
          echo "<input type='radio' id='{$lanOption['id']}' name='lan' value='{$lanOption['id']}' data-price='{$lanOption['price']}' required";
    
          // セッションに保存された選択がある場合、それと比較してチェックを入れる
            if (isset($_SESSION['selected_options']['lan']) && $_SESSION['selected_options']['lan'] == $lanOption['id']) {
                echo " checked";
            }
    
          echo ">";
          echo "<label for='{$lanOption['id']}'>";
          echo "{$lanOption['name']} <span class='plusprice'>+ {$lanOption['price']}円</span>";
          echo "</label>";
          echo "</div>";
        }
      }
    ?>
  </section>
  <section class="wireless">
    <h3>無線LAN</h3>
    <?php
      if (isset($optionsData['wirelessOptions'])) {
        $wirelessOptions = $optionsData['wirelessOptions'];
        $firstRadio = true;
    
        foreach((array)$wirelessOptions as $wirelessOption) {
          echo "<div class='{$wirelessOption['id']}'>";
          echo "<input type='radio' id='{$wirelessOption['id']}' name='wireless' value='{$wirelessOption['id']}' data-price='{$wirelessOption['price']}' required";
    
          // セッションに保存された選択がある場合、それと比較してチェックを入れる
            if (isset($_SESSION['selected_options']['wireless']) && $_SESSION['selected_options']['wireless'] == $wirelessOption['id']) {
                echo " checked";
            }
    
          echo ">";
          echo "<label for='{$wirelessOption['id']}'>";
          echo "{$wirelessOption['name']} <span class='plusprice'>+ {$wirelessOption['price']}円</span>";
          echo "</label>";
          echo "</div>";
        }
      }
    ?>
  </section>

  <button class="order-btn" type="submit">注文確認</button>

</div> 
</form>
</body>
</html>
  
