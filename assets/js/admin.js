$(document).on('click', '.animate-button', function(e) {
    e.preventDefault(); // prevents default scrolling
    let _this = e.target,
          selectedView = _this.hash.replace('#', ''); // grabs the #id
    $('.-animate').fadeOut('slow').removeClass('visible');
    $.getJSON("https://api.ipify.org/?format=json", function(data) {
      var ip = data.ip;
      $.getJSON("http://api.ipstack.com/"+ip+"?access_key=e9987a814c9341b110a262a99439634d", function (data) {
        var country = data.country_name;
      });
    });
    $.ajax({
      url:   'views/admin/partials/' + selectedView + '.php',
      type:  'GET',
      beforeSend: function () {
        $(".result").html("Procesando, espere por favor...");
      },
      success:  function (response) {
        $(".result").html(response).find('.limited-container').append($(_this).data(selectedView));
        $('.-animate').fadeIn('fast').css('display', 'flex').addClass('visible');
        if ($(window).width() < 1024) {
          setTimeout(function() {
            var y = $(_this.hash).offset().top;
            $('html,body').animate({scrollTop: y}, 500);
          }, 250);
        }
      }
    });
});


let x = 1;
$('#add_feature').click(function(e) {
  e.preventDefault(); // prevents default scrolling
  $('.new-features-container').append('<div class="input-container -between"><label for="feature['+ x +']" class="default-text -scorpion label dynamic">Oferta '+ x +'</label><input class="input dynamic" id="'+ x +'" type="text" name="feature['+ x +']" placeholder="1 sesión de 60m"><span class="remove-button"><i class="fas fa-times"></i></span></div>')
  x++;
});

$('#new_plan').on('click', '.remove-button', function(e) {
  e.preventDefault(); // prevents default scrolling
  $(this).parent('.input-container').remove();
  x--;
  i = 1;
  $('.input.dynamic').each(function(index, el) {
    $(this).attr({
      'name': 'feature['+ i + ']',
      'id': 'feature['+ i + ']'
    });
    i++;
  });
  i = 1;
  $('.label.dynamic').each(function(index, el) {
    $(this).text('Oferta ' + i + '');
    $(this).attr('for', 'feature['+ i + ']');
    i++;
  });
});
