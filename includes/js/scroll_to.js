
// <a href="javascript:scroll_to('#navegue-no-post');">Quem Somos</a>
function scroll_to (target) {
	jQuery('html, body').animate({
		scrollTop: jQuery(target).offset().top - 10
	}, 500);
}
