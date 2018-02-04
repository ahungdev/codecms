<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('admin/app/head'); ?>
</head>
<body>
    <main class="main">
        <?php $this->load->view('admin/app/nav'); ?>
        <?php $this->load->view($template); ?>
        <?php $this->load->view('admin/app/footer'); ?>
    </main>
    <?php $this->load->view('admin/app/script'); ?>
</body>
</html>