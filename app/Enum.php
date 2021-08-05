<?php

namespace App;

use ReflectionClass;

abstract class Enum
{
    static function getAll($json = false)
    {
        $class = new ReflectionClass(get_called_class());
        $constants = $class->getConstants();

        if ($json) {
            return json_encode($constants);
        }

        return $constants;
    }

    static function getKeys($json = false)
    {
        $class = new ReflectionClass(get_called_class());
        $keys = array_keys($class->getConstants());

        if ($json) {
            return json_encode($keys);
        }

        return $keys;
    }

    public static function getValues($json = false)
    {
        $class = new ReflectionClass(get_called_class());
        $values = array_values($class->getConstants());

        if ($json) {
            return json_encode($values);
        }

        return $values;
    }

    public static function getKey($key)
    {
        $class = new ReflectionClass(get_called_class());
        $constants = array_flip($class->getConstants());

        return $constants[$key];
    }

    public static function getValue($value)
    {
        $class = new ReflectionClass(get_called_class());
        $constants = $class->getConstants();

        return $constants[$value];
    }
}