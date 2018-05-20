<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 02.05.2018
 * Time: 2:12
 */

namespace app\services;

require '../vendor/autoload.php';

use Mailgun\Mailgun;
use Http\Adapter\Guzzle6\Client;

//Отправка почты через Сервис MAILGUN
abstract class SendMailgun
{

  private $client;
  private $mgClient;
    //private $domain = "sandbox2564776a264b44e5957b55f6558c777d.mailgun.org"; // Артём
    //private $from = 'Solveproblem <postmaster@sandbox2564776a264b44e5957b55f6558c777d.mailgun.org>'; // Артём
    private $domain = "sandbox501b4d2bd8e04751b7edcfb7d8dbd377.mailgun.org"; // Вадим
    private $from = 'Solveproblem <postmaster@sandbox501b4d2bd8e04751b7edcfb7d8dbd377.mailgun.org>'; // Вадим
    //private $domain = "solveproblem.ru"; // SP
    //private $from = 'Solveproblem <postmaster@solveproblem.ru>'; // SP



  public function __construct()
  {
    //Подключение к API
    $this->client = new Client();
      $this->mgClient = new Mailgun('key-f1f3b615e8f3d324c46128de330ba5a4',$this->client); // SP
      //$this->mgClient = new Mailgun('key-f1f3b615e8f3d324c46128de330ba5a4',$this->client); // Вадим
      //$this->mgClient = new Mailgun('key-42042bd832588c75057fc490fbbc0d4a',$this->client); // Артём
  }

  public function send($to,$firstName,$subject,$text)
  {
    $this->mgClient->sendMessage("$this->domain",
      array('from'    => $this->from,
        'to'      => $firstName.' <'.$to.'>',
        'subject' => $subject,
        'html'    => $text));
  }

}