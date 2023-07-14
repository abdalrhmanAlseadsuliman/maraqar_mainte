

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="code.jquery.com_jquery-3.6.0.min.js"></script>
    <title>Document</title>

</head>
<body>
<form  method="POST" id="Myform">
	<input type="text" name="name" placeholder="Enter name">
	<input type="text" name="subject" placeholder="Enter subject">
	<input type="email" name="email" placeholder="Enter email">
	<textarea name="message" placeholder="Enter your message" rows="3"></textarea>
	<input name="submit" type="submit" value="Submit">
</form>
<div id="data"></div>

<script>
$(function () {
	$('form#Myform').on('submit', function (event) {
		$.ajax({
			type: 'post',
			url: 'test2.php',
			data: $('form').serialize(),
			success: function (data) {
                alert("sdsds");
			  $("#data").html(data);
			}
		});
		event.preventDefault();
	});
});
</script>
</body>
</html>


