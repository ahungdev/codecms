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
    <link rel="stylesheet" href="<?php echo base_url('themes/admin/css/app.css?v='.rand()); ?>">
    <link rel="stylesheet" href="<?php echo base_url('themes/admin/css/plugins.css?v='.rand()); ?>">
    <script type="text/javascript">
        var _siteURL = '<?php echo site_url('admin'); ?>';
    </script>
</head>
<body>
    <main class="login">
        <section class="card">
            <div class="card-main">
                <div class="card-top">
                    <h2><i class="fa fa-credit-card" aria-hidden="true"></i> Login</h2>
                </div>
                <div class="card-body">
                <?php if (isset($login_error)) { ?>
                    <div class="message message-danger">
                        <button type="button" class="close" data-dismiss="message">&times;</button>
                        <p><i class="fa fa-exclamation-circle" aria-hidden="true"></i> <?php echo $login_error; ?></p>
                    </div>
                <?php } ?>
                <?php if (validation_errors()) { ?>
                    <div class="message message-danger">
                        <button type="button" class="close" data-dismiss="message">&times;</button>
                        <?php echo validation_errors(); ?>
                    </div>
                <?php } ?>
                    <form action="<?php echo site_url('admin/login'); ?>" method="POST">
                        <div class="field">
                            <label for="email" class="label">Email</label>
                            <div class="field-group">
                                <div class="icon"><i class="fa fa-user"></i></div>
                                <input type="text" name="email" id="email" class="input" placeholder="Email" value="<?php echo $this->input->post('email'); ?>" />
                            </div>
                        </div>
                        <div class="field">
                            <label for="password" class="label">Password</label>
                            <div class="field-group">
                                <div class="icon"><i class="fa fa-lock"></i></div>
                                <input type="password" name="password" id="password" class="input" placeholder="Password" value="<?php echo $this->input->post('password'); ?>" />
                            </div>
                        </div>
                        <div class="button">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <script type="text/javascript" src="<?php echo base_url('themes/admin/js/plugins.js?v='.rand()); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('themes/admin/js/app.js?v='.rand()); ?>"></script>
    <?php if (isset($js)) $this->load->view($js); ?>
</body>
</html>