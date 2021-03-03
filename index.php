<!-- <!DOCTYPE html>
<html>
<head>
	<title>Contact Form</title>
</head>
<body>

<form>
	<input type="text" name="name">
	<input type="text" name="email">
	<input type="email" name="email">
	<textarea name="message"></textarea>
	<input type="submit" name="submit" value="send Message">
</form>
<div class="status">
	 <?php
	 if(isset($_POST['submit']))
	 {
	 	$Username = $_POST['name'];
	 	$Phone = $_POST['phone'];
	 	$Email = $_POST['email'];
	 	$Message = $_POST['message'];

	    $email_from = 'rameshjayam95@gmail.com';
	    $email_subject = "New Form Submission";
	    $email_body = "Name: $Username.\n".
	                   "Phone No: $Phone.\n".
	                   "Email ID: $Email.\n".
	                   "User Message:$Message.\n".

	    $to_email = "rameshjayam95@gmail.com";
	    $header = "From: $email_from \r\n";
	    $header .="Reply-To: $Email\r\n";

	    if ($respone->success)
	    {
	    	mail($to_email,$email_subject,$email_body,$header);
	    	echo "succes";
	    }
	    else{
	    	echo "invalid";
	    }
	 }
	 ?>
</div>
</body>
</html>
 -->


 <!DOCTYPE html>
<html>
<head>
    <title>Send an Email</title>
</head>
<body>

	<center>
		<h4 class="sent-notification"></h4>

		<form id="myForm">
			<h2>Send an Email</h2>

			<label>Name</label>
			<input id="name" type="text" placeholder="Enter Name">
			<br><br>

			<label>Email</label>
			<input id="email" type="text" placeholder="Enter Email">
			<br><br>

			<label>Subject</label>
			<input id="subject" type="text" placeholder=" Enter Subject">
			<br><br>

			<p>Message</p>
			<textarea id="body" rows="5" placeholder="Type Message"></textarea><!--textarea tag should be closed (In this coding UI textarea close tag cannot be used)-->
			<br><br>

			<button type="button" onclick="sendEmail()" value="Send An Email">Submit</button>
		</form>
	</center>

	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>

</body>
</html>
      