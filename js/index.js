function calculateTotalPrice() {
  let totalPrice = 100000;
  let selectOs = document.querySelector('input[name="os"]:checked');
  let selectOffice = document.querySelector('input[name="office"]:checked');
  let selectSecurity = document.querySelector('input[name="security"]:checked');
  let selectCpu = document.querySelector('input[name="cpu"]:checked');
  let selectFan = document.querySelector('input[name="fan"]:checked');
  let selectGrease = document.querySelector('input[name="grease"]:checked');
  let selectCutpro = document.querySelector('input[name="cutpro"]:checked');
  
  // os選択
  if (selectOs) {
    let price = parseInt(selectOs.dataset.price);
    totalPrice += price;
  }
  
  // オフィスソフト選択
  if (selectOffice) {
    let price = parseInt(selectOffice.dataset.price);
    totalPrice += price;
  }
  
  // セキュリティソフト選択
  if (selectSecurity) {
    let price = parseInt(selectSecurity.dataset.price);
    totalPrice += price;
  }

  // cpu選択
  if (selectCpu) {
    let price = parseInt(selectCpu.dataset.price);
    totalPrice += price;
  }
  
  // cpuファン選択
  if (selectFan) {
    let price = parseInt(selectFan.dataset.price);
    totalPrice += price;
  }
  // cpuグリス選択
  if (selectGrease) {
    let price = parseInt(selectGrease.dataset.price);
    totalPrice += price;
  }

  // カットプロ選択
  if (selectCutpro) {
    let price = parseInt(selectCutpro.dataset.price);
    totalPrice += price;
  }
  
  document.querySelector('.total p span').textContent = `${totalPrice}円`;
}

document.addEventListener('DOMContentLoaded', function() {
  const tabs = document.getElementsByClassName('product__item');
  for (let i = 0; i < tabs.length; i++) {
    tabs[i].addEventListener('click', tabSwich, false);
  }

  function tabSwich() {
    document.getElementsByClassName('is-active')[0].classList.remove('is-active');
    this.classList.add('is-active');

    document.getElementsByClassName('is-show')[0].classList.remove('is-show');
    const arrayTabs = Array.prototype.slice.call(tabs);
    const index = arrayTabs.indexOf(this);
    document.getElementsByClassName('product')[index].classList.add('is-show');
  };
}, false)

let osOptions = document.querySelectorAll('input[name="os"]');
osOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
});

let officeOptions = document.querySelectorAll('input[name="office"]');
officeOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
});

let securityOptions = document.querySelectorAll('input[name="security"]');
securityOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
});

let cpuOptions = document.querySelectorAll('input[name="cpu"]');
cpuOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
})

let fanOptions = document.querySelectorAll('input[name="fan"]');
fanOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
})

let greaseOptions = document.querySelectorAll('input[name="grease"]');
greaseOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
})

let cutproOptions = document.querySelectorAll('input[name="cutpro"]');
cutproOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
})

// ページ読み込み時に計算を実行
calculateTotalPrice();