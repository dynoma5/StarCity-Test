<?php session_start();?>
<?php
require 'connect.php';
require 'mysql.php';
//reset hand and show new hand
for($i=1; $i<=7; $i++){
	$card = array_pop($shuffledDeck);
	echo "<div class = 'cards'>". "<img src = '{$card}'/>". "</div>";	
}

 $_SESSION['deck'] = $shuffledDeck;

?>
