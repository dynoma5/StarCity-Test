
<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js">

function showDeck(){

	var decks = document.getElementById('decks').value;
	
	if (decks ==""){
		document.getElementById("cardList").innerHTML = "f";
		return;
	}
	else{
		if (window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}
		
		else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				document.getElementById("cardList").innerHTML = this.responseText;
			
			}
		};
		
	xmlhttp.open("GET", "getdeck.php?q="+decks,true);
	xmlhttp.send();		
	
	}
}

</script>

<select id = "decks" name ="decks" onchange ="showDeck()">
<option value = "" selected>- Select a deck to display -</option>

<?php
require 'connect.php';

$database = mysqli_select_db($magic,"db");
$decks = mysqli_query($magic, "SELECT * FROM decks");
//Display the database
	while($row = mysqli_fetch_array($decks)){
		$select.= "<option value = '{$row['deck_id']}'>" . $row['deck_name'] . "</option>";
	}
echo $select;
mysqli_close($magic);
?>

</select>

<div id = "cardList"></div>
