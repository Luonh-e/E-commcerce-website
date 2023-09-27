<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT;?>/public/assets/clients/css/styles.css">
    <title>Epolche</title>
</head>

<body> 
    <?php $this->render('blocks/header'); ?>
    <?php $this->render($content); ?>
    <?php $this->render('blocks/footer'); ?>

    <script src="<?php echo _WEB_ROOT;?>public/assets/clients/js/script.js"></script>
</body>
</html>