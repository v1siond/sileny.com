let menuList = $('.menu-list'),
    toggleClass = 'visible',
    fadeScreen = $('.fade-screen'),
    _window = $(window),
    socialMedia = $('.social-media');

$('.bar-menu').click(function() {
  if (menuList.hasClass(toggleClass)) {
    menuList.css('right', '-14rem').removeClass(toggleClass);
    fadeScreen.fadeOut('slow').removeClass(toggleClass);
    socialMedia.css('left', '-5rem').removeClass(toggleClass);
  } else {
    menuList.css('right', '0').addClass(toggleClass);
    fadeScreen.fadeIn('slow').addClass(toggleClass);
    socialMedia.css('left', '0').addClass(toggleClass);
  }
});

_window.resize(function() {
  windowWidth = _window.width();
  if (windowWidth > 1000) {
    menuList.css('right', '0');
    fadeScreen.fadeOut('slow').removeClass(toggleClass);
    socialMedia.css('left', '0').addClass(toggleClass);
  } else {
    menuList.css('right', '-14rem').removeClass(toggleClass);
    socialMedia.css('left', '-5rem').removeClass(toggleClass);
  }
});

$('.share-button').click(function(){
  postID = $(this).attr('id');
  mediaPost = $('.post-social-media#' + postID);
  console.log(mediaPost);
  if (mediaPost.hasClass('visible')) {
    mediaPost.css('opacity', 0);
    mediaPost.removeClass('visible');
  } else {
    mediaPost.css('opacity', 1);
    mediaPost.addClass('visible');
  }
})

  // If any flashes exist, hide them after 5 seconds
$('.flash-message').delay(8000).fadeOut('slow')