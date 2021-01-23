<?php
// Afficher les erreurs
error_reporting(E_ALL & ~E_NOTICE);

// Configuration base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'omm');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'PhysumoWeb');
define('DB_PASSWORD', 'Bonjour');

// Chemin des fichiers
define("PATH_LIB", __DIR__ . DIRECTORY_SEPARATOR);
?>
