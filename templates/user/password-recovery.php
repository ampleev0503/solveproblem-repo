<!--ВОССТАНОВЛЕНИЕ ПАРОЛЯ-->

<div class="password-recovery-block new_pass">

  <h1 class="title title--orders">Восстановление пароля</h1>

  <!--Письмо на почту-->
<div class="recovery_message"></div>
  <form action="/recovery" method="post" class="form form--password-recovery">
    <input id="email" type="email" name="email" class="input input--password-recovery email" placeholder="Ваш е-mail
    адрес">
    <input type="submit" class="btn btn--inline-block btn--default btn--submit btn--password-recovery" value="Отправить">
  </form>



</div>
<script src="../js/password-recovery.js"></script>