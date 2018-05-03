
$(document).ready(function () {

	var auth = new Auth();

	document.querySelector('.assignment__form').addEventListener('submit', function (ev) {
		auth.sendForm(ev);
	});

});


function Auth() {
	this.login;
	this.password;
	this.remember;
	this.error = document.querySelector('.authorization-error');
	this.errorMessage;
}

Auth.prototype.sendForm = function (ev) {
	ev.preventDefault();

	this.login = document.querySelector('#email').value;
	this.password = document.querySelector('#password').value;
	this.remember = document.querySelector('#remember').checked;
	var self = this;

	$.ajax({
		type:"POST",
		url: "/login",
		data: { submit: true, email: this.login, password: this.password},
		success: function (data) {
			if(data) {
				self.tellError(data);
			}else{
				document.location.replace("/");
			}
		}
	});

};

Auth.prototype.tellError = function (data) {
	if (data === 'active'){
		this.errorMessage = '*Необходимо пройти на почту для подтверждения аккаунта';
	}
	if (data === 'pass'){
		this.errorMessage = '*Неправильные данные для входа на сайт';
	}
	if (data === 'notregist'){
		this.errorMessage = '*Такого пользователя не существует';
	}
	this.error.style.display = 'block';
	this.error.innerHTML = this.errorMessage;

};
