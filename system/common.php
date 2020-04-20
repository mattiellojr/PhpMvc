<?php
function hr($return = false) {
    if ($return) {
        return "<hr>\n";
    } else {
        echo "<hr>\n";
    }
}

function br($return = false) {
    if ($return) {
        return "<br>\n";
    } else {
        echo "<br>\n";
    }

}

function dump($var, $return = false) {
    if (is_array($var)) {
        $out = print_r($var, true);
    } else if (is_object($var)) {
        $out = var_export($var, true);
    } else {
        $out = $var;
    }

    if ($return) {
        return "\n<pre style='direction: ltr'>$out</pre>\n";
    } else {
        echo "\n<pre style='direction: ltr'>$out</pre>\n";
    }
}

function get_current_datetime() {
    return date("Y-m-d H:i:s");
}

function encrypt_password($password) {
    global $config;
    return md5($password . $config['salt']);
}

function redirect($location) {
    header("Location: " . $location);
}

function base_url() {
    echo $_SERVER['HTTP_HOST'];
}

function full_url() {
    $fullurl = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    return $fullurl;
}

function request_uri() {
    return $_SERVER['REQUEST_URI'];
}

function generate_random_string($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function str_has($string, $search, $caseSensitive = false) {
    if ($caseSensitive) {
        return strpos($string, $search) !== false;
    } else {
        return strpos(strtolower($string), strtolower($search)) !== false;
    }
}

function message($type, $message) {
    $data['message'] = $message;
    View::render("/message/$type.php", $data);
}

function err403() {
    header('HTTP/1.1 403 Forbidden');
    exit;
}

function err404() {
    header('HTTP/1.1 404 Not Found');
    exit;
}
