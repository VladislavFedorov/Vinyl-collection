<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<title>Vinyl collection | DB</title>
	
	<link rel="stylesheet" href="css/mainpages.css">
	<link rel="stylesheet" href="css/addpanel.css">
	
	<!-- For Bootstrap -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

<div class="container">

<?php

## Information about MySQL database;

$hostname = 'localhost';	// Hostname;
$username = 'root';			// MySQL login;
$password = '';				// MySQL password;
$database = 'vinyl_bd';		// Database name;
$usertable = "collection";	// Table name;
 
$db = mysqli_connect($hostname, $username, $password, $database) or die ("ERROR: MySQL.");
mysqli_select_db($db, $database) or die ("ERROR: DB");

$query = "SELECT * FROM `$usertable`";
$resource = mysqli_query($db, $query);


include '_basic/header.php'; // HEADER


if ( isset($_POST["Band"]) ){
	
    $sql = mysqli_query( $db, "INSERT INTO `$usertable` (`collection_band`, `collection_album`, `collection_year`, `collection_version`, `collection_genre`, `collection_fortrade`, `collection_notes`)
											VALUES ( '{$_POST['Band']}', '{$_POST['Album']}', '{$_POST['Year']}', '{$_POST['Version']}', '{$_POST['Genre']}', '{$_POST['Trade']}', '{$_POST['Notes']}' )");

};  // Insert a new string into the Collection table.


include '_basic/addpanel.php'; // ADMIN PANEL
?>


<?php

echo '<table class="table table-bordered table-hover">';

echo '<thead>';
	echo '<tr class="bd-menu">';
		echo '<th>ID</th>';
		echo '<th>Band</th>';
		echo '<th>Album</th>';
		echo '<th>Year</th>';
		echo '<th>Version</th>';
		echo '<th>Genre</th>';
		echo '<th>For trade</th>';
		echo '<th>Notes</th>';
		echo '<th>-</th>';
    echo '</tr>';
echo '</thead>';


while($row = mysqli_fetch_array($resource)) {
	echo '<tbody>';
		echo '<tr class="bd-cols">';
			echo "<th>" . $row['collection_id'] . "</th>";
			echo "<th>" . $row['collection_band'] . "</th>";
			echo "<th>" . $row['collection_album'] . "</th>";
			echo "<th>" . $row['collection_year'] . "</th>";
			echo "<th>" . $row['collection_version'] . "</th>";
			echo "<th>" . $row['collection_genre'] . "</th>";
			echo "<th>" . $row['collection_fortrade'] . "</th>";
			echo "<th>" . $row['collection_notes'] . "</th>";
			echo '<th><input type="checkbox" name="option" value="y"></th>';
		echo '</tr>';
	echo '</tbody>';
};


echo '</table>';

?>


<?php 
	include '_basic/footer.php'; // FOOTER
?>


</div> <!-- /container's END -->


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>