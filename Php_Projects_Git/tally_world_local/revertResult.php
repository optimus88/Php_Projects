<?php
session_start();
if(isset($_SESSION['admin']))
{
    include ('sudo_header.php');
    include('blogic.php');
    $ob = new blogic();
    if(isset($_POST['revert_result']))
        {
            $match_id = $_POST["match_details_id_list"];
            //echo $match_id;
            $matchDetailsQuery = "UPDATE tally_match_details SET `tally_match_flag`=0, `tally_match_winner_team`=0 WHERE `match_details_id`='$match_id'";
            $transactionDetailsQuery = "UPDATE tally_transaction_details SET tally_transc_flag=0, tally_match_result=0 WHERE tally_match_details_id_fk='$match_id'";
            $netTransactionQuery = "DELETE FROM tally_net_transaction where tally_net_match_details_id_fk='$match_id'";
            $resultMatchDetailsQuery = $ob-> update_result($matchDetailsQuery);
            $resultTransactionDetailsQuery = $ob-> update_result($transactionDetailsQuery);
            $resultNetTransactionQuery = $ob-> update_result($netTransactionQuery);
            if ($resultMatchDetailsQuery == 'true' && $resultTransactionDetailsQuery == 'true' && $resultTransactionDetailsQuery == 'true' )
                {
                    echo '<script>alert("Transaction has been executed successfully..!!"); window.location = "match_details_player_addition.php?id=' . $match_id .'"</script>';
                }
            else
                {
                    echo '<script>alert("Sorry..!!! SomeError Occoured.. Please verify manually"); window.location = "match_list.php"</script>';
                }
            }
}
else
            {
                echo '<script>alert("Sorry..!!! SomeError Occoured.. admin error"); window.location = "match_list.php"</script>';
            }

?>