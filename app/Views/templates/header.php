<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vegan App</title>

    <!-- css -->
    <link rel="stylesheet" href="<?= base_url('/assets/css/style.css') ?>">
    <script src="<?= base_url('/assets/js/jquery-3.2.1.min.js') ?>"></script>
</head>

<body>
    <header>
        <nav class="menu">
            <ul class="menu">
                <li class="item-list">
                    <a href="<?= base_url('/home') ?>">Home</a>
                </li>
                <li class="item-list">
                    <a href="<?= base_url('/home/services') ?>">Services</a>
                </li>
                <li class="item-list">
                    <a href="<?= base_url('/item') ?>">Productos</a>
                </li>
                <li class="item-list">
                    <a href="<?= base_url('/home/about') ?>">Sobre Nós</a>
                </li>
                <li class="item-list">
                    <a href="<?= base_url('/home/contact') ?>">Contacto</a>
                </li>

                <?php if (session()->get('logado') === true) { ?>
                    <li class="item-list" id="btn-log">
                        <a href="<?= base_url('/home/logout') ?>" id="btn-login">Sair</a>
                    </li>
                <?php } else { ?>
                    <li class="item-list" id="btn-log">
                        <a href="<?= base_url('/home/account') ?>" id="btn-login">Entrar</a>
                    </li>
                <?php } ?>
            </ul>
            <a href="#" id="toggle-btn">Vegan</a>
            <div class="toggle-bag">
                <a href="<?= base_url('home/cart') ?>" id="btn-bag">
                    <i class="fa fa-shopping-bag"></i>
                    <span class="badge"><?= (session()->get('cart')!==null)? session()->get('cart'): 0?></span>
                    Carrinho
                </a>
                <!--a href="<?php// base_url('home/account') ?>" class="button-user" id="toggle-user-btn"><i class="fa fa-user"></i> My Profile</a-->
            </div>
        </nav>
    </header>
    <!-- Header -->