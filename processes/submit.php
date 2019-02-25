<?php 
	
	if (isset($_POST['submit'])) {
		if (empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['mensaje'])) {
			header("location: ../contacto.html?Llenar-todos-los-campos");
			exit();
		} else {
			$info['nombre'] = $_POST['nombre'];
			$info['email'] = $_POST['email'];
			if (empty($_POST['tel'])) {
				$info['telefono'] = "Sin fono";
			} else {
				$info['telefono'] = $_POST['tel'];
			}
			$info['mensaje'] = $_POST['mensaje'];
			$info['ip'] = $_SERVER['REMOTE_ADDR'];
			$info['fecha'] = date('d M Y H:i:s');

			$mensaje = 
			"
			<html>
			<body>
				<h3>Tú mensaje se ha enviado.</h3>
				<p><strong>Nombre: </strong>{$info['nombre']}</p>
				<p><strong>E-mail: </strong>{$info['email']}</p>
				<p><strong>Telefono: </strong>{$info['telefono']}</p>
				<p><strong>Mensaje: </strong>{$info['mensaje']}</p>
				<br>
				<p><strong>Ip: </strong> {$info['ip']}</p>
				<p><strong>Ip: </strong> {$info['fecha']}</p>
			</body>
			</html>
			";

			$para = "hello@monstersoftware.com";
			$de = $para;

			$asunto = "Hola, es mi primer correo - Blackparadox";

			$headers = "From: $de\r\n";
			$headers.= "MIME-Version: 1.0 \r\n";
			$headers.= "Content-type: text/html: charset=utf-8 \r\n";


			$enviar = mail($para, $asunto, $mensaje, $headers);

			if ($enviar) {
				var_dump($mensaje);
				echo "Mensaje enviado!";
			} else {
				echo "Eror al enviar el mensaje!";
				echo "<pre>";
				
			}
		}

	} else {
		header("location: ../contacto.html?error");
	}
 ?>
 <a href="../contacto.html">Volver</a>