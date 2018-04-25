let dropDown = $('.-dropdown');
dropDown.click(function(e) {
  $(this).children('.-hidden').slideToggle('fast');
});