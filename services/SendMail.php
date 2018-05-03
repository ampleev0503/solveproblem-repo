<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 03.05.2018
 * Time: 0:16
 */

namespace app\services;


class SendMail extends SendMailgun
{
  private $subject;
  private $text;

  public function accountActive($email,$firstName,$url)
  {
    $this->subject = 'Подтверждение регистрации';
    $this->text = include '../templates/mail/activeaccount.php';
    $this->send($email,$firstName,$this->subject,$this->text);
  }
}