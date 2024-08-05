<?php
$inipath = php_ini_loaded_file();

if ($inipath) {
    echo 'Loaded php.ini: ' . $inipath;
} else {
   echo 'A php.ini file is not loaded';
}
echo 'Current PHP user: ' . get_current_user() . "<br>";
echo 'Running as user: ' . exec('whoami') . "<br>";
phpinfo();