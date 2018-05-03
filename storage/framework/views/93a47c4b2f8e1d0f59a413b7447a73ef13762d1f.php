<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title',config('app.name')); ?></title>

    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">
    
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- No Baidu Siteapp-->
    <meta http-equiv="Cache-Control" content="no-siteapp"/>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="解百"/>

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="assets/i/app-icon72x72@2x.png">
    <meta name="msapplication-TileColor" content="#0e90d2">

    <link rel="stylesheet" href="<?php echo e(asset('lib/amazeui/css/amazeui.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/reset.css')); ?>">
    <style>
        body,.app{height: 100%}
    </style>
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body>
<div class="app">
    <?php echo $__env->yieldContent('container'); ?>
</div>
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('lib/amazeui/js/amazeui.min.js')); ?>"></script>
<script type="text/javascript">
    let token = document.head.querySelector('meta[name="csrf-token"]');

    if (token) {
        window.laravel_csrf_token = token.content;
    } else {
        console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
    }
</script>

<?php echo $__env->yieldContent('js'); ?>

</body>
</html>
