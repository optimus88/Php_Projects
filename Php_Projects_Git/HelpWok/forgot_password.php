<?php
include ('header_reg.php')
?>
<div>    </div>

            <fieldset>
            <legend><i>Edit Profile</i></legend>
            <form action="update_password.php" method="post" onsubmit="return validate_updatePassword();">
            <p>
            <table >
            <tr><td>Email Id ::</td><td><input type="text" name="email_id" id="email_id" /></td></tr>
            <tr><td>New Password ::</td><td><input type="password" name="new_password" id="new_password" /></td></tr>
            <tr><td>Re-enter Password ::</td><td><input type="password" name="re_new_pass" id="re_new_pass" /></td></tr>
            <tr><td></td><td><input type="submit" name="submit" value="Update" />
                                         <input type="reset" name="reset" value="Reset"  /></td></tr>
            
            </table>
            </p>
            </form>
            </fieldset>
<?php include ('footer_1.php');
?>