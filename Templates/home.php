<div id="slogan">
    <h1>Amar tu trabajo no tiene precio...</h1>
    <h2>Tu mejor empleo te está esperando</h2>
</div>
<?php if (!isAuth()):?>
<div id="box">
    <div class="background"></div>
    <div class="container">
        <h3>Registrate</h3>
        <button class="linkedin">Conectar con Linkedin</button>
        <button class="facebook">Conectar con Facebook</button>
        <div class="or">Or</div>
        <form action="/index.php" method="post">
            <span style="color: red"><?php echo $errors?></span>
            <input type="text" name="username">
            <input type="password" name="password">
            <button class="register">Registrarse</button>
        </form>
    </div>
</div>
<?php endif?>
