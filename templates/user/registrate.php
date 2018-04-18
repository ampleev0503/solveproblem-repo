<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
<link href='http://bootstraptema.ru/snippets/form/2017/recaptcha/custom.css' rel='stylesheet' type='text/css'>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h1 class="text-center">Регистрация пользователя</h1>
            <!--     <form id="contact-form" method="post" action="#" role="form">-->
            <div class="messages"></div>
            <div class="controls">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_name">Имя пользователя</label>
                            <input id="form_name" type="text" name="name" class="form-control" placeholder="Введите ФИО *" required="required" data-error="Firstname is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>                       
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_email">Login Email *</label>
                            <input id="form_email" type="email" name="email" class="form-control" placeholder="Введите действующую почту *" required="required" data-error="Valid email is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Pass">Пароль</label>
                            <input id="Pass" type="Password" name="Pass" class="form-control" placeholder="Введите пароль *" required="required" data-error="Lastname is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Passconfirm">Повторите пароль</label>
                            <input id="Passconfirm" type="Password" name="Passconfirm" class="form-control" placeholder="Повторите пароль *" required="required" data-error="Lastname is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>               
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bdate">Дата Рождения</label>
                            <input id="bdate" type="date" name="bdate" class="form-control" placeholder="Введите дату рождения">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>                   
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_phone">Телефон</label>
                            <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Введите телефон">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="Address">Адрес</label>
                            <input id="Address" type="text" name="Address" class="form-control" placeholder="Введите адрес">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <!-- Replace data-sitekey with your own one, generated at https://www.google.com/recaptcha/admin -->
                            <div class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input id = 'adduser' type="submit" class="btn btn-success btn-send " value="Зарегистрироваться">
                    </div>
                </div>
            </div>
            <!--       </form>-->
        </div>
    </div> 
</div> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="http://bootstraptema.ru/snippets/form/2017/recaptcha/validator.js"></script>
<script src="http://bootstraptema.ru/snippets/form/2017/recaptcha/contact.js"></script>


