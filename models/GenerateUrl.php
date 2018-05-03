<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 02.05.2018
 * Time: 9:53
 */

namespace app\services;

//Генератор ссылок
class GenerateUrl
{
  private $url;
  private $pathDomain = '192.168.0.103';
  private $pathController = '/account';
  private $pathAction;
  private $login;
  private $hashLoginPath; //будет индивидуальный путь для подтверждения регистрации


  public function __construct($login)
  {
    $this->login = $login;
    $this->hashLoginPath = $this->ganarate($login);
  }

  public function activeRegist()
  {
    $this->pathAction = '/active/';
    $this->pathDomain .= $this->pathController;
    $this->pathDomain .= $this->pathAction;
    $this->pathDomain .= $this->login;
    $this->pathDomain .= '/'.$this->hashLoginPath;
    $this->url = $this->pathDomain;

    return $this->url;
  }


  public function ganarate($login)
  {
    $result = md5($login);
    //Сделать отправку в базу даных
    return $result;
  }
}