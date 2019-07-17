<div class="container">
    <form class="form" action="" enctype="multipart/form-data" method="post">
      <h2 class="form-heading">Please enter values and attach image</h2>
      <input type="text" class="input-block-level" placeholder="Name" name="name" required minlength="4">
      <input list="status" class="input-block-level" placeholder="Status" name="Status" required>
      <datalist id="status">
    		<option value=<?php ENABLED ?>>
    		<option value=<?php DISABLED ?>>
	    </datalist>
      <div class="custom-file mb-3">
        <input type="file" class="custom-file-input" id="customFile" name="userfile" required>
        <label class="custom-file-label" for="customFile">Choose file</label>
      </div>
      <button class="btn btn-large btn-primary" type="submit">Submit</button>
    </form>
</div>

<script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
