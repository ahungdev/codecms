<nav class="navbar">
    <h2 class="hide">Navbar</h2>
    <div class="navbar-main">
        <a href="<?php echo site_url(); ?>" target="_blank" class="navbar-brand">CodeCMS</a>
        <div class="navbar-body">
            <ul class="navbar-menu">
                <li><a href="<?php echo site_url('admin'); ?>">Dashboard</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Content</a>
                    <ul class="child">
                        <li><a href="<?php echo site_url('admin/categories'); ?>">Categories</a></li>
                        <li><a href="<?php echo site_url('admin/posts'); ?>">Posts</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">System</a>
                    <ul class="child">
                        <li><a href="<?php echo site_url('admin/users'); ?>">Users</a></li>
                        <li><a href="<?php echo site_url('admin/settings'); ?>">Settings</a></li>
                    </ul>
                </li>
            </ul>
            <div class="navbar-user">
                Hi, <?php echo $this->session->userdata('admin_name'); ?>
                <a href="<?php echo site_url('admin/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</nav>