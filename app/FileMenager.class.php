<?php

Class FileMenager
{
    public static function getAllFileName($source, $recursive = false)
    {
        if (!($folder = opendir($source))) {
            return ;
        }
        $array = [];
        while (($value = readdir($folder)) !== false) {
            if ($value[0] == '.')
                continue ;
            $is_dir = is_dir($source.'/'.$value);
            if ($is_dir && $recursive) {
                $array = array_merge($array, self::getAllFileName($source.'/'.$value));
                continue ;
            }
            if ($is_dir || end(explode('.', $value)) != 'php')
                continue ;
            $array[] = $source.'/'.$value;
        }
        closedir($folder);
        return $array;
    }

    public static function requireFolder($source, $recursive = false)
    {
        if (($array = self::getAllFileName($source, $recursive)) && !is_array($array))
            return ;
        foreach ($array as $key => $value) {
            require_once $value;
        }
    }

    public static function libraryLoad()
    {
        self::requireFolder(__DIR__ . '/system');
        self::requireFolder(__DIR__ . '/world');
        self::requireFolder(__DIR__ . '/game');
        self::requireFolder(__DIR__ . '/game/space_entities');
        self::requireFolder(__DIR__ . '/game/space_ships', 1);
        self::requireFolder(__DIR__ . '/game/weapons', 1);
    }

    public static function decode($filename)
    {
        if (!file_exists($filename))
            return [];
        $content = file_get_contents($filename);
        if (!$content)
            return [];
        return json_decode($content);
    }

    public static function generateToken($number)
    {
        $characts = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $count = strlen($characts);
        $token = '';
        for ($i=0; $i < $number; $i++) { 
            $token .= $characts[rand(0, $count - 1)];
        }
        return $token;
    }
}