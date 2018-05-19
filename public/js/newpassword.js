$(document).ready(function(){

	document.querySelector('.btn--new-pass').addEventListener('click',function (ev) {
		var newPas = new NewPassword();
		newPas.checkPassword(ev);
	})
});

function NewPassword(){
	this.login = document.querySelector('#login').value;
	this.password = document.querySelector('#password');
	this.secondPassword = document.querySelector('#second_password');
	this.wrapper = document.querySelector('.password-recovery-block');
	this.errorMessage = document.querySelector('.error_message');
	this.errorMessage.style.display = 'none';
	this.labelValidInput = true; // метка
}

NewPassword.prototype.checkPassword = function (ev) {
	ev.preventDefault();
	this.passwordMessage = 'Пароль должен быть не меньше 6 символом';
	this.secondPasswordMessage = 'Пароль должен быть не меньше 6 символом';
	this.passwordNotTwin = 'Пароли не совпадают';

	this.validInput= {};
	this.errorBorder = 'red';

	this.validInput.password = this.password.value.length >= 6;
	this.validInput.secondPassword = this.secondPassword.value.length >= 6;


	//Выведение ошибки
	//Через подмену переменых
	for (var key in this.validInput){
		if (this.validInput[key] === false) {
			this.labelValidInput = false;
			this[key].style.borderColor = this.errorBorder;
			this[key].value = '';
			this[key].placeholder = this[key + 'Message'];
		}
	}

	//проверяем одинаковы ли пароли
	if (this.labelValidInput) {
		if (this.secondPassword.value !== this.password.value) {
			this.secondPassword.style.borderColor = this.errorBorder;
			this.secondPassword.value = '';
			this.secondPassword.placeholder = this.passwordNotTwin;
			this.password.style.borderColor = this.errorBorder;
			this.password.value = '';
			this.password.placeholder = this.passwordNotTwin;
		} else {
			this.sendPassword();
		}
	}
};

NewPassword.prototype.sendPassword = function () {
	var self = this;

	$.ajax({
		type:"POST",
		url: "/account/recovery",
		data: { password : this.password.value, login: this.login},
		success: function (data) {
			self.telAnswer(data);
		}
	});
};

NewPassword.prototype.telAnswer = function (data) {
	if(data == 1){
		this.wrapper.innerHTML = '<p class="info">\n' +
				'\t\tВаш новый пароль был успешно создан.\n' +
				'\t\t<a href="/login" class="info__link">Войти</a>\n' +
				'\t</p>';
	}else{
		this.errorMessage.style.display = 'block';
		this.errorMessage.innerHTML = 'Что то пошла не так попробуйте позже';
	}
};