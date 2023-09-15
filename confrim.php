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
  
</body>
</html>