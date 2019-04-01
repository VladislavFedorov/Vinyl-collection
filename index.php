<!DOCTYPE html>

<html lang = "en"> 
<head>
	<meta charset="utf-8">
	<title>Vinyl collection</title>
	
	<link rel="stylesheet" href="css/mainpages.css">
	<link rel="stylesheet" href="css/addpanel.css">
	
	<!-- For Bootstrap -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

<div class="container">

<?php

#########################
##   MySQL's information:

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'vinyl_bd';
$collectiontable = "collection";
$wantedtable = "wantedlist";
									 
 
$db = mysqli_connect($hostname, $username, $password, $database) or die ("ERROR: MySQL.");
mysqli_select_db($db, $database) or die ("ERROR: DB");

$query = "SELECT * FROM `$collectiontable`";
$resource = mysqli_query($db, $query);
#######################################

include 'includes/header.php'; ## Header


if ( isset($_POST["add-to-collection"]) ){
	## Insert a new string into the Collection table.
	
    $sql = mysqli_query( $db, "INSERT INTO `$collectiontable` (`collection_band`, `collection_album`, `collection_year`, `collection_version`, `collection_genre`, `collection_fortrade`, `collection_notes`) VALUES ( '{$_POST['Band']}', '{$_POST['Album']}', '{$_POST['Year']}', '{$_POST['Version']}', '{$_POST['Genre']}', '{$_POST['Trade']}', '{$_POST['Notes']}' )");

} elseif ( isset($_POST["add-to-wanted-list"]) ){
	## Insert a new string into the Wanted list table.
	
    $sql = mysqli_query( $db, "INSERT INTO `$wantedtable` (`wl_band`, `wl_album`, `wl_year`, `wl_version`, `wl_genre`, `wl_fortrade`, `wl_notes`) VALUES ( '{$_POST['Band']}', '{$_POST['Album']}', '{$_POST['Year']}', '{$_POST['Version']}', '{$_POST['Genre']}', '{$_POST['Trade']}', '{$_POST['Notes']}' )");
	
} elseif ( isset($_POST['id']) ){
	## Delete a new string from the Collection table.
	
    $sql = mysqli_query( $db, "DELETE FROM `$collectiontable` WHERE `collection_id` = '{$_POST['id']}'");
};


include 'includes/addpanel.php'; ## Admin panel

?>

<!-- Header of the Collection table -->

<div class="table-responsive">
<table class="table table-bordered table-hover table-sm" id="grid">

<thead>
	<tr class="bd-menu">
		<th data-type="number">ID</th>
		<th data-type="string">Band</th>
		<th data-type="string">Album</th>
		<th data-type="string">Year</th>
		<th data-type="string">Version</th>
		<th data-type="string">Genre</th>
		<th data-type="string">For trade</th>
		<th data-type="string">Notes</th>
		<th data-type="string">Delete</th>
    </tr>
</thead>

<?php

## Body of the Collection table

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
		
			echo "<form method='post' action=''>";
				echo "<th>";
					echo "<button type='submit' class='btn btn-outline-danger' name='id' value='" . $row["collection_id"] . "'> X </button>";
				echo "</th>";
			echo "<form>";	
			
		echo '</tr>';
		
	echo '</tbody>';	
};


echo '</table>';
echo '</div>';

	include 'includes/footer.php'; ## Footer
?>


</div> <!-- /container's END -->

<?php
	include 'includes/search.php'; ## Search
?>

<script>
    var grid = document.getElementById('grid');

    grid.onclick = function(e) {
      if (e.target.tagName != 'TH') return;
      sortGrid(e.target.cellIndex, e.target.getAttribute('data-type'));
    };

    function sortGrid(colNum, type) {
      var tbody = grid.getElementsByTagName('tbody')[0];

      var rowsArray = [].slice.call(tbody.rows);

      var compare;

      switch (type) {
        case 'number':
          compare = function(rowA, rowB) {
            return rowA.cells[colNum].innerHTML - rowB.cells[colNum].innerHTML;
          };
          break;
        case 'string':
          compare = function(rowA, rowB) {
            return rowA.cells[colNum].innerHTML > rowB.cells[colNum].innerHTML;
          };
          break;
      }

      rowsArray.sort(compare);

      grid.removeChild(tbody);

      for (var i = 0; i < rowsArray.length; i++) {
        tbody.appendChild(rowsArray[i]);
      }

      grid.appendChild(tbody);

    }
 </script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>