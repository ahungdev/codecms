<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title><?php echo $title; ?> &raquo; CodeCMS</title>
<link rel="stylesheet" href="<?php echo base_url('themes/admin/css/plugins.css?v='.rand()); ?>">
<link rel="stylesheet" href="<?php echo base_url('themes/admin/css/app.css?v='.rand()); ?>">
<script type="text/javascript" src="<?php echo base_url('themes/admin/js/plugins.js?v='.rand()); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('themes/admin/js/app.js?v='.rand()); ?>"></script>
<script type="text/javascript">
    var _siteURL = '<?php echo site_url('admin'); ?>';
</script>
<?php if (isset($script)) $this->load->view($script); ?>