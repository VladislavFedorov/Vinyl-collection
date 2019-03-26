<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'vinyl_bd';
$collectiontable = "collection";
$wantedtable = "wantedlist";

$search_q = $_POST['search_q'];
$l= mysqli_connect($hostname, $username, $password, $database) or die ("ERROR: MySQL.");

$search_q = trim($search_q);
$search_q = strip_tags($search_q);

$q= mysqli_query($l, "SELECT `collection_band` FROM `$collectiontable` WHERE `collection_band` LIKE '%$search_q%'");
$itog=mysqli_fetch_assoc($q);

 while ($itog = mysqli_fetch_assoc($q)) {
	printf("%s (%s)\n",$r["title_value"],$r["content"]);
 };
 
 mysqli_free_result($q);
  mysqli_close($l);