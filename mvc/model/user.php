<?php


class UserModel {

    public static function fetch_users() {
        $db = Db::getInstance();
        $user = $db->query("SELECT * FROM  users", array());
        return $user;
    }

}