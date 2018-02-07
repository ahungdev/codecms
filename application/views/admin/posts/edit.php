<?php $this->load->view('admin/app/action'); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $title; ?></h2>
    </div>
    <div class="panel-body">
        <form action="<?php echo site_url('admin/' . segment(2) . '/edit/' . $item->id); ?>" method="POST" id="form-<?php echo segment(2); ?>">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active in" id="tab-general">
                    <div class="form-group">
                        <label for="post-title">Title</label>
                        <input type="text" name="post-title" id="post-title" class="form-control" placeholder="Title" value="<?php echo $item->title; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="post-slug">Slug</label>
                        <input type="text" name="post-slug" id="post-slug" class="form-control" placeholder="Slug" value="<?php echo $item->slug; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="post-category">Category</label>
                        <select name="post-cateogry" class="form-control" id="post-category">
                            <?php foreach ($category as $cate) { ?>
                                <option value="<?php echo $cate->id; ?>" <?php if ($cate->id == $item->category_id) echo 'selected'; ?>><?php echo $cate->title; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="post-content">Intro</label>
                        <textarea name="post-intro" id="post-intro" class="form-control" placeholder="Intro" rows="8"><?php echo $item->intro; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="post-content">Content</label>
                        <textarea name="post-content" id="post-content" class="form-control summernote" placeholder="Content"><?php echo $item->content; ?></textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-media">
                            <button type="button" class="btn btn-danger btn-remove"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            <img src="<?php echo base_url($item->thumbnail); ?>" data-thumb="<?php echo base_url('themes/admin/img/thumbnail.jpg'); ?>" data-name="thumb" alt="" class="img-responsive" />
                            <input type="hidden" name="post-thumbnail" data-name="target" id="post-thumbnail" value="<?php echo $item->thumbnail; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="radio-inline">
                            <input type="radio" name="post-status" id="post-status-1" value="0" <?php if ($item->status == 0) echo 'checked'; ?>> Disabled
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="post-status" id="post-status-2" value="1" <?php if ($item->status == 1) echo 'checked'; ?>> Enabled
                        </label>
                    </div>
                </div>
            </div>
            <input type="hidden" name="post-id" value="<?php echo $item->id; ?>">
        </form>
    </div>
</div>
