<?php


class UserController {

    public function users() {
        $users = UserModel::fetch_users();
        View::render("/user/users.php", [
            "users" => $users,
        ]);
    }


}
