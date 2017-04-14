<?php session_start();?>
<?php
//adds card
if (count($_SESSION['deck'])>0){
	
	$addCard = array_pop($_SESSION['deck']);
	echo "<div class = 'cards'>"."<img src = '{$addCard}' />"."</div>";
	}

?>

