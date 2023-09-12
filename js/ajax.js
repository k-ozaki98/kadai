$(function() {
    $('#button').click(
      function() {
        $.ajax({
          url: 'data.json',
          dataType: 'json'
        }).done(function(html) {
          $('#text').html(os);
        }).fail(function() {
          alert('error');
        });
      }
    );
  });