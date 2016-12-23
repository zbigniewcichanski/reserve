<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 23.12.2016
 * Time: 20:00
 */

require_once "bootstrap.php";

$containerBuilder = new \DI\ContainerBuilder();

$container =[

];

$containerBuilder->addDefinitions($container);

$c = $containerBuilder->build();
return $c;

