<?php 
include 'database.php';

//isset 
if ( !empty($_POST)) {
	
	$teamName_1=$_POST['teamName_1'];
	$teamName_2=$_POST['teamName_2'];
	//echo $order;
	$matchType=$_POST['matchType'];
	$matchVenue=$_POST['matchVenue'];
	//echo $version;
	$matchdate = $_POST['matchdate'];
	$timestamp = strtotime($matchdate);
	$date=date("Y-m-d H:i:s", $timestamp);
	
	$pdo = Database::connect();
	
	
	$sql = "INSERT INTO MATCH_INFO(TEAM_ID1,TEAM_ID2,IS_DAY_MATCH,VENUE,EVENT_DATE) VALUES (?,?,?,?,?)";
	$q = $pdo->prepare($sql);
	$q->execute(array($teamName_1,$teamName_2,$matchType,$matchVenue,$matchdate));
	
	
	Database::disconnect();
	
}
	

?>


