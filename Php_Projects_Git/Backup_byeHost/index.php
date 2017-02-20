<?php
/**
 * @author keshav
 * @copyright 2015
 */

include ('sudo_header.php')
?>
<div>    </div>
<form action="login_action.php" method="post">
<fieldset>  
<legend><p>Login Please :</p></legend>
<table>
<tr><td>UserName</td>
<td><input type="text" name="uname" /></td>

</tr>

<tr><td>Password</td>
<td><input type="password" name="upass" /></td>

</tr>

<tr><td colspan="2"><input type="submit" value="submit" name="chk_login" />
<input type="reset" value="Cancel" /></td></tr>

</table>
</fieldset>
</form>
<?php include ('sudo_footer_login.php');
?>