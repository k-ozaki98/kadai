<?php
session_start();

$data = file_get_contents('../data.json');
$optionsData = json_decode($data, true);

// 選択内容を取得
if (isset($_SESSION['selected_options'])) {
    $selectedOptions = $_SESSION['selected_options'];
} else {
    echo "セッションに選択内容がありません。";
    exit;
}

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$tel = $_POST['tel'];

$csvFileName = "../order.csv";

$file = fopen($csvFileName, 'a');

if($file) {
  // ファイル空の場合のみ見出し生成
  if (filesize($csvFileName) == 0) {
      fputcsv($file, array("", "氏名", "メールアドレス", "電話番号", "選択オプション"));
  }

  // 遁択オプションの詳細情報を格納する変数
  $selectedOptionDetails = array();

  // CSVファイルに選択オプションと価格を書き込む
  foreach ($selectedOptions as $key => $value) {
      if (isset($optionsData[$key . 'Options'])) {
          $optionData = $optionsData[$key . 'Options'];
          foreach ($optionData as $option) {
              if ($option['id'] === $value) {
                  // オプション名、価格格納
                  $selectedOptionDetails[] = $option['name'] . " ({$option['price']}円)";
              }
          }
      }
  }
  // カンマで区切る
  $selectedOptionsSeparator = implode(", ", $selectedOptionDetails);
    
    fputcsv($file, array("",$fullname, $email, "\"$tel\"", $selectedOptionsSeparator));
    
    fclose($file);
    
    echo "CSV ファイルに書き込まれました。";

  } else {
    echo "CSV ファイルを開けませんでした";
  }

?>
