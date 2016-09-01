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

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
	});

	//게시글 삭제    
    $('#post_delete').on('click', function(e) {
	    var inputData = $('#post-delete-form').serialize();
		var dataId = $(this).attr('data-id');
		var msg = "삭제하시겠습니까?";
		if(confirm(msg) != 0){
			$.ajax({
	        url: 'http://localhost:8000/posts/' + dataId,
	        type: 'POST',
	        data: inputData,
	        success:window.location.href = 'http://localhost:8000/posts'
    	});
   			//window.location.href = 'http://localhost:8000/posts/' + dataId + '/delete';
		}else{
			alert("지우기를 취소하셨습니다.");
		}

    return false;		
		
    //댓글 삭제
    
  //   $('#comment_delete').on('click', function(e) {
	 //    var inputData = $('#comment-delete-form').serialize();
		// var dataId = $(this).attr('data-id');
		// var msg = "삭제하시겠습니까?";
		// if(confirm(msg) != 0){
		// 	$.ajax({
	 //        url: 'http://localhost:8000/posts/' + dataId,
	 //        type: 'POST',
	 //        data: inputData,
	 //        success:window.location.href = 'http://localhost:8000/posts'
  //   	});
  //  			//window.location.href = 'http://localhost:8000/posts/' + dataId + '/delete';
		// }else{
		// 	alert("지우기를 취소하셨습니다.");
		// }

  //   return false;		

    
});




}); //jquery_end
	


