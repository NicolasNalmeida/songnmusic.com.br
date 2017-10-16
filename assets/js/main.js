$('.slick-banner').slick({
	infinite: true,
	slidesToShow: 1,
	slidesToScroll: 1,
	arrows: false,
	dots: false,
	draggable: false,
	pauseOnHover: false,
	pauseOnFocus: false,
	autoplay: true,
	autoplaySpeed: 4000
});

$('.btn-burger').on('click', function()
{
	$('.menu-content').addClass('display-on');
});

$('.close-menu').on('click', function()
{
	$('.menu-content').removeClass('display-on');
});