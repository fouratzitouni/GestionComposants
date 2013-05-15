<?php
// inclure toutes les classes de l'application
foreach (glob("classes/*.php") as $filename)
{
    include $filename;
}


$loader = new Loader($_GET);
$controller = $loader->createController();
$controller->executeAction();

?>