<form action="<?php echo $_SERVER[REQUEST_URI]; ?>" method="post">
<input type="hidden" name="do" value="authenticate">

<table border=0>
<tr>
	<td><strong>Username</strong></td>
	<td><input type="text" name="username" size="20" maxlength="20"></td>
</tr>
<tr>
        <td><strong>Password</strong></td>
        <td><input type="text" name="password" size="20" maxlength="20"></td>
</tr>
<tr>
        <td colspan=2 align="center"><input type="submit" value="Login"></td>
</tr>
</table>
