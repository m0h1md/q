<!DOCTYPE html>
<html>
<head>
	<title>Live Chat Box</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function(){
			// Load the chat log
			$.ajax({
				url: "getChat.php",
				success: function(result){
					$("#chat-log").html(result);
				}
			});

			// Send a message
			$("#send-btn").click(function(){
				var message = $("#message").val();
				var user = $("#user").val();
				$.ajax({
					url: "sendChat.php",
					method: "POST",
					data: { message: message, user: user },
					success: function(result){
						$("#message").val("");
					}
				});
			});

			// Set up auto-refresh
			setInterval(function(){
				$.ajax({
					url: "getChat.php",
					success: function(result){
						$("#chat-log").html(result);
					}
				});
			}, 5000);
		});
	</script>
	<style>
		#chat-log {
			height: 300px;
			overflow-y: scroll;
		}
	</style>
</head>
<body>
	<h1>Live Chat Box</h1>
	<div id="chat-log"></div>
	<div>
		<label for="user">Name:</label>
		<input type="text" id="user" name="user">
		<label for="message">Message:</label>
		<input type="text" id="message" name="message">
		<button id="send-btn">Send</button>
	</div>
</body>
</html>
