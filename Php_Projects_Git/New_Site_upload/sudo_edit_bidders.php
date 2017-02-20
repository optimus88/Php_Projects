<?php
session_start();
if(isset($_SESSION['admin']))
{
include ('sudo_header.php');
include('blogic.php');
$ob = new blogic();
$transactionID=$_POST["tally_transc_id"];
$rate=$_POST["rate"];
$initialAmount=$_POST["initialAmount"];
$updateQuery="UPDATE tally_transaction_details SET tally_rate=$rate, tally_amt=$initialAmount WHERE tally_transc_id=$transactionID";
echo $updateQuery;
$updateResult=$ob-> update_result($updateQuery);
echo "Result of the updateQuery $updateResult";
if ($updateResult > 0 )
            {
                echo '<script>alert("Details Updated..!!!!"); window.location = "match_list.php"</script>';
            }
            else
                {
                    
                    echo '<script>alert("Could Not update Result..!!!!"); window.location = "sudo_error_page.php"</script>';
                }
}
?>