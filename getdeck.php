<?php session_start();?>
<link type = "text/css" rel = "stylesheet" href = "css/style.css"></link>
<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script type = "text/javascript" src = "js/test.js"></script>

<div id = "cardList">

<?php
require 'connect.php';
require 'mysql.php';


echo "<div id = 'title'>". "Deck name: ". $info['deck_name']."</div>";
echo "<div id = 'format'>". "Format: ". $info['deck_format']. "</div>";

//For Creatures

if($creature_count >0){
	echo "<div class = 'title'>" ."Creatures(" . $creature_count . ")" . "</div>";
	
	$cards = mysqli_query($magic, $creature_filter )
	or die($magic."<br/><br/>".mysqli_error());

	while($row = mysqli_fetch_array($cards)){
		echo  "<a href=''>" . $row['qty'] . "x " . $row['card_name']. "<span id = 'hovImg'>"
		."<img src = '{$row['card_image']}' id = 'image'/>" . "</span>". "</a>" . "<br/>";
		}	
}

//For Planeswalkers

if($planeswalker_count > 0){
	echo "<div class = 'title'>" . "Planeswalkers(" . $planeswalker_count . ")" . "</div>";

	$cards = mysqli_query($magic, $planeswalker_filter)
	or die($magic . "<br/><br/>" . mysqli_error());

	while($row = mysqli_fetch_array($cards)){
		echo  "<a href=''>" . $row['qty'] . "x " . $row['card_name']. "<span id = 'hovImg'>"
		."<img src = '{$row['card_image']}' id = 'image'/>" . "</span>". "</a>" . "<br/>";
	}	
}

//Spells


if($spell_count >0){
	echo "<div class = 'title'>" . "Spells(" . $spell_count . ")" . "</div>";

	$cards = mysqli_query($magic, $spell_filter)
	or die($magic . "<br/><br/>" . mysqli_error());

	while($row = mysqli_fetch_array($cards)){
		echo  "<a href=''>" . $row['qty'] . "x " . $row['card_name']. "<span id = 'hovImg'>" 
		."<img src = '{$row['card_image']}' id = 'image'/>" . "</span>". "</a>" . "<br/>";
	}	
}
//Lands

echo "<div class = 'title'>" . "Lands(" . $land_count . ")" . "</div>" ;

$cards = mysqli_query($magic, $land_filter)
or die($magic . "<br/><br/>" . mysqli_error());

while($row = mysqli_fetch_array($cards)){
	echo  "<a href=''>" . $row['qty'] . "x " . $row['card_name']. "<span id = 'hovImg'>" 
		."<img src = '{$row['card_image']}' id = 'image'/>" . "</span>". "</a>" . "<br/>";
}	
mysqli_close($magic);
?>
</div>
<?php 


echo "<button type = 'button' id = 'drawCards' value = '{$q}' onclick = 'showHands()'>". "New Hand". "</button>";
echo "<button type = 'button' id = 'addCard' value = '' onclick = 'addHand()'>". "Draw Card". "</button>";
?>
<div id = 'cardHands'>
<?php 
for($i=1; $i<=7; $i++){
	$card = array_pop($shuffledDeck);
	echo "<div class = 'cards'>". "<img src = '{$card}'/>". "</div>";
}
$_SESSION['deck'] = $shuffledDeck;
?>
</div>
<div id = 'addHands'></div>

