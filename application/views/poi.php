<style>
	.zoeken {
		text-align: center;
	}
</style>
<div class="zoeken">
	<form class="form-search" action="" method="post">
		<input name="test" id="myPlaceTextBox" type="text" class="input-medium search-query">
		<button type="submit" class="btn">
			Search
		</button>
	</form>
</div>

	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		function updateDatabase(newLat, newLng)
		{
			// make an ajax request to a PHP file
			// on our site that will update the database
			// pass in our lat/lng as parameters
			$.post(
				"/poi/update", 
				{ 'newLat': newLat, 'newLng': newLng, 'var1': 'value1' }
			)
			.done(function(data) {
				alert("Database updated");
			});
		}
	</script>
	<?php echo $map['js']; ?>
<?php echo $map['html']; ?>

<div class="container">

