let totalPrice = 100000;

function addTotalPrice(element) {
  if(element) {
    let price = parseInt(element.dataset.price);
    totalPrice += price;
  }
}

function calculateTotalPrice() {
  const checkNames = [
    'os', 'office', 'security', 'cpu', 'fan', 'grease', 'graphic', 'power', 'memory', 'ssd', 'harddisk', 'addhard', 'drive', 'sound', 'case', 'rear', 'topfront', 'toprear', 'lan', 'wireless'
  ];

  checkNames.forEach(checkName => {
    const checkboxes = $(`input[name="${checkName}"]:checked`);
    checkboxes.each(function() {
      addTotalPrice(this);
    });
  });
  $('.total p span').text(`${totalPrice}円`);

  return totalPrice;
}

function confirmShow() {
  let selectOs = $('input[name="os"]:checked + label');
  let selectOffice = $('input[name="office"]:checked + label');
  let selectSecurity = $('input[name="security"]:checked + label');
  let selectCpu = $('input[name="cpu"]:checked + label');
  let selectFan = $('input[name="fan"]:checked + label');
  let selectGrease = $('input[name="grease"]:checked + label');
  let selectGraphic = $('input[name="graphic"]:checked + label');
  let selectPower = $('input[name="power"]:checked + label');
  let selectMemory = $('input[name="memory"]:checked + label');
  let selectSsd = $('input[name="ssd"]:checked + label');
  let selectHarddisk = $('input[name="harddisk"]:checked + label');
  let selectAddHard = $('input[name="addhard"]:checked + label');
  let selectDrive = $('input[name="drive"]:checked + label');
  let selectSound = $('input[name="sound"]:checked + label');
  let selectCase = $('input[name="case"]:checked + label');
  let selectRear = $('input[name="rear"]:checked + label');
  let selectTopFront = $('input[name="topfront"]:checked + label');
  let selectTopRear = $('input[name="toprear"]:checked + label');
  let selectLan = $('input[name="lan"]:checked + label');
  let selectWireless = $('input[name="wireless"]:checked + label');

  let confirmContents = $('.confirm__contents');


  confirmContents.html(`
    <h3 class="confirm__ttl">カスタマイズ内容の確認</h3>
    <dl>
      <dt>OS</dt>
      <dd class="select-os">${selectOs.text()}</dd>
    </dl>
    <dl>
      <dt>オフィスソフト</dt>
      <dd>${selectOffice.text()}</dd>
    </dl>
    <dl>
      <dt>セキュリティソフト</dt>
      <dd>${selectSecurity.text()}</dd>
    </dl>
    <dl>
      <dt>CPU</dt>
      <dd>${selectCpu.text()}</dd>
    </dl>
    <dl>
      <dt>CPUファン</dt>
      <dd>${selectFan.text()}</dd>
    </dl>
    <dl>
      <dt>CPUグリス</dt>
      <dd>${selectGrease.text()}</dd>
    </dl>
    <dl>
      <dt>グラフィック機能</dt>
      <dd>${selectGraphic.text()}</dd>
    </dl>
    <dl>
      <dt>電源</dt>
      <dd>${selectPower.text()}</dd>
    </dl>
    <dl>
      <dt>メモリ</dt>
      <dd>${selectMemory.text()}</dd>
    </dl>
    <dl>
      <dt>SSD</dt>
      <dd>${selectSsd.text()}</dd>
    </dl>
    <dl>
      <dt>ハードディスク/SSD</dt>
      <dd>${selectHarddisk.text()}</dd>
    </dl>
    <dl>
      <dt>ハードディスク（追加）</dt>
      <dd>${selectAddHard.text()}</dd>
    </dl>
    <dl>
      <dt>光学ドライブ</dt>
      <dd>${selectDrive.text()}</dd>
    </dl>
    <dl>
      <dt>サウンド</dt>
      <dd>${selectSound.text()}</dd>
    </dl>
    <dl>
      <dt>ケース</dt>
      <dd>${selectCase.text()}</dd>
    </dl>
    <dl>
      <dt>リアケースファン</dt>
      <dd>${selectRear.text()}</dd>
    </dl>
    <dl>
      <dt>トップケースファン前部</dt>
      <dd>${selectTopFront.text()}</dd>
    </dl>
    <dl>
      <dt>トップケースファン後部</dt>
      <dd>${selectTopRear.text()}</dd>
    </dl>
    <dl>
      <dt>LAN</dt>
      <dd>${selectLan.text()}</dd>
    </dl>
    <dl>
      <dt>無線LAN</dt>
      <dd>${selectWireless.text()}</dd>
    </dl>
    <p class="total-price">合計金額:<span></span></p>
  `);

  let totalPriceElement = $('.total-price span');
  let totalPrice = calculateTotalPrice();
  totalPriceElement.text(`${totalPrice}円`);

  let confirmSection = $('.confirm');
  confirmSection.css('display', 'block');
}

function confirmHide() {
  let confirmLayer = $('.confirm__layer');
  let confirmContents = $('.confirm__contents');
  confirmLayer.on('click', function(event) {
    event.preventDefault();
    event.stopPropagation();
    let target = event.target;
    let confirmSection = $('.confirm');
    if(!confirmContents.contains(target)) {
      confirmSection.css('display', 'none');
    }
  });

  $(window).off('click', confirmHide);
}

// 価格反映
const optionNames = ['os', 'office', 'security', 'cpu', 'fan', 'grease', 'graphic', 'power', 'memory', 'ssd', 'harddisk', 'addhard', 'drive', 'sound', 'case', 'rear', 'topfront', 'toprear', 'lan', 'wireless'];

optionNames.forEach(optionName => {
  let options = $(`input[name="${optionName}"]`);
  options.on('change', calculateTotalPrice);
});

const orderBtn = $('.order-btn');
orderBtn.on('click', confirmShow);
const layer = $('.confirm__layer');
layer.on('click', confirmHide);

// タブ切り替え
$(document).ready(function() {
  const tabs = $('product__item');
  tabs.on('click', tabSwitch);

  function tabSwitch() {
    $('is-active').removeClass('is-active');
    $(this).addClass('is-active');

    $('is-show').removeClass('is-show');
    const index = tabs.index(this);
    $('.product').eq(index).addClass('is-show');
  }
});

// ページ読み込み時に計算を実行
calculateTotalPrice();