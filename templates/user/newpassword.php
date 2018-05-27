<div class="password-recovery-block">

	<div class="error_message"></div>
<form action="/account/recovery" method="post" class="form form--password-recovery form-new-pass">
	<input id="login" name="login" type="hidden" value="<?=$login ?>">
  <input id="password" type="password" class="input input--new-pass" name="password"
         placeholder="Введите новый пароль" autocomplete="off">
<!--  <span class="form__note-sm form__note-sm--new-pass">Сгенерировать пароль</span>-->
  <input id="second_password" type="password" class="input input--new-pass-confirm" name="password-repeat"
         placeholder="Подтвердите пароль" autocomplete="off">
  <input type="submit" class="btn btn--inline-block btn--default btn--submit
             btn--new-pass" value="Сохранить">
</form>

</div>

<script src="../js/newpassword.js"></script>