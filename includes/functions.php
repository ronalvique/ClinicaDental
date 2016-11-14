<?php

/*
 * Funcion que devuelve el url del site
 * ejemplo http://clinicadental/
*/
function siteURL()
{
    $protocol = 'http://';
    $domainName = $_SERVER['HTTP_HOST'].'/';
    return $protocol.$domainName;
}
define( 'SITE_URL', siteURL() );


/*
 * Funcion para incluir el script
 * de validacion de jquery. El cual
 * se encarga de validad los formularios.
 * Se necesita identificar en que paginas
 * se incluira el script y llamar la funcion
 * en el header, desde la funcion gancho.
*/
function pluginValidaciones(){
 	$url_acutal =  basename($_SERVER['PHP_SELF']);
 	if (
        strcasecmp($url_acutal, "nuevo_usuario.php") == 0 ||
        strcasecmp($url_acutal, "establecimientos.php") == 0 ||
        strcasecmp($url_acutal, "modificacion_usuario.php") == 0 ||
        strcasecmp($url_acutal, "login.php") == 0
     ){

 		echo "\n";
 		echo "<!-- plugin de validacion de datos --> \n";
 		echo '<script type="text/javascript" src="assets/js/plugins/validador/jquery.validate.js"></script>' . "\n";
 		echo '<script type="text/javascript" src="assets/js/plugins/validador/additional-methods.js"></script>' . "\n";
 		echo '<link href="assets/css/validate.css" rel="stylesheet" type="text/css">' . "\n";


 	}
 }

 /* 
  * Devuelve la contraseña enviada
  * encriptada con la funcion crypy
  * y con salto aleatorio.
 */
function encriptarContrasenia($contrasenia) { 
    $caracteres = "abcdefghijklmnopqrstuvwxyz1234567890"; 
    $nueva_clave = ""; 
    for ($i = 5; $i < 35; $i++) { 
        $nueva_clave .= $caracteres[rand(5,35)]; 
    };

    $valor = "07";
	$salt = '$2y$' . $valor . '$' . $nueva_clave . '$';

	return crypt($contrasenia,$salt);
   
};

/*
 * Funcion para comprobar si la contraseña
 * enviada es correcta, es decir la decrypta.
 * devuelve true si coincide, false caso contrario.
 * Parametros:
 * 	$contrasenia = contrasenia que es obtenida del formulario.
 *	$contrasenia_guardada = contraseña guardada en la base de datos.
*/
function verificarContrasenia($contrasenia,$contrasenia_guardada){

	if( password_verify($contrasenia,$contrasenia_guardada)){
		return true;
	} else {
		return false;
	}

}


/*
 * Funcion para validar logue
 * estara disponible en todas las paginas
 * ya que se ejecutara en el gancho 
*/
 function logueado(){
 	session_start();
  	$url_acutal =  basename($_SERVER['PHP_SELF']);

  	
  	if (strcasecmp($url_acutal, "login.php") <> 0) {
    	if ( !isset($_SESSION['usuario']) ){
    		$ruta = ruta("login.php");
      		header("Location: $ruta");
   	 	}
 	}
 	
 }

 /*
  * Funcion que devuelve el path de instalacion
  * Especificar el directorio de instalacion de
  * el sistema
 */
function ruta($url){
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = $url;

	$tipo = 'http';
	if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
    	$tipo = 'https';
	}

	return $tipo . "://" . $host . $uri . "/" . $url; 
}

/*
 * Gancho para ejecutar las funciones
 * que son requeridas que escriban en
 * el header, como por ejemplo scripts.
*/
 function wp_head(){
 	pluginValidaciones();
   logueado();
 }
