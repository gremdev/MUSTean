<!DOCTYPE html>
<html>
    <head>
        <title><?= $title ?></title>
        <link rel="stylesheet" href="<?= base_url('public/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" type="text/css" href="<?= base_url('public/css/homestyle.css')?>">
        <link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>"/>
    </head>
    <body>

        <?php $this->load->view($view); ?>

        <script src="<?= base_url('public/js/jquery.min.js') ?>"></script>
        <script src="<?= base_url('public/js/bootstrap.min.js') ?>"></script>
        <script src="<?= base_url('public/js/angular.min.js') ?>"></script>
        <script src="<?= base_url('public/js/angular-route.min.js') ?>"></script>
        <script src="<?= base_url('public/js/scripts.js')?>"></script>
        <script src="<?= base_url('public/js/signup.js') ?>"></script>
        <script src="<?= base_url('public/js/newsfeed.js') ?>"></script>
    </body>
</html>