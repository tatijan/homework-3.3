<?php
function classAutoload($className)
{
    $path = __DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR;
    $classRaw = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $classStart = strrpos($classRaw, DIRECTORY_SEPARATOR);
    $namespace = substr($classRaw, 0, $classStart + 1);
    $class = substr($classRaw, $classStart + 1);
    $fullPath = $path.$namespace.'class'.$class.'.php';
    if (file_exists($fullPath))
    {
        require $fullPath;
    }
}
spl_autoload_register('classAutoload');
