<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <title><?php echo (isset($title) ? $title : 'Reserveren'); ?></title>
    <link rel="stylesheet" href="<?php echo base_url('bower_components/jquery-ui/themes/base/all.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('bower_components/tether/dist/css/tether.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>" />
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <h1>Reserveren</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <progress class="progress" value="<?php echo(isset($step) ? $step : 0); ?>" max="4">Stap <?php echo (isset($step) ? $step : 0); ?></progress>
        </div>
    </div>
</div>