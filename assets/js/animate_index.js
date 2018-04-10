$('.animate-link').on('click', function(e) {
    e.preventDefault(); // prevents default scrolling
    var y = $(this.hash).offset().top; // grabs the #id element offset location
    $('html,body').animate({scrollTop: y - 70}, 1000); // animate the scroll
});