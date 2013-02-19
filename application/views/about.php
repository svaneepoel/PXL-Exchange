		<div style="text-align:center;">
			<div class='input-append' style="height:50px;">
				<div class="page-header">
					<h1>PXL-Exchange <small>About us</small></h1>
				</div>

			</div>
		</div>
		<br/>

		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>

		<blockquote>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</blockquote>
		<blockquote>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</blockquote>
		
		<!--form class="form-horizontal" action="view" method="post"-->
			<?php echo form_open('form'); ?>
			<fieldset>
				<div id="legend" class="">
					<legend class="">
						Contact us!
					</legend>
				</div>
				<div class="control-group">

					<!-- Text input-->
					<label class="control-label" for="input01">Full Name</label>
					<div class="controls">
						
						<input  value="<?php echo set_value('name'); ?>" name="naam" type="text" placeholder="John Doe" class="input-xlarge span5">
						<?php echo form_error('name'); ?><p class="help-block"></p>
					</div>
				</div>

				<div class="control-group">

					<!-- Text input-->
					<label class="control-label" for="input01">Email</label>
					<div class="controls">
						
						<input  value="<?php echo set_value('email'); ?>" name="emailadres" type="text" placeholder="me@example.com" class="input-xlarge span5">
						<?php echo form_error('email'); ?><p class="help-block">
							We would like to contact you back!
						</p>
					</div>
				</div>

				<div class="control-group">

					<!-- Textarea -->
					<label class="control-label">Message</label>
					<div class="controls">
						<div class="textarea">
							
							<textarea  value="<?php echo set_value('message'); ?>" name="bericht" type="" class="span5" style="resize: vertical;"> </textarea>
						<?php echo form_error('message'); ?></div>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<!-- Multiple Checkboxes -->
						<label class="checkbox">
							<input type="checkbox" value="Send me a copy!">
							Send me a copy! </label>
					</div>

				</div>
				<div class="control-group">
					<label class="control-label"></label>

					<!-- Button -->
					<div class="controls">
						<button name="submit" type="submit" class="btn btn-success">
							Send
						</button>
					</div>
				</div>

			</fieldset>
		</form>
