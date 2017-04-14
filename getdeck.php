<?php session_start();?>

<fieldset id = "deckList"><legend style = "font-weight:bold;border-bottom:1px solid #66afe9;">Deck List</legend>
<?php
require 'connect.php';
require 'mysql.php';

echo "<div id = 'title'>". "Deck Name: ". $info['deck_name']."</div>";
echo "<div id = 'format'>". "Format: ". $info['deck_format']. "</div>";

//For Creatures
if($creature_count >0){
	echo "<div class = 'cardtype'>" ."Creatures(" . $creature_count . ")" . "</div>";
	
	$cards = mysqli_query($magic, $creature_filter )
	or die($magic."<br/><br/>".mysqli_error());

	while($row = mysqli_fetch_array($cards)){
		echo  "<a href=''>" ."<p class = 'name_qty'>" .$row['qty'] . "x " . $row['card_name'].
		"</p>"."<span id = 'hovImg'>"."<img src = '{$row['card_image']}' id = 'image'/>" . "</span>". "</a>";
		}	
}

//For Planeswalkers
if($planeswalker_count > 0){
	echo "<div class = 'cardType'>" . "Planeswalkers(" . $planeswalker_count . ")" . "</div>";

	$cards = mysqli_query($magic, $planeswalker_filter)
	or die($magic . "<br/><br/>" . mysqli_error());

	while($row = mysqli_fetch_array($cards)){
		echo  "<a href=''>" . "<p class = 'name_qty'>" .$row['qty'] . "x " . $row['card_name']."</p>".
		"<span id = 'hovImg'>"."<img src = '{$row['card_image']}' id = 'image'/>" . "</span>". "</a>";
	}	
}

//Spells
if($spell_count >0){
	echo "<div class = 'cardType'>" . "Spells(" . $spell_count . ")" . "</div>";

	$cards = mysqli_query($magic, $spell_filter)
	or die($magic . "<br/><br/>" . mysqli_error());

	while($row = mysqli_fetch_array($cards)){
		echo  "<a href=''>" . "<p class = 'name_qty'>" .$row['qty'] . "x " . $row['card_name']."</p>". 
		"<span id = 'hovImg'>" . "<img src = '{$row['card_image']}' id = 'image'/>" . "</span>". "</a>";
	}	
}

//Lands
if($land_count >0){
	echo "<div class = 'cardType'>" . "Lands(" . $land_count . ")" . "</div>" ;

	$cards = mysqli_query($magic, $land_filter)
	or die($magic . "<br/><br/>" . mysqli_error());

	while($row = mysqli_fetch_array($cards)){
		echo  "<a href=''>" ."<p class = 'name_qty'>" . $row['qty'] . "x " . $row['card_name']."</p>".
		"<span id = 'hovImg'>" ."<img src = '{$row['card_image']}' id = 'image'/>" . "</span>". "</a>";
	}
}	
mysqli_close($magic);
?></fieldset>


<?php 
//buttons for populating cards
echo "<button type = 'button' id = 'drawHand' class = 'btn-primary' value = '{$q}' onclick = 'showHands()'>". "New Hand". "</button>";
echo "<button type = 'button' id = 'addCard' value = '' class = 'btn-primary' onclick = 'addHand()'>". "Draw Card". "</button>";
?>

<fieldset><legend style = "font-weight:bold;border-bottom:1px solid #66afe9;">Sample Hand</legend><div id = 'handCards'>

<?php 
//method to show hand
for($i=1; $i<=7; $i++){
	$card = array_pop($shuffledDeck);
	echo "<div class = 'cards'>". "<img src = '{$card}'/>". "</div>";
}
$_SESSION['deck'] = $shuffledDeck;
?>
</div></fieldset>

<fieldset><legend style = "font-weight:bold;border-bottom:1px solid #66afe9;">Drawn Cards</legend><div id = 'newCards'></div></fieldset>