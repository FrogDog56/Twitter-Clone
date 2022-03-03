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
	  		<?php include("inc/nav.php"); ?>
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