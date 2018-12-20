<?php
require __DIR__.'/../app/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $config['title']; ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" href="/assets/styles/config.css">
    <link rel="stylesheet" href="/assets/styles/main.css">
    <link rel="stylesheet" href="/assets/styles/login.css">
    <link rel="stylesheet" href="/assets/styles/create.css">
    <link rel="stylesheet" href="/assets/styles/navigation.css">
    <link rel="stylesheet" href="/assets/styles/profile.css">
</head>
<body>
    <?php require __DIR__.'/navigation.php'; ?>
