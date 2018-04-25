let x = 1;
$('#add_feature').click(function(e) {
  console.log('click');
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
