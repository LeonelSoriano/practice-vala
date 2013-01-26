<?php require_once('Paginador.php');
ini_set('display_errors', 'On');
ini_set('display_errors', 1);
    $paginador = new Paginador();
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />

		<title>index</title>
		<meta name="description" content="" />
		<meta name="author" content="leonel" />
        <link rel="stylesheet" type="text/css" href="style.css" >
	</head>
	<body>
		<div>
			<header>
				<h1>index</h1>
			</header>
			<nav>
				<ul>
					<li><a href="#"> index </a></li>
					<li><a href=""> sigiente </a> </li>
					<li>  </li>
				</ul>
			
			</nav>
            <section id="cuerpo">
                 <?php $paginador->render_body();  ?>
            </section>

            <div id="paginador">
                <ul>
                    <li class="manejador"><a href="#">anterior</a></li>
                    <?php $paginador->render_nav() ?>
                    <li class="manejador"><a href="#">siguiente</a></li>
                </ul>
            </div>
			<footer>
				<p>
					&copy; Copyright  by leonel
				</p>
			</footer>
		</div>
	</body>
</html>
