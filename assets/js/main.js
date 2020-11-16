$('.carousel').carousel({
    interval: 3000
});

$('header .collapse ul').addClass('navbar-nav');
$('header .collapse ul li').addClass('nav-item');
$('header .collapse ul li a').addClass('nav-link');

$('.bread_crumb .top').append("<span>></span>")
$('.bread_crumb .sub').append("<span>></span>")
$('.bread_crumb .tail span').html("");

if (!$('.np-tab div').hasClass("next")) {
    $('.np-tab .prev').addClass("right");
}
