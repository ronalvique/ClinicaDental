<?php
function siteURL()
{
    $protocol = 'http://';
    $domainName = $_SERVER['HTTP_HOST'].'/';
    return $protocol.$domainName;
}
define( 'SITE_URL', siteURL() );
