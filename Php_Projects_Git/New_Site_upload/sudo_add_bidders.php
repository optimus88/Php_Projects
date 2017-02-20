<?php
include('blogic.php');
$ob = new blogic();
session_start();
if(isset($_SESSION['admin']))
{
 if(isset($_POST['submit']))
 {
    
 
$playerName=$_POST['playerName'];
$teamName=$_POST['teamName'];
//echo $order;
$matchRate=$_POST['rate'];
$initialAmount=$_POST['initialAmount'];
//echo $version;
$match_details_id = $_POST['match_details_id'];
$match_date = $_POST['match_date'];
?>
<script>
var match_details_id="<?php echo $match_details_id; ?>";
</script>
<?php
//$match_details_id = $_POST['match_details_id'];
$matchBidInsertQuery = " INSERT INTO tallyworld.tally_transaction_details (tally_match_details_id_fk,tally_bidder_name,tally_team_name,tally_rate,tally_amt,tally_date_of_match) VALUES ('$match_details_id','$playerName','$teamName','$matchRate','$initialAmount','$match_date')";
$result = $ob-> insert($matchBidInsertQuery);
    if($result == "true")
    {
        echo '<script>alert("Record successfully inserted..!!!"); window.location = "match_details_player_addition.php?id=" +match_details_id </script>';
        
    }
    else
    {
        echo '<script>alert("Data Not inserted in the DB..!!!!"); window.location = "sudo_error_page.php"</script>';
    }

}
}
?>