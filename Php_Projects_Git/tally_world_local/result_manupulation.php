<?php
session_start();
if(isset($_SESSION['admin']))
{
    include('blogic.php');
    $ob = new blogic();
        $teamName_Winner=$_POST['teamName'];
        $matchID=$_POST['matchID'];
        $matchDate=$_POST['matchDate'];
        
        $queryMatchDetailsUpdate="UPDATE tally_match_details SET tally_match_flag=1, tally_match_winner_team='$teamName_Winner' WHERE match_details_id='$matchID' AND tally_match_date='$matchDate'";
        $queryTranscWinningUpdate="UPDATE tally_transaction_details SET tally_transc_flag=1, tally_match_result='W' WHERE tally_match_details_id_fk='$matchID' AND tally_team_name='$teamName_Winner' AND tally_date_of_match='$matchDate'";
        $queryTranscLoosingUpdate="UPDATE tally_transaction_details SET tally_transc_flag=1, tally_match_result='L' WHERE tally_match_details_id_fk='$matchID' AND tally_date_of_match='$matchDate' AND tally_team_name<>'$teamName_Winner'";
        $updatedResult = $ob-> update_result($queryMatchDetailsUpdate);
        $updatedTranscResultW = $ob-> update_result($queryTranscWinningUpdate);
        //echo $updatedTranscResultW;
        $updatedTranscResultL = $ob-> update_result($queryTranscLoosingUpdate);
        //$updatedTranscResultL;
        if (($updatedResult == 0 || $updatedResult == null ) && ( $updatedTranscResultW == 0 || $updatedTranscResultW == null))
            {
                echo '<script>alert("Could Not update Result..!!!!"); window.location = "sudo_error_page.php"</script>';
            }
            else
                {
                   $queryAmtCalculation="SELECT * FROM tally_transaction_details WHERE tally_match_details_id_fk='$matchID'AND tally_date_of_match='$matchDate' AND tally_transc_flag=1 ";
                   $selectTranscDetails = $ob-> fetch_values($queryAmtCalculation);
                   if ($selectTranscDetails != "false" || $selectTranscDetails != null )
                    {
                        $counter=0;
                        $queryCounter=0;
                      while ($row = mysql_fetch_array($selectTranscDetails))
                            {
                                $match_id = $row['tally_match_details_id_fk'];
                                $transaction_details_id = $row['tally_transc_id'];
                                $tally_amt= $row['tally_amt'];
                                $tally_rate= $row['tally_rate'];
                                $tally_bidder_name= $row['tally_bidder_name'];
                                $tally_match_date= $row['tally_date_of_match'];
                                //echo $tally_match_date;
                                //echo $matchDate;
                                $tally_transc_flag=$row['tally_transc_flag'];
                                $tally_match_result=$row['tally_match_result'];
                                $counter++;
                                //echo "echo within the WHILE loop $counter";
                                if($tally_match_result == "W" && $tally_transc_flag == 1)
                                {
                                    $netAmount=$tally_amt * $tally_rate;
                                    $netTrancInsertQueryW="INSERT INTO `tally_net_transaction`(`tally_net_transc_details_id_fk`, `tally_net_match_details_id_fk`, `tally_net_bidder_name`, `tally_net_amt`, `tally_net_tranc_mdate`, `tally_net_transc_flag`) VALUES ($transaction_details_id,$match_id,$tally_bidder_name,$netAmount,'$tally_match_date',1)";
                                    $insertNetTranscDetailsW = $ob-> insert($netTrancInsertQueryW);
                                    if($insertNetTranscDetailsW == "true")
                                    {
                                       $queryCounter++;
                                       //echo "echo within the M loop $queryCounter"; 
                                    }
                                    else
                                    {
                                        echo '<script>alert("Could Not update manupulation Result-M..!!!!");</script>';
                                    }
                                }
                                elseif ($tally_match_result == "L" && $tally_transc_flag == 1)
                                {
                                    $netAmount= "-$tally_amt";
                                    $netTrancInsertQueryL="INSERT INTO `tally_net_transaction`(`tally_net_transc_details_id_fk`, `tally_net_match_details_id_fk`, `tally_net_bidder_name`, `tally_net_amt`, `tally_net_tranc_mdate`, `tally_net_transc_flag`) VALUES ($transaction_details_id,$match_id,$tally_bidder_name,$netAmount,'$tally_match_date',1)";
                                    $insertNetTranscDetailsL = $ob-> insert($netTrancInsertQueryL);
                                    if($insertNetTranscDetailsL == "true")
                                        {
                                           $queryCounter++;
                                           //echo "echo within the L loop $queryCounter"; 
                                        }
                                        else
                                        {
                                            echo '<script>alert("Could Not update manupulation Result-L..!!!!");</script>';
                                        }
                                }
                                else
                                {
                                    echo "Sorry This is not possible please chk the Transaction table for proper updates..!!!";
                                }
                            }
                    }
                    if ( $counter == $queryCounter )
                    {
                       echo '<script>alert("Result Updated Succesfully..!!!!"); window.location = "match_list.php"</script>'; 
                    }
                    else
                    {
                        echo '<script>alert("ERROR..!!!!..Unable to Update the NET Transaction Table..!!!!"); window.location = "match_list.php"</script>';
                    }
                    
                }
}
?>