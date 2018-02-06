<?php $this->load->view('admin/app/action'); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title"><?php echo $title; ?></h2>
    </div>
    <div class="panel-body">
        <div class="well">
            <div class="row">
                <form action="<?php echo site_url('admin/' . segment(2)); ?>" method="POST" id="form-<?php echo segment(2);?>">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <input type="text" name="search[title]" placeholder="Enter Title" class="form-control" value="<?php echo set_search('posts', 'title')?>">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-top"><i class="fa fa-search"></i> Search</button>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-danger btn-block btn-top" name="clear-search" value="1"><i class="fa fa-times"></i> Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <?php if (isset($lists) && count($lists) > 0) { ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <td width="1"><input type="checkbox" class="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                    <td>Title</td>
                    <td>Created Date</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $selected = [];
                    foreach ($lists as $k => $item) {
                ?>
                    <tr>
                        <td>
                            <input type="checkbox" class="checkbox" name="selected[]" value="<?php echo $item->id; ?>" />
                        </td>
                        <td>
                            <?php echo $item->title; ?>
                        </td>
                        <td>
                            <?php echo date('d/m/Y', strtotime($item->created_at)) ?>
                        </td>
                        <td>
                            <a href="<?php echo site_url('admin/' . segment(2) . '/edit') . '/' . $item->id; ?>" data-toggle="tooltip" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-sm-6 text-left">
                <?php echo $this->pagination->create_links(); ?>
            </div>
            <div class="col-sm-6 text-right hidden-xs"><span>Display <?php echo $num; ?></span> / <b><?php echo $total; ?></b> records</div>
        </div>
        <?php } else { ?>
            <p class="well text-center">No data.</p>
        <?php } ?>
    </div>
</div>
