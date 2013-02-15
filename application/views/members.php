<div id="container">


<h1> Members</h1>


<?PHP

		
	echo "<pre>";

	print_r ($this->session->all_userdata());
		
	echo "</pre>";
	
	?>
	
	<a href='<?php echo base_url()."login/logout" ?>'>Logout</a>
		

</div>