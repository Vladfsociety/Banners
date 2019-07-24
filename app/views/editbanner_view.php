<?php extract($data); ?>
<div class="container">
    <form class="form" enctype="multipart/form-data" method="POST">
      <h2 class="form-heading">Edit form</h2>
      <img src="<?php echo htmlspecialchars("/".$data['URL']); ?>">
      <label id="1" class="input-block-level">Name:</label>
      <input type="text" class="input-block-level" value="<?php echo htmlspecialchars($data['name']); ?>" name="name" required minlength="4">
      <?php if (isset($invalid_name) && $invalid_name) { ?> 
      <p style="color:red">Invalid name</p>
      <?php } ?>
      <label id="1" class="input-block-level">Status:</label>
      <select class="input-block-level" name="status">
        <option <?php if ($data['status'] === ENABLED) { echo "selected"; } ?> value="<?php echo ENABLED; ?>"><?php echo ENABLED; ?></option>
        <option <?php if ($data['status'] === DISABLED) { echo "selected"; } ?> value="<?php echo DISABLED; ?>"><?php echo DISABLED; ?></option>
      </select> 
      <?php if (isset($invalid_status) && $invalid_status) { ?> 
      <p style="color:red">Invalid status</p>
      <?php } ?>
      <label id="1" class="input-block-level">File:</label>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFile" name="userfile">
        <label class="custom-file-label" for="customFile">Choose file</label>
      </div>
	    <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">	 
      <?php if (isset($other_error) && $other_error) { ?> 
      <p style="color:red">Updating banner error</p>
      <?php } ?>
      <button class="btn btn-large btn-primary" type="submit">Submit</button>
      <input class="btn btn-large btn-warning" name="Cancel" type="button" onclick="window.location.replace('/')" value="Cancel">
    </form>
</div>

