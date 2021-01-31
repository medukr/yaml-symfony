<?php
/**
 * Created by andrii
 * Date: 31.01.21
 * Time: 19:40
 */

namespace app\config;


use Symfony\Component\Yaml\Yaml;

class Config
{
    private static $config = [];

    private static $path = [
        'app',
        'deploy'
    ];

    public static function get()
    {
        if (!static::$config){
            foreach (static::$path as $item) {
                static::$config = array_merge(static::$config, Yaml::parseFile(__DIR__ ."/$item.yml", Yaml::PARSE_DATETIME));
            }
        }
        return static::$config;
    }

}
