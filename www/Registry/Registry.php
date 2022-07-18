<?php

namespace Registry;


class Registry
{

    /**
     * Хранилище значений
     * @var array
     */
    private static $storage = [];

    public const DOMAIN_OBJECT = 'DomainObject';
    public const USER_ORDER_DATA = 'UserOrderData';

    /**
     * Список возможных ключей
     * @var array
     */
    private static $allowedKeys = [
        self::DOMAIN_OBJECT,
        self::USER_ORDER_DATA,
    ];

    private function __construct()
    {
    }

    public static function set(string $key, $value)
    {
        if (!in_array($key, static::$allowedKeys)) {
            $keys = static::getAvailableKeys();
            die(
                'Unknown key = ' . $key . ' Allowed keys: ' . $keys
            );
        }

        static::$storage[$key] = $value;
    }

    public static function get(string $key)
    {
        if (!in_array($key, static::$allowedKeys)) {
            $keys = static::getAvailableKeys();
            die(
                'Unknown key = ' . $key . ' Allowed keys: ' . $keys . "\n"
            );
        }

        if (!array_key_exists($key, static::$storage)) {
            die('Undefined key = ' . $key);
        }

        return static::$storage[$key];
    }

    public static function getAvailableKeys(): string
    {
        return implode(',', static::$allowedKeys);
    }

}