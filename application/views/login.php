<div id="container">


<h1> Login</h1>

	<?php
	
	echo form_open('login/login_validation');
	
	echo "<p>Email: ";
	echo form_input('email');
	echo "</p>";
	
	echo "<p>Password ";
	echo form_password('password');
	echo "</p>";

	echo "<p>";
	echo form_submit('login_submit', 'Login');
	echo "</p>";
	
	
	
	echo form_close();
	
	?>

</div>