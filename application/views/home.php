<div style="text-align:center;">
	<div class='input-append' style="height:50px;">
		<input placeholder="Zoeken" type="text" style="background-color:#f9f9f9; height:40px; width: 450px; font-size:16pt;" />
		<button class='btn add-on' style="width:50px;">
			<i class="icon-search"></i>
		</button>
	</div>
</div>
</div>

<div style="text-align:center">
	<div class="well clearfix" style="background:white; margin-top:0px;">

		<h2>Most active persons on our site!</h2>
		<hr>
		<div class="row">
			<div class="span12 offset1">
				<?php
				foreach ($users as $row) {
					echo "<div class='span3'><div class='well'><img src='" . base_url() . "/uploads/" . $row['picture'] . "' height='250' width='250'><h4>";
					echo $row['vnaam'] . " " . $row['anaam'];
					echo "</h4><a href='" . base_url() . "profile/view/" . $row['id'] . "' class='btn btn-small btn-success'>More info</a></div></div>";
				}
				?>
			</div>
		</div>
	</div>

