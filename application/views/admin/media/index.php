<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title">File Media</h4>
		</div>
		<div class="modal-body">
			<div class="row menu">
				<div class="col-sm-6">
					<a href="<?php echo $parent; ?>" data-toggle="tooltip" title="Parent" class="btn btn-default btn-parent"><i class="fa fa-level-up" aria-hidden="true"></i></a>
					<a href="<?php echo $refresh; ?>" data-toggle="tooltip" title="Refresh" class="btn btn-default btn-refresh"><i class="fa fa-refresh" aria-hidden="true"></i></a>
					<button type="button" data-toggle="tooltip" title="Upload" class="btn btn-primary btn-upload"><i class="fa fa-upload" aria-hidden="true"></i></button>
					<button type="button" data-toggle="tooltip" title="Add Folder" class="btn btn-default btn-folder"><i class="fa fa-folder" aria-hidden="true"></i></button>
					<button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
				</div>
				<div class="col-sm-6">
					<div class="input-group">
						<input type="text" name="search" placeholder="Search..." class="form-control" value="<?php echo $search; ?>" />
						<div class="input-group-btn">
							<button type="button" data-toggle="tooltip" title="Search" class="btn btn-primary btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
						</div>
					</div>
				</div>
			</div>
			<?php if (isset($lists) && count($lists) > 0) { ?>
				<ul class="files">
					<?php foreach ($lists as $item) { ?>
						<li>
							<figure>
								<?php if ($item['type'] == 'directory') { ?>
									<a href="<?php echo $item['href']; ?>" class="btn-directory" title="<?php echo $item['name']; ?>" data-toggle="tooltip"><i class="fa fa-folder fa-5x"></i></a>
								<?php } else { ?>
									<a href="<?php echo $item['href']; ?>" data-path="<?php echo $item['path']; ?>" class="link-media" title="<?php echo $item['name']; ?>" data-toggle="tooltip"><img src="<?php echo $item['href']; ?>" alt="" class="img-responsive" /></a>
								<?php } ?>
								<label>
									<input type="checkbox" name="path[]" value="<?php echo $item['path']; ?>" />
									<span></span>
								</label>
							</figure>
						</li>
					<?php } ?>
				</ul>
			<?php } else { ?>
				<p class="no-data">No Media.</p>
			<?php } ?>
		</div>
		<div class="modal-footer">
			<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {

		$('[data-toggle="tooltip"]').tooltip();

		$('.pagination a').on('click', function (evt) {
			evt.preventDefault();
			$('.modal-media').load($(this).attr('href'));
		});

		$('.btn-parent').on('click', function (evt) {
			evt.preventDefault();
			$('.modal-media').load($(this).attr('href'));
		});

		$('.btn-directory').on('click', function (evt) {
			evt.preventDefault();
			$('.modal-media').load($(this).attr('href'));
		});

		$('.btn-refresh').on('click', function (evt) {
			evt.preventDefault();
			$('.modal-media').load($(this).attr('href'));
		});

		$('.btn-folder').popover({
			html: true,
			placement: 'bottom',
			trigger: 'click',
			title: 'Folder Name',
			content: function() {
				return '<div class="input-group">'+
				'<input type="text" name="folder" placeholder="Folder Name" class="form-control">'+
				'<span class="input-group-btn">'+
					'<button type="button" title="Add Folder" class="btn btn-primary btn-create"><i class="fa fa-plus-circle"></i></button>'+
					'</span>'+
				'</div>';
			}
		});
	
		$('.btn-folder').on('shown.bs.popover', function() {
			$('.btn-create').on('click', function () {
				$.ajax({
					url: _siteURL + '/media/folder?action=upload&directory=<?php echo $directory; ?>',
					type: 'POST',
					dataType: 'json',
					data: {
						folder: $('input[name="folder"]').val()
					},
					success: function(response) {
						if (response.success) {
							$('.btn-refresh').trigger('click');
						} else {
							alert(response.message);
						}
					}
				});
			});
		});

		$('.btn-upload').on('click', function (evt) {
			evt.preventDefault();
			$('.form-upload').remove();
			$('body').append('<form class="form-upload" enctype="multipart/form-data" style="display: none;"><input type="file" name="file" /></form>');
			$('input[name=\'file\']').trigger('click');
			$('input[name=\'file\']').on('change', function() {
				$.ajax({
					url: _siteURL + '/media/upload?action=upload&directory=<?php echo $directory; ?>',
					type: 'POST',
					dataType: 'json',
					data: new FormData($(this).parent()[0]),
					cache: false,
					contentType: false,
					processData: false,
					success: function(response) {
						if (response.success) {
							$('.btn-refresh').trigger('click');
						} else {
							alert(response.message);
						}
					}
				});
			});
		});

		$('.btn-search').on('click', function (evt) {
			evt.preventDefault();
			var url = _siteURL + '/media?action=upload&directory=<?php echo $directory; ?>';
			var search = $('input[name=\'search\']').val();
			if (search) {
				url += '&search=' + encodeURIComponent(search);
			}
			<?php if ($thumb) { ?>
				url += '&thumb=<?php echo $thumb; ?>';
			<?php } ?>
			<?php if ($target) { ?>
				url += '&target=<?php echo $target; ?>';
			<?php } ?>

			$('.modal-media').load(url);
		});

		$('.btn-delete').on('click', function (evt) {
			evt.preventDefault();
			if (confirm('You are sure')) {
				$.ajax({
					url: _siteURL + '/media/delete',
					type: 'POST',
					dataType: 'json',
					data: $('input[name^=\'path\']:checked'),
					success: function(response) {
						if (response.success) {
							$('.btn-refresh').trigger('click');
							
						} else {
							alert(response.message);
						}
					}
				});
			}
		});

		$('.link-media').on('click', function (evt) {
			evt.preventDefault();
			var obj = $(this),
				src = obj.attr('href'),
				path = obj.data('path');

			<?php if ($thumb) { ?>
				$('[data-name="<?php echo $thumb; ?>"]').attr('src', src);
			<?php } ?>
			<?php if ($target) { ?>
				$('[data-name="<?php echo $target; ?>"]').val(path);
			<?php } else { ?>
				$('.summernote').summernote('insertImage', src);
			<?php } ?>

			$('.modal-media').modal('hide');
		});
	});
</script>