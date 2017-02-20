<?php
session_start();
if(isset($_SESSION['sso_id']))
{
$session_name=$_SESSION['sso_id'];
include('blogic.php');
$ob = new blogic();
include ('header_reg.php');
$query= "SELECT * FROM login WHERE sso_id='$session_name'";
//echo $query;
$result = $ob-> fetch_report($query);
if($result == 'false')
{
    echo '<script>alert("Please Login to view Your Profile"); window.location = "index.php"</script>';
}
else
{
    $row = mysql_fetch_array($result);
        $sso_id = $row['sso_id'];
        $name = $row['name'];
        $username = $row['username'];
        $Email_id = $row['email_id'];
        $status = $row['status'];
        if ($status == 1)
        $stat="Active";
        else
        $stat="Inactive";
        
?>



<form action="profile_action.php" id="" name="" method="post" onsubmit="return profile_validate();">
<fieldset>
				<legend><i>My Profile</i></legend>
                <table class="profile_table" cellspacing="10" border="1">
                
                <tr><td ><label>Name :</label></td>
                    <td><label><?php echo $name; ?></label></td>
                </tr>
                <tr><td><label>Username :</label></td>
                    <td><label><?php echo $username; ?></label></td>
                </tr>
                <tr><td><label>SSO ID :</label></td>
                    <td><label><?php echo $sso_id; ?></label></td>
                </tr>
                <tr><td><label>Email ID :</label></td>
                    <td><label><?php echo $Email_id; ?></label></td>
                </tr>
                <tr><td><label>Status :</label></td>
                    <td><label><?php echo $stat; ?></label></td>
                </tr>
                
                </table>
                
</fieldset>
			  </form>
			</div>
		</div>

		<div class="column5">
			<div class="feature">
            <fieldset>
            <legend><i>Edit Profile</i></legend>
            <form action="update_password.php" method="post" onsubmit="return validate_updatePassword();">
            <p>
            <table >
            <tr><td>Current Password ::</td><td><input type="password" name="current_pass" id="current_pass" /></td></tr>
            <tr><td>New Password ::</td><td><input type="password" name="new_password" id="new_password" /></td></tr>
            <tr><td>Re-enter Password ::</td><td><input type="password" name="re_new_pass" id="re_new_pass" /></td></tr>
            <tr><td></td><td><input type="submit" name="submit" value="Update" />
                                         <input type="reset" name="reset" value="Reset"  /></td></tr>
            
            </table>
            </p>
            </form>
            </fieldset>
			</div>
	        </div>

		<div class="column3">
			<div class="feature">
				
<?php 
include ('footer.php');
}
}
else
include ('index.php');
?>               