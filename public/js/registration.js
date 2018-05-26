$(document).ready(function () {
	var regist = new Regist();

	document.querySelector('.form').addEventListener('submit', function (ev) {
		regist.checkForm(ev);
	});
	document.querySelector('.checkbox__span').addEventListener('click', function () {
		this.style.border = '1px solid #575757';
	});

});


function Regist() {

	this.firstName = document.querySelector('#firstName');
	this.lastName = document.querySelector('#lastName');
	this.email = document.querySelector('#email');
	this.telephone = document.querySelector('#telephone');
	this.password= document.querySelector('#password');
	this.secondPassword = document.querySelector('#secondPassword');
	this.agree = document.querySelector('#agree');

	this.firstNameMessage = 'Только буквы';
	this.lastNameMessage = 'Только буквы';
	this.emailMessage= 'Неверный Email';
	this.telephoneMessage = 'Введите номер по шаблону +7-000-000-00-00 ';
	this.passwordMessage = 'Пароль должен быть не меньше 6 символом';
	this.secondPasswordMessage = 'Пароль должен быть не меньше 6 символом';
	this.agreeMessage = 'согласие';
	this.passwordNotTwin = 'Пароли не совпадают';

	this.validInput= {};
	this.labelValidInput; // метка
	this.errorBorder = 'red';
	this.successBorder= 'forestgreen';
}

Regist.prototype.checkForm = function (ev) {
	ev.preventDefault();
	this.labelValidInput = true;

	//проверяем все ли поля правильно заполнены
	this.validInput.firstName = /^[^\d!@#$%^&*()"№%:,.;'}{`~±><|\/]+$/i.test(this.firstName.value);
	this.validInput.lastName = /^[^\d!@#$%^&*()"№%:,.;'}{`~±><|\/]+$/i.test(this.lastName.value);
	this.validInput.email = /^([a-z0-9_-]+\.)*([a-z0-9_-])+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/i.test(this.email.value);
	this.validInput.telephone = /^\+{0,1}\d(-?(\d{3})){2}-?(\d{2})-?(\d{2})$/i.test(this.telephone.value);
	this.validInput.password = this.password.value.length >= 6;
	this.validInput.secondPassword = this.secondPassword.value.length >= 6;
	this.validInput.agree = this.agree.checked;


	//Выведение ошибки
	//Через подмену переменых
	for (var key in this.validInput){
		if (this.validInput[key] === false){
			this.labelValidInput = false;
			if(key === 'agree'){
				document.querySelector('.checkbox__span').style.border = '1px solid red';
				continue;
			}
			this[key].style.borderColor = this.errorBorder;
			this[key].value = '';
			this[key].placeholder = this[key+'Message'];
		}else{
			this[key].style.borderColor = this.successBorder;
		}
	}

	//проверяем одинаковы ли пароли
	if(this.labelValidInput){
		if(this.secondPassword.value !== this.password.value){
			this.secondPassword.style.borderColor = this.errorBorder;
			this.secondPassword.value = '';
			this.secondPassword.placeholder = this.passwordNotTwin;
			this.password.style.borderColor = this.errorBorder;
			this.password.value = '';
			this.password.placeholder = this.passwordNotTwin;
		}else {
			this.sendForm();
		}
	}else{
		window.scrollTo(0,0);
	}
};

//отправка формы на сервер
Regist.prototype.sendForm = function () {
	var self = this;
	this.preLoader();

	$.ajax({
		type:"POST",
		url: "/regist",
		data: { submit: true, firstName: this.firstName.value, lastName: this.lastName.value, password: this.password.value,
			email: this.email.value,telephone: this.telephone.value},
		success: function (data) {
			if(data) {
            	self.telAnswer(data);
            }else{
            	self.telAnswer(data);
            }
            console.log(data);
		}
	});
};

//загрузка лоадера
Regist.prototype.preLoader = function () {

	document.querySelector('.title').innerHTML = 'Ожидайте';
	document.querySelector('.loader').style.display = 'block';
	window.scrollTo(0,0);
};


//Выведение результата регистрации
Regist.prototype.telAnswer = function (access) {
	this.timerTime = 11;
	var self = this;
	//Успешная регистрация
	if(access == 1){
		document.querySelector('.loader').style.display = 'none';
		document.querySelector('.title').innerHTML = 'Регистрация прошла успешно';
		document.querySelector('.form-wrapper').innerHTML = '<div class="answer">Перейдите на указаный email ' +
				'<span style="color:black"> '+this.email.value+' </span> для подтверждения регистрации <br><a style="text-decoration: underline; color:blue;display: block; margin-top: 60px;" ' +
				'href="/">' +
				'Главная страница</a> <div class="timer"></div></div>';

		window.scrollTo(0,0);
		setInterval(function () {
			self.timerTime -=1;
			document.querySelector('.timer').innerHTML = self.timerTime;
			if(self.timerTime === 0){
				window.location.replace('/');
			}
		},1000);
	}else{
		//Логин занят
		window.scrollTo(0,0);
		document.querySelector('.title').innerHTML = 'Регистрация';
		document.querySelector('.form-wrapper').display = 'block';
		document.querySelector('.loader').style.display = 'none';
		this.email.value = '';
		this.email.style.borderColor = this.errorBorder;
		this.email.placeholder = 'Логин занят';
	}

};


