<style type="text/css">     
    .form-signin input[name="Status"] {        
      height: auto;
      margin-bottom: 15px;
      padding: 7px 9px;
    }
</style>

<div class="container">
    <form class="form-signin" method="post">
      <h2 class="form-signin-heading">Please enter new values</h2>
      <input type="text" class="input-block-level" name="name" required minlength="4">
      <input list="status" class="input-block-level" name="Status" required>
      <datalist id="status">
		  <option value="Enabled">
		  <option value="Disabled">
	  </datalist>
	  <?php 
		echo 
		"<input type=\"hidden\" name=\"id\" value=".$_GET['id']." />";
	  ?>
      <button class="btn btn-large btn-primary" type="submit">Submit</button>
    </form>
</div>