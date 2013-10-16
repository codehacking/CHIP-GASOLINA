<?php session_start(); ?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>Generar CHIP-GASOLINA</title>
	<meta name="description" content="">
	<meta name="author" content="">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	<link rel="stylesheet" href="css/style.css?v=2">

	<script src="js/libs/modernizr-1.7.min.js"></script>
</head>
<body>
	<div id="container">
        <div id="contact-form" class="clearfix">
            <h1>Generar chip</h1>
            </ul>
            <form method="post" action="chip_gasolina.php">
                <label for="name">Codigo: <span class="required">*</span></label>
                <input type="text" id="code" name="code" placeholder="Ingrese codigo de gasolina" required autofocus />
                <input type="submit" value="Generar" id="submit-button" />
                <p id="req-field-desc"><span class="required">*</span> Indica los campos obligatorios</p>
            </form>
        </div>
    </div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script>!window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.5.1.min.js"%3E%3C/script%3E'))</script>
	<script src="js/plugins.js"></script>
	<script src="js/script.js"></script>
</body>
</html>