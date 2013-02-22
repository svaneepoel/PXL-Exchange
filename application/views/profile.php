<div class="well" style="margin:10px; display:block; float:left; width:200px;">
	
	<div style="margin:10px; width:180px; margin-left:5px; padding-right:10px; overflow:hidden;">
		<?php if(!empty($details->picture)){
			$prefix = base_url();
			echo "<img class='img-polaroid' src='$prefix/uploads/$details->picture' /><br/><br/>";
		}
		echo "<span style='font-size:14pt;'>$user->vnaam $user->anaam</span>";
		?>
		<div style="margin-top:15px; clear:left; display:block;">
			<strong>Education:</strong><br/> <?php echo $details->education; ?>
		</div>
		<div style="margin-top:15px; clear:left; display:block;">
			<strong>Hobbies:</strong><br/> <?php echo $details->hobbies; ?>
		</div>
		<div style="margin-top:15px; clear:left; display:block;">
			<strong>Social:</strong><br/>
			<?php echo !empty($details->facebook) ? "<a href='$details->facebook' target='_blank'>Facebook</a><br/>" : null; ?>
			<?php echo !empty($details->twitter) ? "<a href='$details->twitter' target='_blank'>Twitter</a>" : null; ?>
		</div>
	</div>
</div>
<div style="margin:10px; display:block; float:left; width: 600px;">
		<ul class="nav nav-tabs" id="myTab">
			<li class="active">
				<a href="#blog">Blog</a>
			</li>
			<li>
				<a href="#pictures">Pictures</a>
			</li>
			<li>
				<a href="#internship">Internship &amp; Company</a>
			</li>
		</ul>

		<div id="content" class="tab-content">
			<div class="tab-pane active" id="blog">
				<?php echo $blog; ?>
			</div>
			<div class="tab-pane" id="pictures">
				To be implemented
			</div>
			<div class="tab-pane" id="internship">
				<?php
				if(!$internship)
					echo "No information about the internship of this user";
				else 
					echo "Company name: $internship->company_name <br/><br/><strong>Description</strong><p>$internship->description</p>";
				
				?>
			</div>
		</div>

		<script>
			$(document).ready(function() {
				$('#myTab a').click(function(e) {
					e.preventDefault();
					$(this).tab('show');
				})
			});

		</script>
	</div>
</div>
