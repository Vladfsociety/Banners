<form action="" enctype="multipart/form-data" method="post">
<table class="login">
	<tr>
		<td>Name</td>
		<td><input type="text" name="name" required minlength="4"></td>
	</tr>
	<tr>
		<td>Status</td>
		<td><input list="status" name="Status" required></td>
		<datalist id="status">
		  <option value="Enabled">
		  <option value="Disabled">
		</datalist>
	</tr>
	<tr>
		<td>Image</td>
		<td><input name='userfile' type="file" accept=".jpg, .jpeg, .png" required></td>
	</tr>
	<th colspan="2" style="text-align: right">
	<input type="submit" value="Submit" name="btn"
	style="width: 150px; height: 30px;"></th>
</table>
</form>