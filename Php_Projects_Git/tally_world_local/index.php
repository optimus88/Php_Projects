<?php
/**
 * @author keshav
 * @copyright 2015
 */

include ('sudo_header.php')
?>
<div>    </div>

<fieldset>  
<legend><p>Login Please :</p></legend>
<form action="login_action.php" method="post">
<table class="login-page">
<tr><td>UserName</td>
<td><input type="text" name="uname" /></td>

</tr>

<tr><td>Password</td>
<td><input type="password" name="upass" /></td>

</tr>

<tr><td colspan="2"><input class="styled-button-1" type="submit" value="Submit" name="chk_login" />
<input class="styled-button-1" type="reset" value="Cancel" /></td></tr>
</table>
</form>
<!--<fieldset>
<legend></legend>--!>
<p><i>Forgot Password ? Please <a href="forgot_password.php">"Click"</a> here...!!!!</p>
<p><i>Not Yet a Member ? Please <a href="tally_registration.php">"Click"</a> here...!!!!</p></fieldset>
<!--</fieldset>--!>

<?php include ('sudo_footer_login.php');
?>