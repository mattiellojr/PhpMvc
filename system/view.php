<?php


class View {
    public static function render($filePath, $data="") {
        extract($data);

        ob_start();
        require_once('mvc/view'.$filePath);
        $content = ob_get_clean();
        require_once SITE_ROOT . "/theme/default.php";
    }
}