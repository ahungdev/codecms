<div class="well text-right">
    <?php if (isset($home)) { ?>
        <a href="<?php echo site_url('admin/posts/create'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>
        <?php if (isset($export)) { ?>
            <a href="<?php echo site_url('admin/posts/export'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-download" aria-hidden="true"></i></a>
        <?php } ?>
        <a href="<?php echo site_url('admin/posts/destroy'); ?>" class="btn btn-sm btn-danger" disabled><i class="fa fa-trash-o" aria-hidden="true"></i></a>
    <?php } ?>
    <?php if (isset($export)) { ?>
        <a href="<?php echo site_url('admin/posts/export'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-download" aria-hidden="true"></i></a>
    <?php } ?>
    <?php if (isset($button)) { ?>
        <button type="submit" form="form-<?php echo segment(2); ?>" data-toggle="tooltip" title="Save" class="btn btn-sm btn-primary"><i class="fa fa-save" aria-hidden="true"></i></button>
        <a href="<?php echo site_url('admin/' . segment(2)); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-sm btn-default"><i class="fa fa-reply" aria-hidden="true"></i></a>
    <?php } ?>
</div>
