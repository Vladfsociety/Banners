<form action="" method="post">
<table class="login">
	<tr>
		<td>New name</td>
		<td><input type="text" name="name" required minlength="4"></td>
	</tr>
	<tr>
		<td>New status</td>
		<td><input list="status" name="Status" required></td>
		<datalist id="status">
		  <option value="Enabled">
		  <option value="Disabled">
		</datalist>
	</tr>
	<?php 
	echo 
	"<input type=\"hidden\" name=\"id\" value=".$_GET['id']." />";
	?>
	<th colspan="2" style="text-align: right">
	<input type="submit" value="Submit" name="btn"
	style="width: 150px; height: 30px;"></th>
</table>
</form>