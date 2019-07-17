<div class="container">
    <form class="form" method="post">
      <h2 class="form-heading">Please enter new values</h2>
      <input type="text" class="input-block-level" placeholder="new name" name="name" required minlength="4">
      <input list="status" class="input-block-level" placeholder="new status" name="Status" required>
      <datalist id="status">
		<option value=<?php ENABLED ?>>
		<option value=<?php DISABLED ?>>>
	  </datalist>
	  <?php 
		echo 
		"<input type=\"hidden\" name=\"id\" value=".$_GET['id']." />";
	  ?>
      <button class="btn btn-large btn-primary" type="submit">Submit</button>
    </form>
</div>