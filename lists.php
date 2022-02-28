<script>
    function showSuggestion(str){
        if(str.length == 0){
            document.getElementById("output").innerHTML = "";
        } else {
            //AJAX REQ
            var xmlhttp = new XMLHttpRequest();
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
	  	<div class="col">
	  		<i class="bi bi-twitter text-info fa-3x"></i>
	  		<br>
	  		<a href="index.php" class="text-dark fs-2"><i class="bi bi-house-door icon-margin-right"></i>Home</a>
	  		<br>
	  		<a href="explore.php" class="text-dark fs-2"><i class="bi bi-hash icon-margin-right"></i>Explore</a>
	  		<br>
	  		<a href="notification.php" class="text-dark fs-2"><i class="bi bi-bell icon-margin-right"></i>Notification</a>
	  		<br>
	  		<a href="messages.php" class="text-dark fs-2"><i class="bi bi-envelope icon-margin-right"></i>Messages</a>
	  		<br>
	  		<a href="bookmarks.php" class="text-dark fs-2"><i class="bi bi-bookmark icon-margin-right"></i>Bookmarks</a>
	  		<br>
	  		<a href="lists.php" class="text-dark fs-2"><i class="bi bi-card-checklist icon-margin-right"></i>Lists</a>
	  		<br>
	  		<a href="profile.php" class="text-dark fs-2"><i class="bi bi-person icon-margin-right"></i>Profile</a>
	  		<br>
	  		<a href="more.php" class="text-dark fs-2"><i class="bi bi-three-dots icon-margin-right"></i>More</a>
	    </div>
	    <div class="col">
	    	<h1>Home</h1>
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