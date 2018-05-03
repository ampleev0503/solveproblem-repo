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
  private $pathDomain = 'https://solveproblem.ru';
  private $pathController = '/account';
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
    if((new GenerateUrlRepository())->insertPath($this->login,$this->hashLoginPath)){
      $this->pathAction = '/active';
      $this->pathDomain .= $this->pathController;
      $this->pathDomain .= $this->pathAction;
      $this->pathDomain .= '?login='.$this->login;
      $this->pathDomain .= '&path=' . $this->hashLoginPath;
      $this->url = $this->pathDomain;
    }
    return $this->url;
  }


  private function generate($login)
  {
    $result = md5($login);
    return $result;
  }
}