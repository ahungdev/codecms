<div class="admin-alert">
  <?php if (isset($flash)) { ?>
		<div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
			<p><i class="fa fa-check-circle"></i> <?php echo $flash; ?></p>
		</div>
  <?php } ?>
  <?php if (validation_errors()) { ?>
		<div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo validation_errors();?>
		</div>
  <?php } ?>
</div>
