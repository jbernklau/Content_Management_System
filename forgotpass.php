<?php require_once 'header.php'; ?>
<div id="body-content">
<form method="post" action="transact-user.php">
<h1>Email Password Reminder</h1>
<p>OHH NO! Did you forgot your password? Fear not for we will send it to you, just provide your email.</p>
<p>Email address: <br/>
	<input type="text" id="email" name="email" />
</p>
<p>
	<input type="submit" class="submit" name="action" value="Send my reminder" />
</p>
</form>
<?php require_once 'footer.php'; ?>

</div>
<link rel="stylesheet" type="text/css" href="css/main.css" media="screen"/>