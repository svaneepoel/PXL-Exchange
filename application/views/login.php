<h1>Login</h1>
				<?php

				echo form_open('login/login_validation', array('class'=>'form-horizontal'));

				echo validation_errors();

				echo "<p>Email: ";
				echo form_input('email', $this -> input -> post('email'));
				echo "</p>";

				echo "<p>Password ";
				echo form_password('password');
				echo "</p>";

				echo "<p>";
				echo form_submit('login_submit', 'Login', array('class'=>'btn btn-large'));
				echo "</p>";

				echo form_close();
			?>

				<a href='<?php echo base_url() . "login/signup"; ?>'>Sign Up</a>
			<br/><br/>
			If you already have an account, you can login with Facebook:<br/>
			<a href="<?php echo base_url('login/facebook'); ?>"><img src="<?php echo base_url() . 'assets/img/facebook.png'; ?>" alt="" style="width: 200px;" /></a>
		</div>
	</div>