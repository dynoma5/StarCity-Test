
<HEAD>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link type = "text/css" rel = "stylesheet" href = "css/style.css"></link>

<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type = "text/javascript" src = "js/redirect.js"></script>
<Title>StarCityGames.com Web Developer Test</Title>
</HEAD>

<body>

<div id = 'header' class = 'page-header' style= "background-color: #337ab7;color:white;margin-top:0;padding-top:2px;">
<h1>StarCityGames.com Web Developer Test</h1>
</div>
<select id = "decks" name ="decks" class = form-control onchange ="showDeck()">
<option value = "" selected>- Choose a deck to display -</option>
<?php
require 'connect.php';
$select = "";
$decks = mysqli_query($magic, "SELECT * FROM decks");
//Display the database
	while($row = mysqli_fetch_array($decks)){
		$select .= "<option value = '{$row['deck_id']}'>" . $row['deck_name'] . "</option>";
	}
echo $select;
mysqli_close($magic);
?>
</select>

<div id = "container">

<fieldset id = "deckList">
<legend style = "font-weight:bold;border-bottom:1px solid #66afe9;">Deck List</legend>
<div id = 'title'> Deck Name: </div>
<div id = 'format'> Format: </div>

</fieldset>

<button type = 'button' id = 'drawHand' style = "visibility:hidden">New Hand</button>
<button type = 'button' id = 'addCard' style = "visibility:hidden">Draw Card</button>
<fieldset><legend style = "font-weight:bold;border-bottom:1px solid #66afe9;">Sample Hand</legend><div id = 'handCards'></div></fieldset>
<fieldset><legend style = "font-weight:bold;border-bottom:1px solid #66afe9;">Drawn Cards</legend><div id = 'newCards'></div></fieldset>
</div>
</body>