var owl = $('.owl-carousel');
owl.owlCarousel({
    items: 4,
    loop: true,
    margin: 15,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true
});
$('.play').on('click', function() {
    owl.trigger('play.owl.autoplay', [1000])
})
$('.stop').on('click', function() {
    owl.trigger('stop.owl.autoplay')
});

$(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.nnavbarscroll').removeClass("hid_nav");
        } else {
            $('.nnavbarscroll').addClass("hid_nav");
        }

    });
});