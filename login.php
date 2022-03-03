<?php 
	require("config/database.php");

	$query = "SELECT * FROM tweets ORDER BY created DESC";

	$result = mysqli_query($conn, $query);

	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_free_result($result);

	mysqli_close($conn);
?>

<?php include("inc/header.php"); ?>
<div class="container" style="text-align: center; margin-top: 30vh;">
	<form>
		<input type="text" name="Username">
	</form>
</div>
<?php include("inc/footer.php"); ?>