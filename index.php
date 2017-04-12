
<HEAD>
<link type = "text/css" rel = "stylesheet" href = "css/style.css"></link>
<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script type = "text/javascript" src = "js/test.js"></script>
<Title>StarCityGames.com Web Developer Test</Title>
</HEAD>
<body>
<h1>StarCityGames.com Web Developer Test</h1>

<select id = "decks" name ="decks" onchange ="showDeck()">
<option value = "" selected>- Choose a deck to display -</option>

<?php
require 'connect.php';

$decks = mysqli_query($magic, "SELECT * FROM decks");
//Display the database
	while($row = mysqli_fetch_array($decks)){
		$select.= "<option value = '{$row['deck_id']}'>" . $row['deck_name'] . "</option>";
	}
echo $select;
mysqli_close($magic);
?>

</select>


<div id = "deckList"></div>
</body>