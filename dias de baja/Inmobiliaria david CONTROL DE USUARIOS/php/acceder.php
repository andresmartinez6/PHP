<?php
require_once "funciones.php";
pintarHeader(2);
?>
<main>
    <form action="control.php" method="POST">
        <input type="text" name="usuario" placeholder="Nombre de usuario">
        <input type="password" name="contra" placeholder="Escribe tu contraseña">
        <input type="checkbox" name="recordar">
        <label for="recordar" value="Recordar mi sesión">Recordar mi sesión</label>
        <input type="submit" name="enviar">
    </form>
</main>


<?php pintarFooter(2) ?>
</body>

</html>