<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:url" content="<?php echo site_url(); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="title" />
    <meta property="og:description" content="description" />
    <meta property="og:image" content="<?php echo base_url('themes/admin/img/share.jpg'); ?>" />
    <title><?php echo $title; ?> &raquo; CodeCMS</title>
    <link rel="stylesheet" href="<?php echo base_url('themes/admin/css/plugins.css?v='.rand()); ?>">
    <link rel="stylesheet" href="<?php echo base_url('themes/admin/css/app.css?v='.rand()); ?>">
    <script type="text/javascript" src="<?php echo base_url('themes/admin/js/plugins.js?v='.rand()); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('themes/admin/js/app.js?v='.rand()); ?>"></script>
    <?php if (isset($script)) $this->load->view($script); ?>
    <script type="text/javascript">
        var _siteURL = '<?php echo site_url('admin'); ?>';
    </script>
</head>
<body>
    <main class="login">
        <div class="login-body">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title"><i class="fa fa-credit-card" aria-hidden="true"></i> Login</h2>
                </div>
                <div class="panel-body">
                    <?php if (isset($login_error)) { ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <p><i class="fa fa-times-circle" aria-hidden="true"></i> <?php echo $login_error; ?></p>
                        </div>
                    <?php } ?>
                    <?php if (validation_errors()) { ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <?php echo validation_errors(); ?>
                        </div>
                    <?php } ?>
                    <form action="<?php echo site_url('admin/login'); ?>" method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo $this->input->post('email'); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></div>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?php echo $this->input->post('password'); ?>" />
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>