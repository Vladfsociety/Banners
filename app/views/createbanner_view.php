<!--<form action="" enctype="multipart/form-data" method="post">
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
	<input class="btn btn-large btn-primary" type="submit" value="Submit" name="btn"
	style="width: 150px; height: 30px;"></th>
</table>
</form>-->

<style type="text/css">   
	
</style>

<div class="container">
    <form class="form-signin" method="post">
      <h2 class="form-signin-heading">Please enter values and attach image</h2>
      <input type="text" class="input-block-level" placeholder="Name" name="name" required minlength="4">
      <input list="status" class="input-block-level" placeholder="Status" name="Status" required>
      <datalist id="status">
		  <option value="Enabled">
		  <option value="Disabled">
	  </datalist>
	  <input name="userfile" type="file" accept=".jpg, .jpeg, .png" required>
	 
      <button class="btn btn-large btn-primary" type="submit">Submit</button>
    </form>
</div>