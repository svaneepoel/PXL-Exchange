<?php
echo 'Please fill in your details <br/>';
$base_url = base_url();


echo form_open($base_url.'registration');
	$naam = array (
	
		'naam' 		=> 'reg_naam',
		'value' 	=> ''
		);
		
	$voornaam = array (
		'voornaam' 	=> 'reg_voornaam',
		'value' 	=> ''
		);

	$email = array (
		'email' 	=> 'reg_email',
		'value'		=> ''
		);
	
	$pw = array (
		'pw'		=> 'reg_pw',
		'value'		=> ''
		);
		
?>
<ul> 
	<li>
	<label> Naam </label> 
	<div>
		<?php echo form_input($naam);?>
	</div>
	</li>
	<li>
	<label> Voornaam </label> 
	<div>
		<?php echo form_input($pw);?>
	</div>
	</li>
	
	<li>
	<label> Emailadres </label> 
	<div>
		<?php echo form_input($email);?>
	</div>
	</li>
	
	<li>
	<label> Wachtwoord </label> 
	<div>
		<?php echo form_password($pw);?>
	</div>
	</li>
	
	
	<li>
	<div> 
		<?php echo form_submit(array('reg' => 'register'), 'Register')?>
	</div>
	</li>
</ul>
	
<?php echo form_close();?>