<?php

// DIFERENCIAS ENTRE MD5 Y SHA1

// MD5 - Regresa un numero hexadecimal de 32 caracteres

// SHA1 - Regresa un numero hexadecimal de 40 caracteres

// MD5 - Ya ha sido comprometido como metodo de encriptacion por lo tanto es mas vulnerable que SHA1

// SHA1 - Es mas fuerte ante ataques de fuerza bruta

// VARIABLE CON LA CONTRASEÑA A ENCRIPTAR

$contrasena = "contrasena1234";

echo "Contraseña original: ".$contrasena;

echo "\n\n";

// ENCRIPTACION MD5

$encriptacionMD5 = md5($contrasena);

echo "Contraseña encriptada MD5: ".$encriptacionMD5;

echo "\n\n";

// ENCRIPTACION SHA1

$encriptacionSHA1 = sha1($contrasena);

echo "Contraseña encriptada SHA1: ".$encriptacionSHA1;

?>
