<div>
	<p>
	  <?php extract($data); ?>
      <?php if (isset($other_error) && $other_error) { ?> 
      <p style="color:red">Removal failed</p>
      <?php } else { ?>
      <p style="color:green">Removal successful</p>
      <?php } ?>
	</p>
</div>