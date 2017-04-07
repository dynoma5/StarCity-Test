


<?php
$host = "45.56.114.155";
$user = "db_user";
$password = "0Y8RusveQ5n1rGfwixtI";

$magic = mysqli_connect ( $host, $user, $password);
 if(mysqli_connect_errno()){
	echo "Failed to connect to MySQL: ". mysqli_connect_error();
}


$database = mysqli_select_db($magic,"db");
	
$decks = mysqli_query($magic, "SELECT * FROM decks");

//Display the database
$select = '<select name ="deck_list">';
$select.= '<option value = "" selected>- Select a deck to display -</option>';

	while($row = mysqli_fetch_array($decks)){
		$select.= "<option value = '{$row['deck_id']}'>" . $row['deck_name'] . "</option>";
	}
	
$select .= '</select>';

echo $select;
mysqli_close($magic);
?>

