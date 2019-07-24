<?php extract($data); ?>
<div class="container">
    <form class="form-signin" method="POST">
      <h2 class="form-signin-heading">Please sign in</h2>
      <input type="text" class="input-block-level" placeholder="login" name="login" required>
      <?php if (isset($invalid_login) && $invalid_login) { ?>
      <p style="color:red">Invalid login</p>
      <?php } ?>
      <input type="password" class="input-block-level" placeholder="password" name="password" required>
      <?php if (isset($invalid_password) && $invalid_password) { ?>
      <p style="color:red">Invalid password</p>
      <?php } elseif (isset($uncorrect_password) && $uncorrect_password) { ?>
      <p style="color:red">Uncorrect password</p>
      <?php } ?>
      <?php if (isset($other) && $other) { ?>
      <p style="color:red">Login error</p>
      <?php } ?>
      <button class="btn btn-large btn-primary" name="submit" type="submit">Submit</button>
      <input class="btn btn-large btn-warning" name="Cancel" type="button" onclick="window.location.replace('/')" value="Cancel">
    </form>
</div>
