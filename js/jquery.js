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

  const checkNames = [
    'os', 'office', 'security', 'cpu', 'fan', 'grease', 'graphic', 'power', 'memory', 'ssd', 'harddisk', 'addhard', 'drive', 'sound', 'case', 'rear', 'topfront', 'toprear', 'lan', 'wireless'
  ];

  let confirmContents = $('.confirm__contents');

  checkNames.forEach(function(checkName) {
    const checkbox = $(`input[name="${checkName}"]:checked + label`);
    confirmContents.append(`
    <dl>
      <dt>${checkName}</dt>
      <dd class="select-${checkName}">${checkbox.text()}</dd>
    </dl>
    `)
  })

  confirmContents.append(`
  <p class="total-price">合計金額:<span></span></p>  
  `)


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
    if(!confirmContents.is(target)) {
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
  const tabs = $('.product__item');
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