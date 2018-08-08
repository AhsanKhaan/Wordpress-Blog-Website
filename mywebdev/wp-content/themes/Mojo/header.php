<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('title');?></title>
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css"/>
</head>
<body>
    

    <div id="container">
    <header>
    <h1><?php bloginfo('name'); ?></h1>
    <div id="search"></div>
    </header>
    <div style="clear:both;"></div>
    <nav id="menu"><?php wp_nav_menu(); ?></nav>
   
