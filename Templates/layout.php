<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Rockalabs</title>
    <link rel="stylesheet" type="text/css" href="/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
</head>
<body>
<div id="covermask" onclick="closeSideBar()"></div>
<div id="side-menu">
    <div class="header-menu">
        Menú
        <img onclick="closeSideBar()" src="/resources/assets/close.png" alt="">
    </div>
    <?php include 'menu.php'?>
    <div class="footer-menu">
        @2015 Nuevotalento
    </div>
</div>
<div id="all-container">
    <header>
        <img id="logo" src="/resources/assets/logo.png" alt="">
        <img onclick="openSideBar()" id="menu-open" src="/resources/assets/menu.png" alt="">
        <div id="top-menu">
            <?php include 'menu.php'?>
        </div>
        <div class="clearfix"></div>
    </header>
    <section>
        <?php echo $content?>
    </section>
</div>

<style type="text/css">
    .check:checked + div {
        display: none;
    }
</style>
<div>
    <input class="check" type="checkbox">
    <div>AAAA</div>
</div>

<script src="/js/main.js"></script>
</body>
</html>