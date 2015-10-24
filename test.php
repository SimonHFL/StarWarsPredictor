<?php
echo('testphp');

 
$path = "/home/vagrant/Sites/bhackapp/test.py";

$output = shell_exec("/usr/bin/python " . $path);

echo($output);
#$command = escapeshellcmd($path . "/test.py");
#$output = shell_exec($command);
#echo $output;



?>
