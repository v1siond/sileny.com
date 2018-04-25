$(document).on('click', '.animate-button', function(e) {
    e.preventDefault(); // prevents default scrolling
    let _this = e.target,
        selectedView = _this.hash.replace('#', ''),
        action = $(_this).data('action');
    $.getJSON("https://api.ipify.org/?format=json", function(data) {
      var ip = data.ip;
      $.getJSON("http://api.ipstack.com/"+ip+"?access_key=e9987a814c9341b110a262a99439634d", function (data) {
        var country = data.country_name;
      });
    });
    $.ajax({
      url:   'index.php?view=' + selectedView,
      type:  'POST',
      data:  action,
      beforeSend: () => {
        $(".result").html("Procesando, espere por favor...");
      },
      success: (response) => {
        $(".result").html(response);
        $('.-animate').fadeIn('fast').css('display', 'flex').addClass('visible');
      },
      error: (response) => {
        console.log(response);
      }
    });
});


$(document).on('submit', '.default-form', function(e) {
    e.preventDefault();
    let form = this,
        actionUrl = $(form).attr('action'),
        action = $(form).data('action'),
        data = new FormData(form);
        console.log(action);
    data.append('admin', true);
    data.append('action', action);
    $.ajax({
      url:   actionUrl,
      type:  'POST',
      data:  data,
      cache: false,
      contentType: false,
      processData: false,
      beforeSend: () => {
        $(".result").html("Procesando, espere por favor...");
      },
      success: (response) => {
        $(".result").html(response);
        $('.-animate').fadeIn('fast').css('display', 'flex').addClass('visible');
      },
      error: (response) => {
        console.log(response);
      }
    });
    return false;
});
