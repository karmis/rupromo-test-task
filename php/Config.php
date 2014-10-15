<?php
/**
 * Created by PhpStorm.
 * User: karmis
 * Date: 14.10.14
 * Time: 20:55
 */

abstract class Config
{
    /**
     * @var array
     */
    protected static $data = array(
        'url' => array(
            'xml' => 'http://www.wextor.ru/udata/content/menu/',
            'xsl' => "../xsl/menu.xsl"
        ),
    );

    /**
     * Добавляет значение в реестр
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public static function set($key, $value)
    {
        self::$data[$key] = $value;
    }

    /**
     * Возвращает значение из реестра по ключу
     *
     * @param string $key
     * @return mixed
     */
    public static function get($key)
    {
        return isset(self::$data[$key]) ? self::$data[$key] : null;
    }
} 