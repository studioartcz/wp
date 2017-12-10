<?php

require_once(dirname(__DIR__) . '/vendor/autoload.php');

$bootstrap = __DIR__ . '/wp/wp-blog-header.php';
if(file_exists($bootstrap))
{
    require($bootstrap);
}
else
{
    echo 'Please run: composer install'; die;
}