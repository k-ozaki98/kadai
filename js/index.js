function calculateTotalPrice() {
  let totalPrice = 100000;
  let selectMemory = document.querySelector('input[name="memory"]:checked');
  let selectStorage = document.querySelector('input[name="storage"]:checked');
  let selectKeybord = document.getElementById('keybord');
  let selectCutpro = document.querySelector('input[name="cutpro"]:checked');
  
  // メモリ選択
  if (selectMemory) {
    let price = parseInt(selectMemory.dataset.price);
    totalPrice += price;
  }
  
  // ストレージ選択
  if (selectStorage) {
    let price = parseInt(selectStorage.dataset.price);
    totalPrice += price;
  }
  
  // キーボード選択
  if (selectKeybord) {
    let selectOption = selectKeybord.options[selectKeybord.selectedIndex];
    let price = parseInt(selectOption.dataset.price);
    totalPrice += price;
  }
  
  // カットプロ選択
  if (selectCutpro) {
    let price = parseInt(selectCutpro.dataset.price);
    totalPrice += price;
  }
  
  document.querySelector('.total p').textContent = `合計: ${totalPrice}円(税込)`;
}


let memoryOptions = document.querySelectorAll('input[name="memory"]');
memoryOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
});

let storageOptions = document.querySelectorAll('input[name="storage"]');
storageOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
});

let keybordOptions = document.querySelectorAll('select[name="keybord"]');
keybordOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
})

let cutproOptions = document.querySelectorAll('input[name="cutpro"]');
cutproOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
})

// ページ読み込み時に計算を実行
calculateTotalPrice();