<?php

if (! function_exists('setting')) {
    function setting($name, $locale = null, $default = null)
    {
        return app('setting.settings')->get($name, $locale, $default);
    }
}

if (! function_exists('hasSetting')) {
    function hasSetting($name, $locale = null, $default = null)
    {
        return app('setting.settings')->has($name, $locale, $default);
    }
}
