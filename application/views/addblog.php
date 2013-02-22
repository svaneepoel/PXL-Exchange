<?php echo form_open('blog/create', array(
	'class' => 'form-horizontal',
	'method' => 'post'
));
?>
<fieldset>
	<div id="legend" class="">
		<legend class="">
			Add blog post
		</legend>
	</div>
	<div class="control-group">
		<label class="control-label">Title</label>
		<div class="controls">
			<div class="textarea">
				<input type="text" name="title" value="<?php echo $this -> input -> post('title'); ?>" />
				<?php echo form_error('title'); ?>
			</div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Content</label>
		<div class="controls">
			<div class="textarea">
				<textarea name="content" class="span5" style=" height: 200px; resize: vertical;"><?php echo $this -> input -> post('content'); ?></textarea>												
				<?php echo form_error('content'); ?>
			</div>
		</div>
	</div>
		<div class="control-group">
		<div class="controls">
			<button name="submit" type="submit" class="btn btn-success">
				Add blog
			</button>
		</div>
	</div>
</fieldset>
<?php echo form_close(); ?>
