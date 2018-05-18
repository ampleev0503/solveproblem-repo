<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 02.05.2018
 * Time: 9:53
 */

namespace app\models;

//Генератор ссылок
use app\models\repositories\GenerateUrlRepository;

class GenerateUrl
{
  private $url;
//  private $pathDomain = 'https://solveproblem.ru';
  private $pathDomain = '192.168.0.103';
  private $pathController = '/account';
  private $salt = '7a5bec';
  private $pathAction;
  private $hashLoginPath; //будет индивидуальный путь для подтверждения регистрации
  private $login;


  public function __construct($login)
  {
    $this->login = $login;
    $this->hashLoginPath = $this->generate($login);
  }

  public function activeRegist()
  {
    if((new GenerateUrlRepository())->insertActiveAccount($this->login,$this->hashLoginPath)){
      $this->pathAction = '/active';
      $this->pathDomain .= $this->pathController;
      $this->pathDomain .= $this->pathAction;
      $this->pathDomain .= '?login='.$this->login;
      $this->pathDomain .= '&path=' . $this->hashLoginPath;
      $this->url = $this->pathDomain;
    }
    return $this->url;
  }

  public function forgetPas()
  {
    if((new GenerateUrlRepository())->insertForgetPass($this->login,$this->hashLoginPath)){
      $this->pathAction = '/recovery';
      $this->pathDomain .= $this->pathController;
      $this->pathDomain .= $this->pathAction;
      $this->pathDomain .= '?path=' . $this->hashLoginPath;
      $this->url = $this->pathDomain;
    }
    return $this->url;
  }

  private function generate($login)
  {
    $result = md5($login.$this->salt);
    return $result;
  }
}