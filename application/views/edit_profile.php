<?php echo form_open_multipart('profile/edit', array('class' => 'form-horizontal', 'method' => 'post')); ?>
<fieldset>
	<div id="legend" class="">
		<legend class="">
			Edit profile
		</legend>
	</div>
	<div class="control-group">
		<label class="control-label">First name (required)</label>
		<div class="controls">
			<input value="<?php echo set_value('first_name'); ?>" name="first_name" type="text">
			<?php echo form_error('first_name'); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Last name (required)</label>
		<div class="controls">
			<input value="<?php echo set_value('last_name'); ?>" name="last_name" type="text">
			<?php echo form_error('last_name'); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Birth date</label>
		<div class="controls">
			<input value="<?php echo set_value('last_name'); ?>" name="last_name" type="text">
			<?php echo form_error('last_name'); ?>
			<div class="help-block">
				Please use the following format: yyyy-mm-dd
			</div>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Hobbies</label>
		<div class="controls">
			<div class="textarea">
				<textarea  value="<?php echo set_value('hobbies'); ?>" name="hobbies" class="span5" style="resize: vertical;"></textarea>								
				<?php echo form_error('hobbies'); ?>

			</div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Education</label>
		<div class="controls">
			<div class="textarea">
				<textarea  value="<?php echo set_value('education'); ?>" name="hobbies" class="span5" style="resize: vertical;"></textarea>								
				<?php echo form_error('education'); ?>

			</div>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Twitter link</label>
		<div class="controls">
			<input value="<?php echo set_value('twitter'); ?>" name="twitter" type="text">
			<?php echo form_error('twitter'); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Facebook link</label>
		<div class="controls">
			<input value="<?php echo set_value('facebook'); ?>" name="facebook" type="text">
			<?php echo form_error('facebook'); ?>
		</div>
	</div>
	
		<div class="control-group">
		<label class="control-label">Profile picture</label>
		<div class="controls">
			<input type="file" name="profilepicture" size="20" />
			<div class="help-block">
				Leave blank if you want to keep your old profile picture
			</div>
			<?php echo form_error('profilepicture'); ?>
		</div>
	</div>

	<div class="control-group">
		<div class="controls">
			<button name="submit" type="submit" class="btn btn-success">
				Update profile
			</button>
		</div>
	</div>

</fieldset>
<?php echo form_close(); ?>
