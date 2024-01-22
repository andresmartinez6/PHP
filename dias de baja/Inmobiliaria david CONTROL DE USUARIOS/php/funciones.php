<link rel="stylesheet" href="style.css">
<?php
function conectar()
{
    $conectar = new mysqli("localhost", "root", "", "inmobiliaria");
    $conectar->set_charset("UTF8");
    return $conectar;
}
function accesoAdmin(){
    return (isset($_SESSION["id"]) && $_SESSION["id"]==0);
}
function accesoUser(){
    return (isset($_SESSION["id"]) && $_SESSION["id"]!=0);
}
function GenerarCita($dia, $mes, $año)
{
    $con = conectar();
    $consulta = "select id from citas where fecha='$año-$mes-$dia'";
    $preparada = $con->query($consulta);
    if ($preparada->num_rows > 0) {
        $con->close();
        return true;
    } else {
        $con->close();
        return false;
    }
}
function generarCalendario($dia, $mes, $año)
{

    $marca = mktime(0, 0, 0, $mes, $dia, $año);

    $dias_en_mes = date("t", $marca);
    $diasSemana = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
    $marca_primer_dia_semana = mktime(0, 0, 0, $mes, 1, $año);
    $primer_dia_semana = date("N", $marca_primer_dia_semana);
    echo "<table border><tr>";

    for ($k = 0; $k < count($diasSemana); $k++) {
        echo "<th>$diasSemana[$k]</th>";
    }
    echo "</tr>";
    for ($i = 1; $i < $primer_dia_semana; $i++) {
        echo "<td></td>";
    }
    for ($dia_actual = 1; $dia_actual <= $dias_en_mes; $dia_actual++) {
        $dia_a = $dia_actual;
        $mes_a = $mes;
        $año_a = $año;

        if (GenerarCita($dia_actual, $mes, $año) == true) {
            echo "<td class='verde'><a href='citas.php?año_a=$año&mes_a=$mes&dia_a=$dia_actual'>$dia_actual</a></td>";
        } else {
            echo "<td class='rojo'><a href='citas.php?año_a=$año&mes_a=$mes&dia_a=$dia_actual'>$dia_actual</a></td>";
        }
        if (($dia_actual + $primer_dia_semana - 1) % 7 == 0) {
            echo "</tr><tr>";
        }
    }
    $ultima_celda = ($dias_en_mes + $primer_dia_semana - 1) % 7;
    if ($ultima_celda != 0) {
        for ($i = 0; $i < 7 - $ultima_celda; $i++) {
            echo "<td></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "<div class='citas'>Rojo: días sin citas. Verde: Días con citas</div>";
}
function GenerarCitaUsuario($dia, $mes, $año, $id)
{
    $con = conectar();
    $consulta = "select id from citas where fecha='$año-$mes-$dia' and id_cliente='$id'";
    $preparada = $con->query($consulta);
    if ($preparada->num_rows > 0) {
        $con->close();
        return true;
    } else {
        $con->close();
        return false;
    }
}
function generarCalendarioUsuario($dia, $mes, $año, $id)
{

    $marca = mktime(0, 0, 0, $mes, $dia, $año);

    $dias_en_mes = date("t", $marca);
    $diasSemana = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
    $marca_primer_dia_semana = mktime(0, 0, 0, $mes, 1, $año);
    $primer_dia_semana = date("N", $marca_primer_dia_semana);
    echo "<table border><tr>";

    for ($k = 0; $k < count($diasSemana); $k++) {
        echo "<th>$diasSemana[$k]</th>";
    }
    echo "</tr>";
    for ($i = 1; $i < $primer_dia_semana; $i++) {
        echo "<td></td>";
    }
    for ($dia_actual = 1; $dia_actual <= $dias_en_mes; $dia_actual++) {
        $dia_a = $dia_actual;
        $mes_a = $mes;
        $año_a = $año;

        if (GenerarCitaUsuario($dia_actual, $mes, $año, $id) == true) {
            echo "<td class='verde'><a href='miscitas.php?año_a=$año&mes_a=$mes&dia_a=$dia_actual'>$dia_actual</a></td>";
        } else {
            echo "<td class='rojo'><a href='miscitas.php?año_a=$año&mes_a=$mes&dia_a=$dia_actual'>$dia_actual</a></td>";
        }
        if (($dia_actual + $primer_dia_semana - 1) % 7 == 0) {
            echo "</tr><tr>";
        }
    }
    $ultima_celda = ($dias_en_mes + $primer_dia_semana - 1) % 7;
    if ($ultima_celda != 0) {
        for ($i = 0; $i < 7 - $ultima_celda; $i++) {
            echo "<td></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "<div class='citas'>Rojo: días sin citas. Verde: Días con citas</div>";
}

function pintarHeader($opcion)
{
    if ($opcion == 1) {
        if (isset($_SESSION["id"])) {
            if ($_SESSION["id"] == 0) {
                echo '<!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" type="text/css" href="../css/style.css">
                    <link rel="icon" href="./img/favicon.png" type="image/x-icon">
                    <link rel="preconnect" href="https://fonts.googleapis.com">
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&display=swap" rel="stylesheet">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
                    <title>MusicOn</title>
                </head>
                <body>
                    <header>
                
                        <div class="fin">
                            <p>Pide tu hipoteca con <a href="#">ING</a></p>
                            <p>Gastos inmobiliaria <a href="#">gratis</a> a partir de 100000<a href="#">€</a></p>
                        </div>
                        <div class="contenedor">
                            <div class="datos">
                                <div>
                                    <img src="./img/correo.png"><a href="#">Correo</a>
                                    <img src="./img/numero.png"><a href="#">Teléfono</a>
                                    <img src="./img/contacto.png"><a href="#">Contacto</a>
                                </div>
                
                                <a href="./php/cerrarsesion.php" class="ini animate__animated " href="#" ><b> Cerrar sesion:  ' . $_SESSION["usuario"]. '</b></a>
                
                            </div>
                            <div class="buscador animate__animated animate__flipInX">
                                <div class="logo">
                                    <a href="#"><img src="./img/logo.png"></a>
                                </div>
                                <div class="bus">
                                    <img src="./img/buscador.png">
                                </div>
                                <div class="contacto animate__animated animate__zoomInUp">
                                    <a href="#"><img src="./img/contactoorange.png"></a>
                                    <a href="#"><img src="./img/comprasorange.png"></a>
                                </div>
                            </div>
                        </div>
                        <nav>
                            <ul class="menu animate__animated animate__zoomIn">
                                <li><a href="./index.php">Inicio</a></li>
                                <li><a href="./php/noticias.php">Noticias</a></li>
                                <li><a href="./php/clientes.php">Clientes</a></li>
                                <li><a href="./php/inmuebles.php">Inmuebles</a></li>
                                <li><a href="./php/citas.php">Citas</a></li>
                                <li><a href="#">Contacto</a></li>
                            </ul>
                        </nav>
                    </header>';
            }
            if ($_SESSION['id'] > 0) {
                echo '<!DOCTYPE html>
                    <html lang="es">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <link rel="stylesheet" type="text/css" href="../css/style.css">
                        <link rel="icon" href="./img/favicon.png" type="image/x-icon">
                        <link rel="preconnect" href="https://fonts.googleapis.com">
                        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&display=swap" rel="stylesheet">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
                        <title>MusicOn</title>
                    </head>
                    <body>
                        <header>
                    
                            <div class="fin">
                                <p>Pide tu hipoteca con <a href="#">ING</a></p>
                                <p>Gastos inmobiliaria <a href="#">gratis</a> a partir de 100000<a href="#">€</a></p>
                            </div>
                            <div class="contenedor">
                                <div class="datos">
                                    <div>
                                        <img src="./img/correo.png"><a href="#">Correo</a>
                                        <img src="./img/numero.png"><a href="#">Teléfono</a>
                                        <img src="./img/contacto.png"><a href="#">Contacto</a>
                                    </div>
                    
                                    <a href="./php/cerrarsesion.php" class="ini animate__animated " href="#" ><b>Cerrar sesion:  ' . $_SESSION["usuario"]. '</b></a>
                    
                                </div>
                                <div class="buscador animate__animated animate__flipInX">
                                    <div class="logo">
                                        <a href="#"><img src="./img/logo.png"></a>
                                    </div>
                                    <div class="bus">
                                        <img src="./img/buscador.png">
                                    </div>
                                    <div class="contacto animate__animated animate__zoomInUp">
                                        <a href="#"><img src="./img/contactoorange.png"></a>
                                        <a href="#"><img src="./img/comprasorange.png"></a>
                                    </div>
                                </div>
                            </div>
                            <nav>
                                <ul class="menu animate__animated animate__zoomIn">
                                    <li><a href="./php/misinmuebles.php">Mis inmuebles</a></li>
                                    <li><a href="./php/miscitas.php">Mis citas</a></li>
                                    <li><a href="./php/inmueblesdisponibles.php">Inmuebles disponibles</a></li>
                                    <li><a href="./php/misdatos.php">Mis datos personales</a></li>
        
                                </ul>
                            </nav>
                        </header>';
            }
        } else {
            echo '<!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" type="text/css" href="../css/style.css">
                <link rel="icon" href="./img/favicon.png" type="image/x-icon">
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
                <title>MusicOn</title>
            </head>
            <body>
                <header>
            
                    <div class="fin">
                        <p>Pide tu hipoteca con <a href="#">ING</a></p>
                        <p>Gastos inmobiliaria <a href="#">gratis</a> a partir de 100000<a href="#">€</a></p>
                    </div>
                    <div class="contenedor">
                        <div class="datos">
                            <div>
                                <img src="./img/correo.png"><a href="#">Correo</a>
                                <img src="./img/numero.png"><a href="#">Teléfono</a>
                                <img src="./img/contacto.png"><a href="#">Contacto</a>
                            </div>
            
                        </div>
                        <div class="buscador animate__animated animate__flipInX">
                            <div class="logo">
                                <a href="#"><img src="./img/logo.png"></a>
                            </div>
                            <div class="bus">
                                <img src="./img/buscador.png">
                            </div>
                            <div class="contacto animate__animated animate__zoomInUp">
                                <a href="#"><img src="./img/contactoorange.png"></a>
                                <a href="#"><img src="./img/comprasorange.png"></a>
                            </div>
                        </div>
                    </div>
                    <nav>
                        <ul class="menu animate__animated animate__zoomIn">
                            <li><a href="./index.php">Inicio</a></li>
                            <li><a href="./php/inmuebles.php">Inmuebles</a></li>
                            <li><a href="#">Contacto</a></li>
                            <li><a href="./php/acceder.php">Acceder</a></li>
                        </ul>
                    </nav>
                </header>';
        }
    } elseif ($opcion == 2) {
        if (isset($_SESSION["id"])) {
            if ($_SESSION["id"] == 0) {
                echo '<!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" type="text/css" href="../css/style.css">
                    <link rel="icon" href="./img/favicon.png" type="image/x-icon">
                    <link rel="preconnect" href="https://fonts.googleapis.com">
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&display=swap" rel="stylesheet">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
                    <title>MusicOn</title>
                </head>
                <body>
                    <header>
                
                        <div class="fin">
                            <p>Pide tu hipoteca con <a href="#">ING</a></p>
                            <p>Gastos inmobiliaria <a href="#">gratis</a> a partir de 100000<a href="#">€</a></p>
                        </div>
                        <div class="contenedor">
                            <div class="datos">
                                <div>
                                    <img src="../img/correo.png"><a href="#">Correo</a>
                                    <img src="../img/numero.png"><a href="#">Teléfono</a>
                                    <img src="../img/contacto.png"><a href="#">Contacto</a>
                                </div>
                
                                <a href="./cerrarsesion.php" class="ini animate__animated " href="#" ><b> Cerrar sesion:  ' . $_SESSION["usuario"]. '</b></a>
                
                            </div>
                            <div class="buscador animate__animated animate__flipInX">
                                <div class="logo">
                                    <a href="#"><img src="../img/logo.png"></a>
                                </div>
                                <div class="bus">
                                    <img src="../img/buscador.png">
                                </div>
                                <div class="contacto animate__animated animate__zoomInUp">
                                    <a href="#"><img src="../img/contactoorange.png"></a>
                                    <a href="#"><img src="../img/comprasorange.png"></a>
                                </div>
                            </div>
                        </div>
                        <nav>
                            <ul class="menu animate__animated animate__zoomIn">
                                <li><a href="../index.php">Inicio</a></li>
                                <li><a href="./noticias.php">Noticias</a></li>
                                <li><a href="./clientes.php">Clientes</a></li>
                                <li><a href="./inmuebles.php">Inmuebles</a></li>
                                <li><a href="./citas.php">Citas</a></li>
                                <li><a href="#">Contacto</a></li>
                            </ul>
                        </nav>
                    </header>';
            }elseif ($_SESSION['id'] > 0) {
                echo '<!DOCTYPE html>
                    <html lang="es">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <link rel="stylesheet" type="text/css" href="../css/style.css">
                        <link rel="icon" href="./img/favicon.png" type="image/x-icon">
                        <link rel="preconnect" href="https://fonts.googleapis.com">
                        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&display=swap" rel="stylesheet">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
                        <title>MusicOn</title>
                    </head>
                    <body>
                        <header>
                    
                            <div class="fin">
                                <p>Pide tu hipoteca con <a href="#">ING</a></p>
                                <p>Gastos inmobiliaria <a href="#">gratis</a> a partir de 100000<a href="#">€</a></p>
                            </div>
                            <div class="contenedor">
                                <div class="datos">
                                    <div>
                                        <img src="../img/correo.png"><a href="#">Correo</a>
                                        <img src="../img/numero.png"><a href="#">Teléfono</a>
                                        <img src="../img/contacto.png"><a href="#">Contacto</a>
                                    </div>
                    
                                    <a href="./cerrarsesion.php" class="ini animate__animated " href="#" ><b>Cerrar sesion:  ' . $_SESSION["usuario"]. '</b></a>
                    
                                </div>
                                <div class="buscador animate__animated animate__flipInX">
                                    <div class="logo">
                                        <a href="#"><img src="../img/logo.png"></a>
                                    </div>
                                    <div class="bus">
                                        <img src="../img/buscador.png">
                                    </div>
                                    <div class="contacto animate__animated animate__zoomInUp">
                                        <a href="#"><img src="../img/contactoorange.png"></a>
                                        <a href="#"><img src="../img/comprasorange.png"></a>
                                    </div>
                                </div>
                            </div>
                            <nav>
                                <ul class="menu animate__animated animate__zoomIn">
                                    <li><a href="./misinmuebles.php">Mis inmuebles</a></li>
                                    <li><a href="./miscitas.php">Mis citas</a></li>
                                    <li><a href="./inmueblesdisponibles.php">Inmuebles disponibles</a></li>
                                    <li><a href="./misdatos.php">Mis datos personales</a></li>
        
                                </ul>
                            </nav>
                        </header>';
            }
        } else {

            echo '<!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" type="text/css" href="../css/style.css">
                <link rel="icon" href="./img/favicon.png" type="image/x-icon">
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
                <title>MusicOn</title>
            </head>
            <body>
                <header>
            
                    <div class="fin">
                        <p>Pide tu hipoteca con <a href="#">ING</a></p>
                        <p>Gastos inmobiliaria <a href="#">gratis</a> a partir de 100000<a href="#">€</a></p>
                    </div>
                    <div class="contenedor">
                        <div class="datos">
                            <div>
                                <img src="../img/correo.png"><a href="#">Correo</a>
                                <img src="../img/numero.png"><a href="#">Teléfono</a>
                                <img src="../img/contacto.png"><a href="#">Contacto</a>
                            </div>
            
                        </div>
                        <div class="buscador animate__animated animate__flipInX">
                            <div class="logo">
                                <a href="#"><img src="../img/logo.png"></a>
                            </div>
                            <div class="bus">
                                <img src="../img/buscador.png">
                            </div>
                            <div class="contacto animate__animated animate__zoomInUp">
                                <a href="#"><img src="../img/contactoorange.png"></a>
                                <a href="#"><img src="../img/comprasorange.png"></a>
                            </div>
                        </div>
                    </div>
                    <nav>
                        <ul class="menu animate__animated animate__zoomIn">
                            <li><a href="../index.php">Inicio</a></li>
                            <li><a href="./inmuebles.php">Inmuebles</a></li>
                            <li><a href="#">Contacto</a></li>
                            <li><a href="./acceder.php">Acceder</a></li>
                        </ul>
                    </nav>
                </header>';
        }
    }
}

function pintarfooter($opcion)
{
    if ($opcion == 1) {
        echo '<footer>
    <div>
        <h3>Información</h3>
        <h3>Ubicación</h3>
    </div>
    <div>
        <ul>
            <li><a href="#">Acerca de la inmobiliaria</a></li>
            <li><a href="#">Consultas</a></li>
            <li><a href="#">Nuestras sedes</a></li>
            <li><a href="#">Abre una franquicia</a></li>
        </ul>
        <ul>
            <li><a href="#">Faqs</a></li>
            <li><a href="#">Contacto</a></li>
            <li><a href="#">Ley de protección de datos</a></li>
            <li><a href="#">Accesibilidad</a></li>
        </ul>
        <ul>
            <li><a href="#">Sobre nosotros</a></li>
            <li><a href="#">Empleo</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Patrocinadores</a></li>
        </ul>
        <div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1123.7879506050995!2d-3.6079660781728746!3d37.18710871981356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd71fcef3c4fe4ff%3A0xb362c7165dc2ded2!2sEscuela%20Arte%20Granada!5e0!3m2!1ses!2ses!4v1675084100367!5m2!1ses!2ses"
                width="300" height="225" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            <p>Av. Dr. Oloriz, 6, 18012 Granada</p>
        </div>
    </div>
    <div>
        <a href="#"><img src="./img/logo.png"></a>
        <div>
            <p><span>Inmobiliaria® </span>Todos los derechos reservados</p>
            <div>
                <a href="#"><img src="./img/Facebook_f_logo_(2019) 1.png"></a>
                <a href="#"><img src="./img/whatsapp 1.png"></a>
                <a href="#"><img src="./img/instagram 1.png"></a>
                <a href="#"><img src="./img/youtube 1.png"></a>
            </div>
        </div>
    </div>
</footer>';
    } elseif ($opcion == 2) {
        echo '<footer>
        <div>
            <h3>Información</h3>
            <h3>Ubicación</h3>
        </div>
        <div>
            <ul>
                <li><a href="#">Acerca de la inmobiliaria</a></li>
                <li><a href="#">Consultas</a></li>
                <li><a href="#">Nuestras sedes</a></li>
                <li><a href="#">Abre una franquicia</a></li>
            </ul>
            <ul>
                <li><a href="#">Faqs</a></li>
                <li><a href="#">Contacto</a></li>
                <li><a href="#">Ley de protección de datos</a></li>
                <li><a href="#">Accesibilidad</a></li>
            </ul>
            <ul>
                <li><a href="#">Sobre nosotros</a></li>
                <li><a href="#">Empleo</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Patrocinadores</a></li>
            </ul>
            <div>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1123.7879506050995!2d-3.6079660781728746!3d37.18710871981356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd71fcef3c4fe4ff%3A0xb362c7165dc2ded2!2sEscuela%20Arte%20Granada!5e0!3m2!1ses!2ses!4v1675084100367!5m2!1ses!2ses"
                    width="300" height="225" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <p>Av. Dr. Oloriz, 6, 18012 Granada</p>
            </div>
        </div>
        <div>
            <a href="#"><img src="../img/logo.png"></a>
            <div>
                <p><span>Inmobiliaria® </span>Todos los derechos reservados</p>
                <div>
                    <a href="#"><img src="../img/Facebook_f_logo_(2019) 1.png"></a>
                    <a href="#"><img src="../img/whatsapp 1.png"></a>
                    <a href="#"><img src="../img/instagram 1.png"></a>
                    <a href="#"><img src="../img/youtube 1.png"></a>
                </div>
            </div>
        </div>
    </footer>';
    }
}
function comprobarCookies(){
    session_start();
    if (isset($_COOKIE["user"])){
        session_decode($_COOKIE["user"]);
    }
}

?>