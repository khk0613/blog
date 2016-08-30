$(function() {
	function initNoticeMessage() {
		$('#notice-message').animate({opacity: 1.0}, 5000, function() {
			hideNoticeMessage();
		}).on('click', function() {
			hideNoticeMessage();
		});
	}

	function hideNoticeMessage() {
		$('#notice-message').stop().slideUp(300, function() {
			$(this).remove();
		});
	}

	if ($('#notice-message').length) {
		initNoticeMessage();
	}

	// $(".alert_custom").each(function(){
	// 	$this = $(this);
	// 	$input = $this.parent().find("input");
	// 	$input.focus(function(){
	// 		$this.hide();
	// 	});
	// });

});
