function calculateTotalPrice() {
  let totalPrice = 100000;
  let selectOs = document.querySelector('input[name="os"]:checked');
  let selectOffice = document.querySelector('input[name="office"]:checked');
  let selectSecurity = document.querySelector('input[name="security"]:checked');
  let selectCpu = document.querySelector('input[name="cpu"]:checked');
  let selectFan = document.querySelector('input[name="fan"]:checked');
  let selectGrease = document.querySelector('input[name="grease"]:checked');
  let selectGraphic = document.querySelector('input[name="graphic"]:checked');
  let selectPower = document.querySelector('input[name="power"]:checked');
  let selectMemory = document.querySelector('input[name="memory"]:checked');
  let selectSsd = document.querySelector('input[name="ssd"]:checked');
  let selectHarddisk = document.querySelector('input[name="harddisk"]:checked');
  let selectAddHard = document.querySelector('input[name="addhard"]:checked');
  let selectDrive = document.querySelector('input[name="drive"]:checked');
  let selectSound = document.querySelector('input[name="sound"]:checked');
  let selectCase = document.querySelector('input[name="case"]:checked');
  let selectRear = document.querySelector('input[name="rear"]:checked');
  let selectTopFront = document.querySelector('input[name="topfront"]:checked');
  let selectTopRear = document.querySelector('input[name="toprear"]:checked');
  let selectLan = document.querySelector('input[name="lan"]:checked');
  let selectWireless = document.querySelector('input[name="wireless"]:checked');
  
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
  // ハードディスク選択
  if (selectHarddisk) {
    let price = parseInt(selectHarddisk.dataset.price);
    totalPrice += price;
  }
  // ハードディスク追加選択
  if (selectAddHard) {
    let price = parseInt(selectAddHard.dataset.price);
    totalPrice += price;
  }
  // 光学ドライブ選択
  if (selectDrive) {
    let price = parseInt(selectDrive.dataset.price);
    totalPrice += price;
  }
  // サウンド選択
  if (selectSound) {
    let price = parseInt(selectSound.dataset.price);
    totalPrice += price;
  }
  // ケース選択
  if (selectCase) {
    let price = parseInt(selectCase.dataset.price);
    totalPrice += price;
  }
  // リアケースファン選択
  if (selectRear) {
    let price = parseInt(selectRear.dataset.price);
    totalPrice += price;
  }
  // トップケースファン前部選択
  if (selectTopFront) {
    let price = parseInt(selectTopFront.dataset.price);
    totalPrice += price;
  }
  // トップケースファン後部選択
  if (selectTopRear) {
    let price = parseInt(selectTopRear.dataset.price);
    totalPrice += price;
  }
  // LAN選択
  if (selectLan) {
    let price = parseInt(selectLan.dataset.price);
    totalPrice += price;
  }
  // 無線LAN選択
  if (selectWireless) {
    let price = parseInt(selectWireless.dataset.price);
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
  let selectGraphic = document.querySelector('input[name="graphic"]:checked + label');
  let selectPower = document.querySelector('input[name="power"]:checked + label');
  let selectMemory = document.querySelector('input[name="memory"]:checked + label');
  let selectSsd = document.querySelector('input[name="ssd"]:checked + label');
  let selectHarddisk = document.querySelector('input[name="harddisk"]:checked + label');
  let selectAddHard = document.querySelector('input[name="addhard"]:checked + label');
  let selectDrive = document.querySelector('input[name="drive"]:checked + label');
  let selectSound = document.querySelector('input[name="sound"]:checked + label');
  let selectCase = document.querySelector('input[name="case"]:checked + label');
  let selectRear = document.querySelector('input[name="rear"]:checked + label');
  let selectTopFront = document.querySelector('input[name="topfront"]:checked + label');
  let selectTopRear = document.querySelector('input[name="toprear"]:checked + label');
  let selectLan = document.querySelector('input[name="lan"]:checked + label');
  let selectWireless = document.querySelector('input[name="wireless"]:checked + label');

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
      <dt>CPU</dt>
      <dd>${selectCpu.textContent}</dd>
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
    <dl>
      <dt>ハードディスク/SSD</dt>
      <dd>${selectHarddisk.textContent}</dd>
    </dl>
    <dl>
      <dt>ハードディスク（追加）</dt>
      <dd>${selectAddHard.textContent}</dd>
    </dl>
    <dl>
      <dt>光学ドライブ</dt>
      <dd>${selectDrive.textContent}</dd>
    </dl>
    <dl>
      <dt>サウンド</dt>
      <dd>${selectSound.textContent}</dd>
    </dl>
    <dl>
      <dt>ケース</dt>
      <dd>${selectCase.textContent}</dd>
    </dl>
    <dl>
      <dt>リアケースファン</dt>
      <dd>${selectRear.textContent}</dd>
    </dl>
    <dl>
      <dt>トップケースファン前部</dt>
      <dd>${selectTopFront.textContent}</dd>
    </dl>
    <dl>
      <dt>トップケースファン後部</dt>
      <dd>${selectTopRear.textContent}</dd>
    </dl>
    <dl>
      <dt>LAN</dt>
      <dd>${selectLan.textContent}</dd>
    </dl>
    <dl>
      <dt>無線LAN</dt>
      <dd>${selectWireless.textContent}</dd>
    </dl>
    <p class="total-price">合計金額:<span></span></p>
  `;
  let totalPriceElement = document.querySelector('.total-price span');
  let totalPrice = calculateTotalPrice();
  totalPriceElement.textContent = `${totalPrice}円`;

  let confirmSection = document.querySelector('.confirm');
  confirmSection.style.display = 'block';

  window.addEventListener('click', function(event) {
    let target = event.target;
    let confirmContents = document.querySelector('.confirm__contents');

    if (!confirmContents.contains(target)) {
      let confirmSection = document.querySelector('.confirm');
      confirmSection.style.display = 'none';
    }
  });
}


// 価格反映
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

let powerOptions = document.querySelectorAll('input[name="power"]');
powerOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
})
let memoryOptions = document.querySelectorAll('input[name="memory"]');
memoryOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
})
let ssdOptions = document.querySelectorAll('input[name="ssd"]');
ssdOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
})
let harddiskOptions = document.querySelectorAll('input[name="harddisk"]');
harddiskOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
})
let addhardOptions = document.querySelectorAll('input[name="addhard"]');
addhardOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
})
let driveOptions = document.querySelectorAll('input[name="drive"]');
driveOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
})
let soundOptions = document.querySelectorAll('input[name="sound"]');
soundOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
})
let caseOptions = document.querySelectorAll('input[name="case"]');
caseOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
})
let rearOptions = document.querySelectorAll('input[name="rear"]');
rearOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
})
let topfrontOptions = document.querySelectorAll('input[name="topfront"]');
topfrontOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
})
let toprearOptions = document.querySelectorAll('input[name="toprear"]');
toprearOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
})
let lanOptions = document.querySelectorAll('input[name="lan"]');
lanOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
})
let wirelessOptions = document.querySelectorAll('input[name="wireless"]');
wirelessOptions.forEach(function(option) {
  option.addEventListener('change', calculateTotalPrice);
})

const orderBtn = document.querySelector('.order-btn');
orderBtn.addEventListener('click', confirmShow);



// タブの切り替え
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


// ページ読み込み時に計算を実行
calculateTotalPrice();