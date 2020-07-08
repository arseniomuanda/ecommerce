<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vegan App | Home</title>

    <!-- css -->
    <link rel="stylesheet" href="<?=base_url('../assets/css/style.css')?>">

</head>
<body>

    <header>
        <nav class="menu">
            <ul class="menu">
                <li class="item-list">
                    <a href="<?= base_url('/home')?>">Home</a>
                </li>
                 <li class="item-list">
                    <a href="#services">Services</a>
                </li>
                <li class="item-list">
                    <a href="<?=base_url('/item')?>">Products</a>
                </li>
                <!-- <li class="item-list">
                    <a href="account.html">My Account</a>
                </li> -->
                <li class="item-list">
                    <a href="<?=base_url('/home/about')?>">About Us</a>
                </li>
                <li class="item-list">
                    <a href="<?=base_url('/home/contact')?>">Contact Us</a>
                </li>

                <li class="item-list" id="btn-log">
                    <a href="account.html" id="btn-login">Log In</a>  
                </li>
                <!-- <li class="item-list" id="btn-log">
                    <a href="#" id="btn-login">Sign In</a>  
                </li> -->
               
            </ul>
            <a href="#" id="toggle-btn">Vegan</a>
        </nav>
    </header>
    <!-- Header -->