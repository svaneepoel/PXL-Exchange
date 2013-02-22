<?php echo form_open('profile/edit', array('class' => 'form-horizontal', 'method' => 'post')); ?>
<fieldset>
	<div id="legend" class="">
		<legend class="">
			Edit profile
		</legend>
	</div>
	<div class="control-group">
		<label class="control-label">Hobbies</label>
		<div class="controls">
			<div class="textarea">
				<textarea name="hobbies" class="span5" style="resize: vertical;"><?php echo $user_details->hobbies; ?></textarea>								
				<?php echo form_error('hobbies'); ?>

			</div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Education</label>
		<div class="controls">
			<div class="textarea">
				<textarea name="education" class="span5" style="resize: vertical;"><?php echo $user_details->education ?></textarea>								
				<?php echo form_error('education'); ?>

			</div>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Twitter link</label>
		<div class="controls">
			<input value="<?php echo $user_details->twitter; ?>" name="twitter" type="text">
			<?php echo form_error('twitter'); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Facebook link</label>
		<div class="controls">
			<input value="<?php echo $user_details->facebook; ?>" name="facebook" type="text">
			<?php echo form_error('facebook'); ?>
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
