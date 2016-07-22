<?php if (!isAuth()):?>
<a class="btn-init-sesion" href="#">Iniciar sesión</a>
<?php endif;?>
<?php if (isAuth()):?>
<a class="btn-init-sesion" href="/index.php/logout">Salir</a>
<?php endif;?>
<ul class="main_menu">
</ul>