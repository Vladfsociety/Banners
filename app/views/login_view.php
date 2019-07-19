<div class="container">
    <form class="form-signin" method="POST">
      <h2 class="form-signin-heading">Please sign in</h2>
      <input type="text" class="input-block-level" placeholder="login" name="login" required>
      <input type="password" class="input-block-level" placeholder="password" name="password" required>
      <?php extract($data); ?>
  	  <?php if ($login_status === "access_denied") { ?>
  	  <p style="color:red">Uncorrect login or/and password</p>
  	  <?php } ?>
      <button class="btn btn-large btn-primary" name="submit" type="submit">Submit</button>
      <input class="btn btn-large btn-warning" name="Cancel" type="button" onclick="window.location.replace('/')" value="Cancel">
    </form>
</div>
