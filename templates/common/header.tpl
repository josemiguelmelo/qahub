<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>QAHub</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{$BASE_URL}css/font-awesome.min.css" />
    <link rel="stylesheet" href="{$BASE_URL}vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="{$BASE_URL}vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="{$BASE_URL}vendor/bootstrap/dist/css/bootstrap.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="{$BASE_URL}css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="{$BASE_URL}css/helper.css" />
    <link rel="stylesheet" href="{$BASE_URL}css/new_style.css">

</head>
<body>
<div id="error_messages">
    {foreach $ERROR_MESSAGES as $error}
        <div class="error">{$error}<a class="close" href="#">X</a></div>
    {/foreach}
</div>
<div id="success_messages">
    {foreach $SUCCESS_MESSAGES as $success}
        <div class="success">{$success}<a class="close" href="#">X</a></div>
    {/foreach}
</div>
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
