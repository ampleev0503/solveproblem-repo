<?php

namespace app\models\repositories;

use app\models\Cart;
use app\models\Repository;

class UserRepository extends Repository {

    function getUserId() {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION['USER_ID'])) {
            return $_SESSION['USER_ID'];
        }
        return null;
    }

    public static function getTableName() {
        return 'user';
    }

    static public function getEntityClass() {
        return User::class;
    }

}
