$(document).ready(function(){
	var pusher = new Pusher('e1adc36c9c959250e6a1');
	chanel = pusher.subscribe('exercise-3-2');

	chanel.bind(
         'send-message',
         function(data){
         	var cont = $('#messages');

         	cont.find('.no-messages').remove();

         	$('<li>').html('<strong>' + data.name+':</strong> '+data.msg)
         	.appendTo(cont);
         }
		);

	$('form').submit(function(){
		$.post('post.php', $(this).serialize());
		$('#message').val('').focus();
		return false;
	});
});

---------- 80 strana -----------------