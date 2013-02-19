<div class="well" style="margin:10px; display:block; float:left; width:200px;">
	
	<div style="margin:10px; width:180px; margin-left:5px; padding-right:10px; overflow:hidden;">
		<?php if(!empty($details->picture)){
			echo "<img class='img-polaroid' src='$details->picture' />";
		}
		
		
		?>
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
				<a href="#company">About the company</a>
			</li>
		</ul>

		<div id="content" class="tab-content">
			<div class="tab-pane active" id="blog">
				<?php echo $blog; ?>
			</div>
			<div class="tab-pane" id="pictures">
				...44
			</div>
			<div class="tab-pane" id="company">
				...
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
