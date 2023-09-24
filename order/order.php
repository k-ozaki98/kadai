<?php
session_start();

$data = file_get_contents('../data.json');
$optionsData = json_decode($data, true);

// 選択内容を取得
if (isset($_SESSION['selected_options'])) {
    $selectedOptions = $_SESSION['selected_options'];
} else {
    // セッションに選択内容がない場合、エラーメッセージを表示またはリダイレクトするなどの対応が必要です。
    echo "セッションに選択内容がありません。";
    exit;
}

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$tel = $_POST['tel'];

$csvFileName = "../order.csv";

$file = fopen($csvFileName, 'a');

if ($file) {
    // 基本情報
    fputcsv($file, array("氏名", "メールアドレス", "電話番号", "選択オプション"));

    // 基本情報をCSVファイルに書き込む
    fputcsv($file, array($fullname, $email, $tel));

    // 選択オプション名と価格を格納する変数を初期化
    $selectedOptionNames = array();
    $optionNamesAndPrices = array();

    // CSVファイルに選択オプションと価格を書き込む
    foreach ($selectedOptions as $key => $value) {
        if (isset($optionsData[$key . 'Options'])) {
            $optionData = $optionsData[$key . 'Options'];
            foreach ($optionData as $option) {
                if ($option['id'] === $value) {
                    $selectedOptionNames[] = $option['name'];
                    $optionNamesAndPrices[] = $option['name'] . " ({$option['price']}円)";
                }
            }
        }
    }

    // CSVファイルに選択オプション名を書き込む
    fputcsv($file, array("選択オプション名", implode(",", $selectedOptionNames)));

    // CSVファイルに選択オプションと価格を書き込む
    fputcsv($file, array("選択オプションと価格", implode(",", $optionNamesAndPrices)));

    fclose($file);

    echo "CSV ファイルに書き込まれました。";
} else {
    echo "CSV ファイルを開けませんでした。";
}
?>
