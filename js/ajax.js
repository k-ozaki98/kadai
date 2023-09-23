$(document).ready(function() {
console.log('aa')
  // データの取得
  $.ajax({
    url: "../data.json",
    dataType: "json",
  })
  .then( 
    // 成功したとき
    function(optionsData) {
      console.log(optionsData);

      const optionNames = Object.values(optionsData.optionNames);

      // オプション生成
      optionNames.forEach(optionName => {
        generateOptions(optionsData[`${optionName}Options`], optionName, optionName);
      });

      // 価格反映
      optionNames.forEach(optionName => {
        $(`input[name="${optionName}"]`).on('change', calculateTotalPrice);
      });

      // タブ切り替え
      const tabs = $('.product__item');
      tabs.on('click', tabSwitch);

      function tabSwitch() {
        $('.is-active').removeClass('is-active');
        $(this).addClass('is-active');

        $('.is-show').removeClass('is-show');
        const index = tabs.index(this);
        $('.product').eq(index).addClass('is-show');
      }

      // radio, label生成
      function generateOptions(optionData, sectionClassName, inputName) {
        const section = $(`.${sectionClassName}`);

        optionData.forEach((option, index) => { 
          const div = $('<div>').addClass(`${sectionClassName}__${option.id}`);
          const input = $('<input>').attr({
            type: 'radio',
            id: option.id,
            name: inputName,
            value: option.id,
            'data-price': option.price,
            'data-img': option.image,
          });
          
          // 最初の項目を選択しとく
          if (index === 0) { 
            input.prop('checked', true);
          }

          // 画像生成
          const imgWrap = $('<div>').addClass('image-wrap');
          const img = $('<img>').attr('src', option.image);
          imgWrap.append(img);

          const label = $('<label>').attr('for', option.id).append(imgWrap, option.name, `<span class="plusprice">+ ${option.price}円</span>`);
        
          div.append(input, label);
          section.append(div);
        });
      }

    
      // 合計金額計算
      function calculateTotalPrice() {
        totalPrice = 0; 
    
        const checkNames = optionsData.optionNames;
    
        checkNames.forEach(checkName => {
          const checkboxes = $(`input[name="${checkName}"]:checked`);
          checkboxes.each(function() {
            totalPrice += parseInt($(this).data('price'));
          });
        });
    
        $('.total p span').text(`${totalPrice}円`);
        return totalPrice;
      }
    
      // 注文確認画面
      $('.confirm-btn').on('click', function() {
        const confirmContents = $('.confirm__contents');
        confirmContents.empty();
    
        const checkNames = optionsData.optionNames;
    
        checkNames.forEach(function(checkName) {
          const checkbox = $(`input[name="${checkName}"]:checked + label`);
          const sectionText = $(`.${checkName} h3`).text();
          confirmContents.append(`
            <dl>
              <dt>${sectionText}</dt>
              <dd class="select-${checkName}">${checkbox.text()}</dd>
            </dl>
          `);
        });
    
        confirmContents.append(`<p class="total-price">合計金額:<span>${totalPrice}円</span></p>`);
    
        $('.confirm').css('display', 'block');
      });
    
      // 確認画面を非表示
      $('.confirm__layer').on('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        const target = event.target;
        const confirmSection = $('.confirm');
        if (!$(target).closest('.confirm__contents').length) {
          confirmSection.css('display', 'none');
        }
      });
      // ページ読み込み時に計算を実行
      calculateTotalPrice();
    },
  
    // エラーの時
    function () {
      console.error("データを取得できませんでした: " + error);

    }
    );

});


