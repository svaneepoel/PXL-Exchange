<?php echo $jquery; ?>
<div style="text-align:center;">
	<div class='input-append' style="height:50px;">
		<div class="page-header">
			<h1>Administrator <small>Panel</small></h1>
		</div>

	</div>
</div>
<br/>

<ul class="nav nav-tabs" id="myTab">
	<li>
		<a href="#approve">Approve</a>
	</li>
	<li>
		<a href="#statistics">Statistics</a>
	</li>
	<li>
		<a href="#settings">Settings</a>
	</li>
</ul>
<div class="tab-content">
	<div class="tab-pane fade in active" id="approve">
		<?php
		echo "<table class='table .table-striped'>";
		
		foreach ($users as $row) {
			if ($row['is_active'] == 0) {
				echo "<tr class='error'>";
			} else {
				echo "<tr class='success'>";
			}
			echo "<td>";
			echo $row['id'];
			echo "</td><td>";
			echo $row['vnaam'];
			echo " ";
			echo $row['anaam'];
			echo "</td><td>";
			echo $row['email'];
			echo "</td>";
			if ($row['is_active'] == 0) {
				echo "<td>";
				echo "<a class='btn btn-small btn-success' href='".base_url()."admin/approve/" . $row['id'] . "'?>Approve</a>";
				echo " ";
				echo "<a class='btn btn-small btn-warning' href='".base_url()."admin/refuse/" . $row['id'] . "'?>Refuse</a>";
				echo "</td>";
			} else {
				if ($row['is_active']==2){
				echo "<td><button class='btn btn-small btn-inverse disabled' disabled='disabled'>Admin</button></td>";
				}
				else {
					echo "<td><a class='btn btn-small btn-danger' href='".base_url()."admin/refuse/" . $row['id'] . "'?>Delete</a></td>";
				}
			}
			echo "</tr>";
		}

		echo "</table>";
		?>
	</div>

	<div class="tab-pane fade in" id="statistics">
		<?php

		echo "Aantal gebruikers geregistreerd: <span class='badge badge-info'>" . $countusers ."</span>";
		echo "<br/>Waarvan gebruikers goedgekeurd: <span class='badge badge-success'>";
		
		echo $countapprovedusers."</span>";
		?>
	</div>
	<div class="tab-pane fade in" id="settings">

		<form action="" method="post" class="form-horizontal">
			<?php echo validation_errors(); ?>
			<fieldset>
				<div id="legend" class="">
					<legend class="">
						Settings
					</legend>
				</div>
				<div class="control-group">

					<label class="control-label" for="input01">Old password</label>
					<div class="controls">
						<input name="oldpassword" type="password" class="input-xlarge">

					</div>
				</div>

				<div class="control-group">

					<label class="control-label" for="input01">New password</label>
					<div class="controls">
						<input name="newpassword" type="password" class="input-xlarge">

					</div>
				</div>

				<div class="control-group">

					<label class="control-label" for="input01">Repeat new password</label>
					<div class="controls">
						<input name="repeatpassword" type="password" class="input-xlarge">

					</div>
				</div>
				<div class="control-group">

					<div class="controls">
						<button  name="changepassword" type="submit" class="btn btn-success">
							Save
						</button>
					</div>
				</div>

			</fieldset>
		</form>

	</div>
</div>
<script>
	$('#myTab a').click(function(e) {
		e.preventDefault();
		$(this).tab('show');
	})
	/*$('#myTab a:last').tab('show');
	$('#myTab a:first').tab('show'); */
</script>

