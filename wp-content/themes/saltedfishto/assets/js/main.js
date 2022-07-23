$(document).ready(function() {
	if ($(window).scrollTop() && $( ".sfto-nav.navbar" ).hasClass('transparent-enable')) {
		$( ".sfto-nav.navbar" ).removeClass('transparent-bg').addClass('navbar-bg');
	}
	// add theme
	$( "body" ).addClass(localStorage.getItem('theme') ?? 'light-mode');

	// toggle theme
	$( ".sfto-nav .toggle" ).on( "click", function() {
		let prevMode = localStorage.getItem('theme') ?? 'light-mode';
		let mode = prevMode === 'light-mode' ? 'dark-mode' : 'light-mode';
		$( "body" ).removeClass( prevMode ).addClass( mode );
		localStorage.setItem('theme', mode);
	});

	$(window).scroll(function (event) {
		if ($( ".sfto-nav.navbar" ).hasClass('transparent-enable')) {
			if ($(window).scrollTop()) {
				$( ".sfto-nav.navbar" ).removeClass('transparent-bg').addClass('navbar-bg');
			} else {
				$( ".sfto-nav.navbar" ).removeClass('navbar-bg').addClass('transparent-bg');
			}
		}
	});
});