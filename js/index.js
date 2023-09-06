function calculateTotalPrice() {
  let totalPrice = 100000;
  let selectOs = document.querySelector('input[name="os"]:checked');
  let selectOffice = document.querySelector('input[name="office"]:checked');
  let selectSecurity = document.querySelector('input[name="security"]:checked');
  let selectCpu = document.querySelector('input[name="cpu"]:checked');
  let selectFan = document.querySelector('input[name="fan"]:checked');
  let selectGrease = document.querySelector('input[name="grease"]:checked');
  let selectCutpro = document.querySelector('input[name="cutpro"]:checked');
  let selectGraphic = document.querySelector('input[name="graphic"]:checked');
  let selectPower = document.querySelector('input[name="power"]:checked');
  let selectMemory = document.querySelector('input[name="memory"]:checked');
  let selectSsd = document.querySelector('input[name="ssd"]:checked');
  
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

  // グラフィック選択
  if (selectGraphic) {
    let price = parseInt(selectGraphic.dataset.price);
    totalPrice += price;
  }

  // カットプロ選択
  if (selectCutpro) {
    let price = parseInt(selectCutpro.dataset.price);
    totalPrice += price;
  }
  // 電源選択
  if (selectPower) {
    let price = parseInt(selectPower.dataset.price);
    totalPrice += price;
  }
  // メモリ選択
  if (selectMemory) {
    let price = parseInt(selectMemory.dataset.price);
    totalPrice += price;
  }
  // SSD選択
  if (selectSsd) {
    let price = parseInt(selectSsd.dataset.price);
    totalPrice += price;
  }
  
  document.querySelector('.total p span').textContent = `${totalPrice}円`;

  return totalPrice;
}

function confirmShow() {
  let selectOs = document.querySelector('input[name="os"]:checked + label');
  let selectOffice = document.querySelector('input[name="office"]:checked + label');
  let selectSecurity = document.querySelector('input[name="security"]:checked + label');
  let selectCpu = document.querySelector('input[name="cpu"]:checked + label');
  let selectFan = document.querySelector('input[name="fan"]:checked + label');
  let selectGrease = document.querySelector('input[name="grease"]:checked + label');
  let selectCutpro = document.querySelector('input[name="cutpro"]:checked + label');
  let selectGraphic = document.querySelector('input[name="graphic"]:checked + label');
  let selectPower = document.querySelector('input[name="power"]:checked + label');
  let selectMemory = document.querySelector('input[name="memory"]:checked + label');
  let selectSsd = document.querySelector('input[name="ssd"]:checked + label');

  let confirmContents = document.querySelector('.confirm__contents');

  confirmContents.innerHTML = `
    <h3 class="confirm__ttl">カスタマイズ内容の確認</h3>
    <dl>
      <dt>OS</dt>
      <dd class="select-os">${selectOs.textContent}</dd>
    </dl>
    <dl>
      <dt>オフィスソフト</dt>
      <dd>${selectOffice.textContent}</dd>
    </dl>
    <dl>
      <dt>セキュリティソフト</dt>
      <dd>${selectSecurity.textContent}</dd>
    </dl>
    <dl>
      <dt>CPUファン</dt>
      <dd>${selectFan.textContent}</dd>
    </dl>
    <dl>
      <dt>CPUグリス</dt>
      <dd>${selectGrease.textContent}</dd>
    </dl>
    <dl>
      <dt>グラフィック機能</dt>
      <dd>${selectGraphic.textContent}</dd>
    </dl>
    <dl>
      <dt>電源</dt>
      <dd>${selectPower.textContent}</dd>
    </dl>
    <dl>
      <dt>メモリ</dt>
      <dd>${selectMemory.textContent}</dd>
    </dl>
    <dl>
      <dt>SSD</dt>
      <dd>${selectSsd.textContent}</dd>
    </dl>
    <p class="total-price">合計金額:<span></span></p>
  `;
  let totalPriceElement = document.querySelector('.total-price span');
  let totalPrice = calculateTotalPrice();
  totalPriceElement.textContent = `${totalPrice}円`;

  let confirmSection = document.querySelector('.confirm');
  confirmSection.style.display = 'block';
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

let graphicOptions = document.querySelectorAll('input[name="graphic"]');
graphicOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
})

let cutproOptions = document.querySelectorAll('input[name="cutpro"]');
cutproOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
})

let powerOptions = document.querySelectorAll('input[name="power"]');
powerOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
})
let memoryOptions = document.querySelectorAll('input[name="memory"]');
memoryOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
})
let memorySsd = document.querySelectorAll('input[name="ssd"]');
memorySsd.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
})

const orderBtn = document.querySelector('.order-btn');
orderBtn.addEventListener('click', confirmShow);

// ページ読み込み時に計算を実行
calculateTotalPrice();