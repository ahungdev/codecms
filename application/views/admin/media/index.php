<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title">Insert Image</h4>
		</div>
		<div class="modal-body">
			<div class="row menu">
				<div class="col-sm-6">
					<a href="<?php echo $parent; ?>" data-toggle="tooltip" title="Parent" id="btn-parent" class="btn btn-default btn-uplink"><i class="fa fa-level-up"></i></a>
					<a href="<?php echo $refresh; ?>" data-toggle="tooltip" title="Refresh" id="btn-refresh" class="btn btn-default btn-uplink"><i class="fa fa-refresh"></i></a>
					<button type="button" data-toggle="tooltip" title="Upload" class="btn btn-primary btn-upload"><i class="fa fa-upload"></i></button>
					<button type="button" data-toggle="tooltip" title="Add Folder" id="btn-folder" class="btn btn-default btn-folder"><i class="fa fa-folder"></i></button>
					<button type="button" data-toggle="tooltip" title="Delete" id="btn-delete" class="btn btn-danger btn-delete"><i class="fa fa-trash-o"></i></button>
				</div>
				<div class="col-sm-6">
					<div class="input-group">
						<input type="text" name="search" value="" placeholder="Search..." class="form-control">
						<div class="input-group-btn">
							<button type="button" data-toggle="tooltip" title="Search" class="btn btn-primary btn-search"><i class="fa fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
			<?php if (isset($lists) && count($lists) > 0): ?>
			  <ul class="files">
			    <?php foreach ($lists as $item): ?>
			      <li>
					<figure>
				        <?php if ($item['type'] == 'directory'): ?>
				          <a href="<?php echo $item['href']; ?>" class="btn-uplink"><i class="fa fa-folder fa-5x"></i></a>
				        <?php elseif ($item['type'] == 'image'): ?>
				          <a href="<?php echo $item['href']; ?>" data-path="<?php echo $item['path']; ?>" class="link-image"><img src="<?php echo $item['href']; ?>" alt="" class="img-responsive" /></a>
				        <?php else: ?>
				          <a href="<?php echo $item['href']; ?>" data-path="<?php echo $item['path']; ?>" class="link-video"><i class="fa fa-5x fa-file-video-o" aria-hidden="true"></i></a>
				        <?php endif; ?>
								<p><?php echo $item['name']; ?></p>
			          <label>
			            <input type="checkbox" name="path[]" value="<?php echo $item['path']; ?>" />
			            <span></span>
			          </label>
					</figure>
			      </li>
			    <?php endforeach; ?>
			  </ul>
			<?php else: ?>
			  <p class="no-data">No image.</p>
			<?php endif; ?>
		</div>
		<div class="modal-footer">
			<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>
</div>
