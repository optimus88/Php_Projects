<?php
session_start();
if(isset($_SESSION['admin']))
{
include ('sudo_header.php');
?>


				<form action="sudo_follow_up.php" id="" name="" method="post" onsubmit="return welcome_validate();">
<fieldset>
				<legend><i>Please Select :</i></legend>
                
    <p><a href="match_details.php">Match Details</a></p>
    <p><a href="match_list.php">Match List</a></p>
</fieldset>
			  </form>
</fieldset>
<?php include ('sudo_footer_1.php'); 
}
else
{
  include ('index.php');
}
?>
			