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

    function showTweetPopup() {
    	let popup = document.getElementById("tweetPopup");
    	let body = document.getElementById("body");
    	body.classList.toggle("darken");
  		popup.classList.toggle("show");

    }
</script>

<?php include("inc/header.php"); ?>
<div class="container">
	<div class="row">
	  	<div class="col">
	  		<?php include("inc/nav.php"); ?>
	  		<br>
	  		<div class="popup vertical-center">
	  			<input type="button" name="tweet" value="Tweet" class="btn btn-primary" onclick="showTweetPopup()">
				  	<div class="popuptext" id="tweetPopup">
				  		<form><i class="bi bi-x"></i></form>
				  	</div>
			</div>
	    </div>
	    <div class="col">
	    	<h1>Home</h1>
	    	<div>
	    		<form>
	    			<i class="bi bi-person-circle text-dark fs-2"></i>
	    			<input type="text" placeholder="What's happening?">
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
	    <div class="col">
	    	<form class="index-search-bar">
            	<input type="text" class="form-control" onkeyup="showSuggestion(this.value)" placeholder="Search Twitter">
        	</form>
        	<p>Suggestions: 
        		<span id=output style="font-weight:bold"></span>
        	</p>
	    </div>
    </div>
</div>
<?php include("inc/footer.php"); ?>
