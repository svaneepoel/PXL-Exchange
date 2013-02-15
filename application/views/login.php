<div id="container">


<h1> Login</h1>

	<?php
	
	echo form_open('login/login_validation');
	
	echo validation_errors();
	
	echo "<p>Email: ";
	echo form_input('email', $this->input->post('email'));
	echo "</p>";
	
	echo "<p>Password ";
	echo form_password('password');
	echo "</p>";

	echo "<p>";
	echo form_submit('login_submit', 'Login');
	echo "</p>";
	
	
	
	echo form_close();
	
	?>
	
	<a href='<?php echo base_url()."login/signup"; ?>'>Sign Up</a>

</div>