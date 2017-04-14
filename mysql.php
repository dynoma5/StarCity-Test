<?php
require 'connect.php';

$q = intval($_GET['q']);

$decks = mysqli_query($magic, "SELECT * FROM decks WHERE deck_id = $q") or die($magic."<br/><br/>".mysqli_error());

$info = mysqli_fetch_array($decks);
// MySQL Filters to separate card types

$creature_filter = "SELECT * FROM decks_to_cards JOIN cards on decks_to_cards.card_id = cards.card_id WHERE deck_id = $q AND (card_type = 'Creature' OR card_type = 'Artifact Creature' OR card_type = 'Legendary Creature'
OR card_type = 'Enchantment Creature' OR card_type = 'Legendary Enchantment Creature' OR card_type = 'Legendary Artifact Creature')";

$planeswalker_filter = "SELECT * FROM decks_to_cards JOIN cards on decks_to_cards.card_id = cards.card_id WHERE deck_id = $q AND (card_type = 'Planeswalker')";

$land_filter = "SELECT * FROM decks_to_cards JOIN cards on decks_to_cards.card_id = cards.card_id WHERE deck_id = $q AND (card_type = 'Legendary Land' OR card_type = 'Basic Land' OR card_type = 'Land Creature' OR card_type = 'Land')";

$spell_filter = "SELECT * FROM decks_to_cards JOIN cards on decks_to_cards.card_id = cards.card_id WHERE deck_id = $q AND (card_type = 'Artifact' OR card_type = 'Enchantment' OR card_type = 'Instant' OR card_type = 'Legendary Artifact'
OR card_type = 'Legendary Enchantment' OR card_type = 'Sorcery' OR card_type = 'Tribal Instant')";

// Declaration of Variables
$creature_count = 0;
$planeswalker_count = 0;
$land_count = 0;
$spell_count = 0;
$array = array(); //used to populate the deck

//For Creatures
$counter_creature = mysqli_query($magic, $creature_filter)
or die($magic."<br/><br/>".mysqli_error());

while($row = mysqli_fetch_array($counter_creature)){
	$creature_count = $creature_count + $row['qty'];
	
	for($i = 1; $i <= $row['qty']; $i++){
		$array[] = $row['card_image'];
	}
}

//For Planeswalkers
$counter_planeswalker = mysqli_query($magic, $planeswalker_filter)
or die($magic . "<br/><br/>" . mysqli_error());

while($row = mysqli_fetch_array($counter_planeswalker)){
	$planeswalker_count = $planeswalker_count + $row['qty'];
	
	for($i = 1; $i <= $row['qty']; $i++){
		$array[] = $row['card_image'];
	}
}

//Spells
$counter_spell = mysqli_query($magic, $spell_filter)
or die($magic . "<br/><br/>" . mysqli_error());

while($row = mysqli_fetch_array($counter_spell)){
	$spell_count = $spell_count + $row['qty'];
	
	for($i = 1; $i <= $row['qty']; $i++){
		$array[] = $row['card_image'];
	}
}

//Lands
$counter_land = mysqli_query($magic, $land_filter)
or die($magic . "<br/><br/>" . mysqli_error());

while($row = mysqli_fetch_array($counter_land)){
	$land_count = $land_count + $row['qty'];
	for($i = 1; $i <= $row['qty']; $i++){
		$array[] = $row['card_image'];
	}
}

//shuffle deck after population is complete
$shuffledDeck = array();
$total = count($array)-1;
$removedCard = $total;
for($i = 0; $i <= $total; $i++){
	$randNum = rand(0,$removedCard);
	$shuffledDeck[] = $array[$randNum];
	unset($array[$randNum]);
	$array = array_values($array);
	$removedCard = $removedCard - 1;
}
?>