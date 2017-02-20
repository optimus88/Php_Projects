<?php
//session_start();
//if(isset($_SESSION['admin']))
//{
include ('sudo_header.php');
//}
?>

<?php 

include 'database.php';
$pdo = Database::connect();
$sql = 'SELECT  EVENT_DATE,T1.NAME as TEAM1,T2.NAME as TEAM2,VENUE,MATCH_ID ,TEAM_ID1 ,TEAM_ID2,IS_DAY_MATCH,
		HAS_TEAM1_WON
		FROM
		MATCH_INFO MD
		LEFT JOIN TEAM_INFO T1 ON T1.TEAM_ID = MD.TEAM_ID1
		LEFT JOIN TEAM_INFO T2 ON T2.TEAM_ID = MD.TEAM_ID2';
echo "<table class='match-list'>";
echo "<tr>";
echo "<td>S.No.</td><td>Date</td><td>Team1</td><td>Team2</td><td>Venue</td><td>DayNight</td><td>Result</td>";
echo "</tr>";

$i=0;
foreach ($pdo->query($sql) as $row) {
	echo '<tr>';
	echo '<td>'.++$i . '</td>';
	echo '<td>'. $row['EVENT_DATE'] . '</td>';
	echo '<td>'. $row['TEAM1'] . '</td>';
	echo '<td>'. $row['TEAM2'] . '</td>';
	echo '<td>'. $row['VENUE'] . '</td>';
	echo '<td>'. $row['IS_DAY_MATCH'] . '</td>';
	echo '<td>'. ($row['HAS_TEAM1_WON']==""?'N/A':$row['HAS_TEAM1_WON'])  . '</td>';
	echo '</tr>';
}
echo "</table>";

Database::disconnect();
?>
<div class="add_match">
	<input type="button" value="add match" name="add_match" onclick=window.open("addMatchDetail.php","demo","width=750,height=300,left=150,top=200,toolbar=0,status=0,"); />
</div>




<?php include ('sudo_footer_1.php'); ?>