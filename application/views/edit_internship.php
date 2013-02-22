<?php echo form_open('profile/edit', array('class' => 'form-horizontal', 'method' => 'post')); ?>
<fieldset>
	<div id="legend" class="">
		<legend class="">
			Edit internship details
		</legend>
	</div>
		<div class="control-group">
		<label class="control-label">Company name</label>
		<div class="controls">
			<input value="<?php echo $internship_details->company_name; ?>" name="company_name" type="text">
			<?php echo form_error('company_name'); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Description</label>
		<div class="controls">
			<div class="textarea">
				<textarea name="description" class="span5" style="resize: vertical;"><?php echo $internship_details->description; ?></textarea>								
				<?php echo form_error('description'); ?>
			</div>
		</div>
	</div>
	Google maps hier
	<div class="control-group">
		<div class="controls">
			<button name="submit" type="submit" class="btn btn-success">
				Update internship details
			</button>
		</div>
	</div>

</fieldset>
<?php echo form_close(); ?>
