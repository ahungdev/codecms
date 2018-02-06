<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('admin/app/head'); ?>
</head>
<body>
    <main class="main">
        <?php $this->load->view('admin/app/nav'); ?>
        <div class="container-fluid">
            <?php $this->load->view('admin/app/alert'); ?>
            <?php $this->load->view($template); ?>
        </div>
        <?php $this->load->view('admin/app/footer'); ?>
    </main>
</body>
</html>
