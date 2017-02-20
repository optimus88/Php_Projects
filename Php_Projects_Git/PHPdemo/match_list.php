<?php
include 'database.php';
$pdo = Database::connect();	
$sql = 'SELECT  MATCH_ID ,TEAM_ID1 ,T1.NAME,TEAM_ID2,T2.NAME,IS_DAY_MATCH,VENUE,EVENT_DATE,
		HAS_TEAM1_WON 
		FROM 
		MATCH_INFO MD
		LEFT JOIN TEAM_INFO T1 ON T1.TEAM_ID = MD.TEAM_ID1
		LEFT JOIN TEAM_INFO T2 ON T2.TEAM_ID = MD.TEAM_ID2';
foreach ($pdo->query($sql) as $row) {
	echo '<tr>';
	echo '<td>'. $row['MATCH_ID'] . '</td>';
	echo '<td>'. $row['TEAM_ID1'] . '</td>';
	echo '<td>'. $row['NAME'] . '</td>';
	echo '</tr>';
}
Database::disconnect();

?>