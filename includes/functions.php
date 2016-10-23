<?php
function siteURL()
{
    $protocol = 'http://';
    $domainName = $_SERVER['HTTP_HOST'].'/';
    return $protocol.$domainName;
}
define( 'SITE_URL', siteURL() );

function pluginValidaciones(){
 	$url_acutal =  $_SERVER['PHP_SELF'];
 	if (strcasecmp($url_acutal, "/nuevo_usuario.php") == 0){

 		echo "\n";
 		echo "<!-- plugin de validacion de datos --> \n";
 		echo '<script type="text/javascript" src="assets/js/plugins/validador/jquery.validate.js"></script>' . "\n";
 		echo '<script type="text/javascript" src="assets/js/plugins/validador/additional-methods.js"></script>' . "\n";
 		echo '<link href="assets/css/validate.css" rel="stylesheet" type="text/css">' . "\n";


 	}
 }

 function wp_head(){
 	pluginValidaciones();
 }
