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
class SendMail
{

  private $client;
  private $mgClient;
  private $domain = "sandbox2564776a264b44e5957b55f6558c777d.mailgun.org";
  private $from = 'Solveproblem <postmaster@sandbox2564776a264b44e5957b55f6558c777d.mailgun.org>';
  private $to;
  private $subject;
  private $text;


  public function __construct($to,$subject,$text)
  {
    //Подключение к API
    $this->client = new Client();
    $this->mgClient = new Mailgun('key-42042bd832588c75057fc490fbbc0d4a',$this->client);
    $this->to = $to;
    $this->subject = $subject;
    $this->text = $text;

  }

  public function send()
  {
    $result = $this->mgClient->sendMessage("$this->domain",
      array('from'    => $this->from,
        'to'      => $this->to,
        'subject' => $this->subject,
        'text'    => $this->text));
    var_dump($result);
  }

}