<?php if (!isAuth()):?>
<form action="/index.php" method="post">
    <span style="color: red"><?php echo $errors?></span>
    <input type="text" name="username">
    <input type="password" name="password">
    <button>Login</button>
</form>
<?php endif?>