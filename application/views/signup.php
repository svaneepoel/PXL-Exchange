<div id="container">


<h1> Sign Up</h1>

	<?php
	
		echo form_open('login/signup_validation');
		
		echo validation_errors();
		
		echo "<p> Voornaam: ";
		echo form_input('vnaam', $this->input->post('vnaam'));
		echo "</p>";

		echo "<p> Achternaam: ";
		echo form_input('anaam', $this->input->post('anaam'));
		echo "</p>";

		echo "<p> Email: ";
		echo form_input('email', $this->input->post('email'));
		echo "</p>";

		echo "<p> Password: ";
		echo form_password('password');
		echo "</p>";

		echo "<p> Confirm Password: ";
		echo form_password('cpassword');
		echo "</p>";

		echo "<p>";
		echo form_submit('signup_submit', 'Sign Up!');
		echo "</p>";
		
		echo form_close();
	
	
	
	
	
	
	
	
	?>

</div>