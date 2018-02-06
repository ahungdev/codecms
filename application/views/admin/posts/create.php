<?php $this->load->view('admin/app/action'); ?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h2 class="panel-title"><?php echo $title; ?></h2>
    </div>
    <div class="panel-body">
        <form action="<?php echo site_url('admin/' . segment(2) . '/create'); ?>" method="POST" id="form-<?php echo segment(2); ?>">
            <div class="form-group">
                <label for="post-title">Title</label>
                <input type="text" name="post-title" id="post-title" class="form-control" placeholder="Title" value="<?php echo $this->input->post('post-title'); ?>">
            </div>
            <div class="form-group">
                <label for="post-slug">Slug</label>
                <input type="text" name="post-slug" id="post-slug" class="form-control" placeholder="Slug" value="<?php echo $this->input->post('post-slug'); ?>">
            </div>
            <div class="form-group">
                <label for="post-content">Content</label>
                <textarea name="post-content" id="post-content" class="form-control summernote" placeholder="Content"><?php echo $this->input->post('post-content'); ?></textarea>
            </div>
            <div class="form-group">
                <div class="form-media">
                    <button type="button" class="btn btn-danger btn-remove"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    <img src="<?php echo base_url('themes/admin/img/thumbnail.jpg'); ?>" data-thumb="<?php echo base_url('themes/admin/img/thumbnail.jpg'); ?>" data-name="thumb" alt="" class="img-responsive" />
                    <input type="hidden" name="input-media" data-name="target" />
                </div>
            </div>
        </form>
    </div>
</div>
