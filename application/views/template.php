<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pojok DOTS | JRC</title>
    <link href="<?= base_url('assets/bootstrap_3_3_6/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/jquery_ui_1_12_0/jquery-ui.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/timepicker_1_6_3/jquery-ui-timepicker-addon.css') ?>" rel="stylesheet">
</head>

<body>
    <?php $this->load->view('partials/sidebar') ?>

    <div class="container-fluid">
        <?php $this->load->view($mainView) ?>
    </div>

    <script src="<?= base_url('assets/js/jquery-1.12.4.min.js') ?>"></script>
    <script src="<?= base_url('assets/jquery_ui_1_12_0/jquery-ui.min.js') ?>"></script>
    <script src="<?= base_url('assets/timepicker_1_6_3/jquery-ui-timepicker-addon.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap_3_3_6/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>

</html>
