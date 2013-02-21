<?php echo form_open_multipart('profile/picture', array('class' => 'form-horizontal', 'method' => 'post')); ?>
<fieldset>
		<legend>
			Edit profile picture
		</legend>
		<div class="control-group">
		<label class="control-label">Profile picture</label>
		<div class="controls">
			<input type="file" name="userfile" size="20" />
			<?php echo form_error('profilepicture'); ?>
		</div>
	</div>

	<div class="control-group">
		<div class="controls">
			<button name="submit" type="submit" class="btn btn-success">
				Update profile picture
			</button>
		</div>
	</div>

</fieldset>
<?php echo form_close(); ?>
