<?php

if(!function_exists('config_path')) {
    function config_path($path = null) {
        return app()->getConfigurationPath(rtrim($path, '.php'));
    }
}

if(!function_exists('public_path')) {
    function public_path($path = null) {
        return rtrim(app()->basePath('public/' . $path), '/');
    }
}

if(!function_exists('storage_path')) {
    function storage_path($path = null) {
        return app()->storagePath($path);
    }
}

if(!function_exists('database_path')) {
    function database_path($path = null) {
        return app()->databasePath($path);
    }
}

if(!function_exists('resource_path')) {
    function resource_path($path = null) {
        return app()->resourcePath($path);
    }
}

if(!function_exists('lang_path')) {
    function lang_path($path = null) {
        return resource_path() . DIRECTORY_SEPARATOR . 'lang' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}

if(!function_exists('asset')) {
    function asset($path, $secure = null) {
        return app('url')->asset($path, $secure);
    }
}