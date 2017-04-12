<?php session_start();?>

<?php
if (count($_SESSION['deck'])>0){
	
	$addCard = array_pop($_SESSION['deck']);
	
	echo "<div class = 'cards'>"."<img src = '{$addCard}' />"."</div>";
	}
else {return 0;}	
echo count($_SESSION['deck']);
?>

