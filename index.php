<?php 
	require("config/database.php");

	$query = "SELECT * FROM tweets ORDER BY created DESC";

	$result = mysqli_query($conn, $query);

	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_free_result($result);

	mysqli_close($conn);
?>

<script>
    function showSuggestion(str){
        if(str.length == 0){
            document.getElementById("output").innerHTML = "";
        } else {
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    document.getElementById('output').innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "suggest.php?q="+str, true);
            xmlhttp.send();
        }
    }

</script>

<?php include("inc/header.php"); ?>
<div class="container">
	<div class="row">
	  	<div class="col-3">
	  		<div>
		  		<?php include("inc/nav.php"); ?>
	  		</div>
	    </div>
	    <div class="col-6 border-top-0 border border-dark">
	    	<h4>Home</h4>
	    	<br>
	    	<div>
	    		<form>
	    			<i class="bi bi-person-circle text-secondary fs-1"></i>
	    				<span class="ms-2">
	    					<input class="noBorder fs-5" type="text" placeholder="What's happening?">
	    					<i class="bi bi-globe2"></i>
	    				</span>
	    		</form>
	    	</div>
	    	<div class="overflow-auto">
	    		<?php foreach ($posts as $post): ?>
	    			<div class="">
	    				<h3><?php echo $post["author"]; ?></h3>
	    				<small><?php echo $post["created"]; ?></small>
	    				<p><?php echo $post["body"]; ?></p>
	    			</div>
	    		<?php endforeach ?>
	    	</div>
	    </div>
	    <div class="col-3">
	    	<form class="index-search-bar">
	    		<div id="searchBox" class="form-control">
	    			<i class="bi bi-search"></i>
	    			<input id="searchTextBox" type="text" onkeyup="showSuggestion(this.value)" placeholder="Search Twitter">
	    		</div>
	        	<p>
	        		<span id=output style="font-weight:bold"></span>
	        	</p>
        	</form>
	    </div>
    </div>
</div>
<?php include("inc/footer.php"); ?>
