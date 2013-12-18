<?php

class Functions {

    public static function view($path, $data = null) {
        if($data) {
            extract($data);
        }

        $path = $path .".view.php";
        require "views/layout.view.php";
    }

}