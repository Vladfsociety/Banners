<div class="container">
    <form class="form" enctype="multipart/form-data" method="POST">
      <h2 class="form-heading">Edit form</h2>
      <img src=<?php echo htmlspecialchars("/".$_GET['URL']); ?>>
      <label id="1" class="input-block-level">Name:</label>
      <input type="text" class="input-block-level" value=<?php echo htmlspecialchars($_GET['name']); ?> name="name" required minlength="4">
      <label id="1" class="input-block-level">Status:</label>
      <select class="input-block-level" name="Status" value=>
        <option <?php if ($_GET['status'] === ENABLED) { echo "selected"; } ?>><?php echo ENABLED; ?></option>
        <option <?php if ($_GET['status'] === DISABLED) { echo "selected"; } ?>><?php echo DISABLED; ?></option>
      </select> 
      <label id="1" class="input-block-level">File:</label>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFile" name="userfile">
        <label class="custom-file-label" for="customFile">Choose file</label>
      </div>
	  <input type="hidden" name="id" value=<?php echo htmlspecialchars($_GET['id']); ?>>	  
      <button class="btn btn-large btn-warning" name="submit" type="submit">Submit</button>
      <input class="btn btn-large btn-primary" name="Cancel" type="button" onclick="window.location.replace('/')" value="Cancel">
    </form>
</div>


