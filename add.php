<?php session_start();?>
<link type = "text/css" rel = "stylesheet" href = "css/style.css"></link>



<?php

for($i =1; $i <=4; $i++){
	$addCard = array_pop($_SESSION['deck']);
	echo "<div class = 'cards'>"."<img src = '{$addCard}' />"."</div>";
}
echo count($_SESSION['deck']);
?>

