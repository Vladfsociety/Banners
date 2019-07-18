<div class="container">
    <form class="form" enctype="multipart/form-data" method="POST">      
      <h2 class="form-heading">Create form</h2>
      <label id="1" class="input-block-level">Name:</label>
      <input type="text" class="input-block-level" name="name" required minlength="4">  
      <label id="1" class="input-block-level">Status:</label>    
      <select class="input-block-level" name="Status">
        <option><?php echo ENABLED; ?></option>
        <option><?php echo DISABLED; ?></option>
        <option disabled selected hidden></option>
      </select>
      <label id="1" class="input-block-level">File:</label>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFile" name="userfile" required>
        <label class="custom-file-label" for="customFile"></label>s
      </div>
      <button class="btn btn-large btn-warning" name="submit" type="submit">Submit</button>
      <input class="btn btn-large btn-primary" name="Cancel" type="button" onclick="window.location.replace('/')" value="Cancel">
    </form>
</div>