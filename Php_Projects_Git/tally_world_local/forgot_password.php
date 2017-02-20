<?php
/**
 * @author keshav
 * @copyright 2016
 */
include ('sudo_header.php')


?>
<fieldset>  
<legend>Forgot Password :</legend>
<form action="forgot_password_action.php" method="post" onsubmit="return chk_forgot_password();">
<table class="login-page">
<tr><td>UserName</td>
<td><input type="text" name="uname" /></td>
</tr>
<tr><td>New Password</td>
<td><input type="password" name="upass" id="upass"/></td>
</tr>
<tr><td>Re-Enetr Password</td>
<td><input type="password" name="upass_1" id="upass_1"/></td>
</tr>
<tr><td colspan="2"><input class="styled-button-1" type="submit" value="Submit" name="chk_forgot_password" />
<input class="styled-button-1" type="reset" value="Cancel" /></td></tr>
</table>
</form>
</fieldset>