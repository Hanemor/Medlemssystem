<?php
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])){
    $uri = 'https://';
}   else {
    $uri = 'https://';
}
$uri .= $_SERVER['HTTP_HOST'];
header('Location: '.$uri.'/xampp/');
exit;

?>
En feil har oppstått