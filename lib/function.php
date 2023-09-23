<?php
// radioボタン生成
function generateRadioOptions($optionsData, $selectedOptions, $inputName)  {
  if (isset($optionsData)) {
      $firstRadioFlag = true; // 各セクションごとに初期ラジオボタンを設定するためのフラグ

      foreach ((array)$optionsData as $option) {
          $id = $option['id'];
          $value = $option['id'];
          $price = $option['price'];
          $name = $option['name'];

          $checked = "";
          if (isset($selectedOptions[$inputName]) && $selectedOptions[$inputName] == $id) {
              $checked = "checked";
          } elseif (!isset($selectedOptions[$inputName]) && $firstRadioFlag) {
              $checked = "checked";
              $firstRadioFlag = false; // 初期ラジオボタンが設定されたらフラグをオフにする
          }

          echo <<<EOT
          <div class="$id">
              <input type='radio' id='$id' name="$inputName" value="$value" data-price="$price" required $checked>
              <label for='$id'>
                  $name <span class='plusprice'> + $price 円</span>
              </label>
          </div>
          EOT;
      }
  }
}
?>

<?php
// 選択オプション表示
function confirmOptions($selectedOptions, $optionsData) {
    
    foreach ($selectedOptions as $key => $value) {
        if (isset($optionsData[$key . 'Options'])) {
            $optionData = $optionsData[$key . 'Options'];
            $sectionTitle = $optionsData['sectionTitle'][$key]; 

            echo "<h3>{$sectionTitle}</h3>";
            foreach ($optionData as $option) {
                if ($option['id'] === $value) {
                    echo "<p class='confirm-name'>{$option['name']} ({$option['price']}円)</p>";
                }
            }
        }
    }
}
?>

<?php
// 合計金額
  function calculateTotalPrice($selectedOptions, $optionsData) {
    $totalPrice = 0;

    foreach ($selectedOptions as $key => $value) {
        if (isset($optionsData[$key . 'Options'])) {
            $optionData = $optionsData[$key . 'Options'];
            foreach ($optionData as $option) {
                if ($option['id'] === $value) {
                    $totalPrice += $option['price'];
                }
            }
        }
    }

    return $totalPrice;
}
?>

