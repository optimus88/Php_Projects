<?php
session_start();
if(isset($_SESSION['admin']))
{
include ('sudo_header.php');
include('blogic.php');
$ob = new blogic();
if(isset($_POST['edit_submit']))
{
$transactionID=$_POST["tally_transc_id"];
$rate=$_POST["rate"];
$event=$_POST["event"];
$initialAmount=$_POST["initialAmount"];
$updateQuery="UPDATE tally_transaction_details SET tally_rate=$rate, tally_amt=$initialAmount WHERE tally_transc_id=$transactionID";
//echo $updateQuery;
$updateResult=$ob-> update_result($updateQuery);
//echo "Result of the updateQuery $updateResult";
if ($updateResult > 0 )
            {
                echo '<script>alert("Details Updated..!!!!"); window.location = "match_list.php"</script>';
            }
            else
                {
                    
                    echo '<script>alert("Could Not update Result..!!!!"); window.location = "sudo_error_page.php"</script>';
                }
}
else
    {
        $transactionID=$_GET["transc_id"];
        $getMatch_ID=$_GET["m_id"];
        $deleteQuery="DELETE FROM tally_transaction_details WHERE tally_transc_id=$transactionID";
        $resultDeleteQuery=$ob-> update_result($deleteQuery);
        if ( $resultDeleteQuery == 'true' )
           {
               echo '<script>alert("Transaction has been executed successfully..!!"); window.location = "match_details_player_addition.php?id=' . $getMatch_ID .'"</script>';
           }
        else
            {
               echo '<script>alert("Sorry..!!! Could not delete the Bidder..!!!"); window.location = "match_list.php"</script>';
            }
        
    }
}
else
{
    include ('index.php');
}

?>