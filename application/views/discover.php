<style>
	.zoeken {
		text-align: center;
	}
</style>
<div class="zoeken">
	<form class="form-search" action="view" method="post">
		<input name="test" id="myPlaceTextBox" type="text" class="input-medium search-query">
		<button type="submit" class="btn">
			Search
		</button>
	</form>
</div>
<script type="text/javascript">
		var centreGot = false;
	</script>
<?php echo $map['js']; ?>
<?php echo $map['html']; ?>
<div class="container">

