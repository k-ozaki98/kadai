<?php
if($_SEVER["REQUEST_METHOD"] != "POST") {
  header("Location: index.php");
  exit();
}

$os = $_POST['os'];
$office = $_POST['office'];
$security = $_POST['security'];
$cpu = $_POST['cpu'];
$fan = $_POST['fan'];
$grease = $_POST['grease'];
$graphic = $_POST['graphic'];
$power = $_POST['power'];
$memory = $_POST['memory'];
$ssd = $_POST['ssd'];
$harddisk = $_POST['harddisk'];
$addhard = $_POST['addhard'];
$drive = $_POST['drive'];
$sound = $_POST['sound'];
$case = $_POST['case'];
$rear = $_POST['rear'];
$topfront = $_POST['topfront'];
$toprear = $_POST['toprear'];
$lan = $_POST['lan'];
$wireless = $_POST['wireless'];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>確認フォーム</title>
</head>
<body>
  <form action="_complete.php">
    <div class="confirm__contents">
      <h2>お問い合わせ内容確認</h2>
      <dl>
        <dt>os</dt>
        <dd><?php echo $os;?></dd>
      </dl>
      <dl>
        <dt>os</dt>
        <dd><?php echo $office;?></dd>
      </dl>
      <dl>
        <dt>os</dt>
        <dd><?php echo $security;?></dd>
      </dl>
      <dl>
        <dt>os</dt>
        <dd><?php echo $cpu;?></dd>
      </dl>
      <dl>
        <dt>os</dt>
        <dd><?php echo $fan;?></dd>
      </dl>
      <dl>
        <dt>os</dt>
        <dd><?php echo $grease;?></dd>
      </dl>
      <dl>
        <dt>os</dt>
        <dd><?php echo $graphic;?></dd>
      </dl>
      <dl>
        <dt>os</dt>
        <dd><?php echo $power;?></dd>
      </dl>
      <dl>
        <dt>os</dt>
        <dd><?php echo $memory;?></dd>
      </dl>
      <dl>
        <dt>os</dt>
        <dd><?php echo $ssd;?></dd>
      </dl>
      <dl>
        <dt>os</dt>
        <dd><?php echo $harddisk;?></dd>
      </dl>
      <dl>
        <dt>os</dt>
        <dd><?php echo $addhard;?></dd>
      </dl>
      <dl>
        <dt>os</dt>
        <dd><?php echo $drive;?></dd>
      </dl>
      <dl>
        <dt>os</dt>
        <dd><?php echo $sound;?></dd>
      </dl>
      <dl>
        <dt>os</dt>
        <dd><?php echo $case;?></dd>
      </dl>
      <dl>
        <dt>os</dt>
        <dd><?php echo $rear;?></dd>
      </dl>
      <dl>
        <dt>os</dt>
        <dd><?php echo $topfront;?></dd>
      </dl>
      <dl>
        <dt>os</dt>
        <dd><?php echo $toprear;?></dd>
      </dl>
      <dl>
        <dt>os</dt>
        <dd><?php echo $lan;?></dd>
      </dl>
      <dl>
        <dt>os</dt>
        <dd><?php echo $wireless;?></dd>
      </dl>
    </div>

    <div class="input-area">
      <input type="button" onclick="history.back()" value='戻る' class="btn-border">
      <input type="submit" name='submit' value='送信' class="btn-border">
      <input type="hidden" name='name' value='<?php echo $os;?>'>
      <input type="hidden" name='email' value='<?php echo $email;?>'>
      <input type="hidden" name="sex" value='<?php echo $sex;?>'>
      <input type="hidden" name="pref" value='<?php echo $pref;?>'>
      <input type="hidden" name="reason" value='<?php echo $reason;?>'>
      <input type="hidden" name="contact_body" value="<?php echo $contact_body;?>">
    </div>

  </form>
</body>
</html>