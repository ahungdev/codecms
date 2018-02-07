<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('admin/app/head'); ?>
</head>
<body>
    <h1 class="hide">CodeCMS</h1>
    <div class="loader">
		<p class="loader-body">
			<span class="loader-1"></span>
			<span class="loader-2"></span>
		</p>
	</div>
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
