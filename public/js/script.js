$(function() {

$('#envoyer-message').click(function() {
	var message = $('#message').val();
	if (message != '') {
		$.ajax({
			data: { message: message },
			type: "POST",
			url: "/message/messages",
			success: function() {
				$('#message').val('');
			}
		});
	}
});

var scrollHeightOfChatBox = $('#chat_area').scrollHeight;

setInterval(function() {
	$('#chat_area').load('/message/display');
	$('#chat_area').scrollTop( scrollHeightOfChatBox );
}, 1000);

});