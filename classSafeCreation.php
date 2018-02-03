<?php
namespace controlfunctions;
class SafeCreation extends \Exception
{
    static function createObject( $className, $arg1 = null, $arg2 = null, $arg3 = null, $arg4 = null, $arg5 = null, $arg6 = null, $arg6 = null)
    {
        try {
            return new $className($arg1 = null, $arg2 = null, $arg3 = null, $arg4 = null, $arg5 = null, $arg6 = null, $arg6 = null);
        } catch (Exception $e) {
            echo 'Введите корректные данные о товаре';
            return false;
        }
    }
}