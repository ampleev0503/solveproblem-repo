<?php
namespace app\models;

class User extends DataEntity
{
    public $id;
    public $user_name;
    public $user_login;
    public $user_password;
    public $user_last_action;
    public $db;
    public $email;
    public $phone;
    public $address;
    
     function __construct($id, $user_name, $user_login, $user_password, $user_last_action, $db, $email, $phone, $address) {
        $this->id = $id;
        $this->user_name = $user_name;
        $this->user_login = $user_login;
        $this->user_password = $user_password;
        $this->user_last_action = $user_last_action;
        $this->db = $db;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
    }
    
    
    function getId() {
        return $this->id;
    }

    function getUser_name() {
        return $this->user_name;
    }

    function getUser_login() {
        return $this->user_login;
    }

    function getUser_password() {
        return $this->user_password;
    }

    function getUser_last_action() {
        return $this->user_last_action;
    }

    function getDb() {
        return $this->db;
    }

    function getEmail() {
        return $this->email;
    }

    function getPhone() {
        return $this->phone;
    }

    function getAddress() {
        return $this->address;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUser_name($user_name) {
        $this->user_name = $user_name;
    }

    function setUser_login($user_login) {
        $this->user_login = $user_login;
    }

    function setUser_password($user_password) {
        $this->user_password = $user_password;
    }

    function setUser_last_action($user_last_action) {
        $this->user_last_action = $user_last_action;
    }

    function setDb($db) {
        $this->db = $db;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setAddress($address) {
        $this->address = $address;
    }

        public static function getTableName()
    {
        return 'users';
    }
}