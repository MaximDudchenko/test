<?php

namespace Core;

class View
{
    public static function render(string $view, array $args = []) {
        extract($args, EXTR_SKIP);

        $file = VIEW_DIR  . $view . '.php';
        if (is_readable($file)) {
            require  $file;
        } else {
            throw new \Exception("{$view} not found");
        }
    }
}