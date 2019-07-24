<?php extract($data); ?>
<div class="container">
    <form class="form" enctype="multipart/form-data" method="POST">      
      <h2 class="form-heading">Create form</h2>
      <label id="1" class="input-block-level">Name:</label>
      <input type="text" class="input-block-level" name="name" required minlength="4">  
       <?php if (isset($invalid_name) && $invalid_name) { ?> 
      <p style="color:red">Invalid name</p>
      <?php } ?>
      <label id="1" class="input-block-level">Status:</label>    
      <select class="input-block-level" name="status">
        <option value="<?php echo ENABLED; ?>"><?php echo ENABLED; ?></option>
        <option value="<?php echo DISABLED; ?>"><?php echo DISABLED; ?></option>
        <option disabled selected hidden></option>
      </select>
      <?php if (isset($invalid_status) && $invalid_status) { ?> 
      <p style="color:red">Invalid status</p>
      <?php } ?>
      <label id="1" class="input-block-level">File:</label>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFile" name="userfile" required>
        <label class="custom-file-label" for="customFile"></label>
      </div>
      <div>
      <?php if (isset($other_error) && $other_error) { ?> 
      <p style="color:red">Creating banner error</p>
      <?php } ?>
      </div>
      <button class="btn btn-large btn-primary" name="submit" type="submit">Submit</button>
      <input class="btn btn-large btn-warning" name="Cancel" type="button" onclick="window.location.replace('/')" value="Cancel">      
    </form>
</div>


