<?php

function getPos($relative_path ,$needle)
{
    $pos = strrpos($relative_path, $needle) + strlen($needle) - 1;
    return $pos;
}

function getCompareTwoPos($pos_one, $pos_two)
{
    $result = ($pos_one > $pos_two) ? $pos_one : $pos_two;
    return $result;
}

function getPosLocalPath($relative_path)
{
    $pos_onepoint = getPos($relative_path, '/../');
    $pos_twopoint = getPos($relative_path, '/./');
    $pos_local_path = getCompareTwoPos($pos_onepoint, $pos_twopoint);
    return $pos_local_path;
}

function getShortPath($relative_path)
{
    $pos = getPosLocalPath($relative_path);
    $local_path = substr($relative_path, $pos);
    return $local_path;
}

function getPath($relative_path, $base_dir = '/')
{
    $get_short_path = getShortPath($relative_path);
    $get_path = $base_dir . $get_short_path;
    return $get_path;
}

$relative_path = './aa/.././bb/ccc/../../aa/some_path/file.txt';
$base_dir = '/home/www/somesite.com/htdocs';

$result = getPath($relative_path, $base_dir);

var_dump($result);