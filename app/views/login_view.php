<h1>Authorization</h1>
<p>
<form action="" method="post">
<table class="login">
	<tr>
		<td>Login</td>
		<td><input type="text" name="login" required></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="password" name="password" required></td>
	</tr>
	<th colspan="2" style="text-align: right">
	<input type="submit" value="Submit" name="btn"
	style="width: 150px; height: 30px;"></th>
</table>
</form>
</p>

<?php extract($data); ?>
<?php if ($login_status === "access_granted") { ?>
<p style="color:green">Авторизация прошла успешно.</p>
<?php } elseif ($login_status === "access_denied") { ?>
<p style="color:red">Логин и/или пароль введены неверно.</p>
<?php } 