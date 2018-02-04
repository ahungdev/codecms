<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('web/app/head'); ?>
</head>
<body>
    <main class="main">
        <?php $this->load->view('web/app/nav'); ?>
        <?php $this->load->view($template); ?>
        <?php $this->load->view('web/app/footer'); ?>
    </main>
    <?php $this->load->view('web/app/script'); ?>
</body>
</html>