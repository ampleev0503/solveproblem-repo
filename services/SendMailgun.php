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
  private $domain = "sandbox2564776a264b44e5957b55f6558c777d.mailgun.org";
  private $from = 'Solveproblem <postmaster@sandbox2564776a264b44e5957b55f6558c777d.mailgun.org>';



  public function __construct()
  {
    //Подключение к API
    $this->client = new Client();
    $this->mgClient = new Mailgun('key-42042bd832588c75057fc490fbbc0d4a',$this->client);
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