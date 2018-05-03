<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 22.04.2018
 * Time: 15:07
 */

namespace app\models;

use app\models\repositories\UserRepository;
class User extends DataEntity
{
    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $telephone;
    public $password;
    public $isregist;
    public $cityId;
    public $rating;

    private $role;

    public function __construct($email = null, $firstName = null, $lastName = null, $telephone = null, $password = null, $id = null, $isregist = 0)
    {
        $this->id;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->telephone = $telephone;
        $this->password = $password;
        $this->isregist = $isregist;
    }

   public function getRole()
    {
        return $this->role;
    }


}