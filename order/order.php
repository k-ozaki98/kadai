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

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$tel = $_POST['tel'];

$csvFileName = "../order.csv";

$file = fopen($csvFileName, 'a');

if ($file) {
    // 見出し
    fputcsv($file, array("","氏名", "メールアドレス", "電話番号", "選択オプション"));
    
    // 基本情報
    fputcsv($file, array("", $fullname, $email, $tel));

    // オプション名と価格
    fputcsv($file, array("オプション名", "価格"));

    // CSVファイルに選択オプションを書き込む
    foreach ($selectedOptions as $key => $value) {
      if (isset($optionsData[$key . 'Options'])) {
          $optionData = $optionsData[$key . 'Options'];
          foreach ($optionData as $option) {
              if ($option['id'] === $value) {
                  $optionName = $option['name'];
                  
                  // オプション名をCSVファイルに書き込む
                  fputcsv($file, array($optionName));
              }
          }
        }
    }

    fclose($file);

    echo "csvファイルに書き込まれました。";
} else {
    echo "csvファイルをひらけませんでした";
}
?>
