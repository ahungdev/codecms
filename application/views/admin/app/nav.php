<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-cms" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><i class="fa fa-handshake-o" aria-hidden="true"></i> CodeCMS</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-cms">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo site_url('admin'); ?>">Dashboard</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Content <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('admin/categories'); ?>">Categories</a></li>
            <li><a href="<?php echo site_url('admin/posts'); ?>">Posts</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">System <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('admin/users'); ?>">Users</a></li>
            <li><a href="<?php echo site_url('admin/settings'); ?>">Settings</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo site_url('admin/users/edit/' . $this->session->userdata('admin_id')); ?>">Hi, <?php echo $this->session->userdata('admin_name'); ?></a></li>
        <li><a href="<?php echo site_url('admin/logout'); ?>">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
</nav>
