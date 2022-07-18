<?php

namespace Registry;

spl_autoload_register(function ($className){
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $className = preg_replace('/^Registry/', '', $className);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
});


Registry::set('DomainObject', 'value');
$DomainObjectValue = Registry::get('DomainObject');
var_dump($DomainObjectValue);



