$(document).ready(function () {

	var forgetPas = new ForgetPassword();
	document.querySelector('.btn--password-recovery').addEventListener('click', function (ev) {
		forgetPas.checkMail(ev);
	});

});

function ForgetPassword(){
	this.email = document.querySelector('#email');
	this.wrapper = document.querySelector('.password-recovery-block');
	this.errorMessage = document.querySelector('.recovery_message');
	this.errorMessage.style.display = 'none';
}

ForgetPassword.prototype.checkMail = function (ev) {
	ev.preventDefault();
	var self = this;

	$.ajax({
		type:"POST",
		url: "/recovery",
		data: { email: this.email.value},
		success: function (data) {
			self.tellAnswer(data);
		}
	});
};

ForgetPassword.prototype.tellAnswer = function (data) {

	if(data == 1){
		this.wrapper.innerHTML = '';
		this.wrapper.innerHTML = '<p class="info">\n' +
				'    На ваш e-mail адрес было отправлено письмо<br>\n' +
				'    с инструкцией по восстановлению пароля.<br>\n' +
				'    Проверьте ваш почтовый ящик<br>\n' +
				'    и следуйте инструкции.\n' +
				'  </p>';
	}else{
		this.errorMessage.style.display = 'block';
		this.errorMessage.innerHTML = 'Такого пользователя не существует';
	}
};