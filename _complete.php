<?php
if($_SERVER["REQUEST_METHOD"] != "POST") {
  header("Location: index.php");
  exit();
}

mb_language("Japanese");
mb_internal_encoding("UTF-8");

$to = $_POST['email'];
// メール件名
$subject = 'お問合せありがとうございます。。';
// メッセージ本文を視覚的に見やすく格納
$message = <<< EOM
お問合せありがとうございます。

以下の内容で
-----------------------------------------------
【お名前】
{$_POST["name"]}

【メール】
{$_POST["email"]}

【選別】
{$_POST["sex"]}

【お住まいの地域】
{$_POST["pref"]}

【お問合せ理由】
{$_POST["reason"]}

【お問合せ内容】
{$_POST["contact_body"]}

------------------------------------------------

EOM;
// 送信元
$headers = "From: support@example.com";
// メール送信
mb_send_mail($to, $subject, $message, $headers);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style type="text/css">
	body {
		background-color: #f9fff2;
	}
</style>
</head>
<body>
  <h2>お問い合わせ完了</h2>
 	<p>お問い合わせありがとうございました。</p>
 	<p>今後とも当サイトをよろしくお願いいたします。</p>
 	<p><a href="index.php">お問い合わせトップへ</p>
</body>
</html>